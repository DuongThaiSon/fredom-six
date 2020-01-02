<?php

namespace App\Http\Controllers\Admin;

use App\Http\Services\MenuService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Http\Requests\ProductCategoryRequest;
use App\Http\Services\ProductCategoryService;
use App\Models\Article;
use App\Models\Product;
use App\Models\Category;
use Auth;

class MenuController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductCategoryService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Category $category)
    {
        $menuCats = $this->getSubMenus(0, $category->id);
        $category_id = $category->id;
        return view('admin.menus.index', compact('menuCats', 'category_id'));
    }

    private function getSubMenus($parent_id, $category_id, $ignore_id=null)
    {
        // dd($category_id);
        $menuCats = Menu::where('category_id', $category_id)
            ->where('parent_id', $parent_id)
            ->where('id', '<>', $ignore_id)
            ->orderBy('order', 'desc')
            ->with(['user'])
            ->get()
            ->map(function($query) use($ignore_id, $category_id) {
                $query->sub = $this->getSubMenus($query->id, $category_id,$ignore_id);
                return $query;
            });

        return $menuCats;
    }

    // private function getSubCategories($parent_id, $ignore_id=null)
    // {
    //     $menuCats = Menu::where('parent_id', $parent_id)
    //         ->where('id', '<>', $ignore_id)
    //         ->where('category_id', 15)
    //         ->with(['user'])
    //         ->get()
    //         ->map(function($query) use($ignore_id) {
    //             $query->sub = $this->getSubCategories($query->id, $ignore_id);
    //             return $query;
    //         });

    //     return $menuCats;
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Category $category)
    {
        $parent_id = $request->has('parent_id')?$request->parent_id:'0';
        $menuCats = $this->getSubMenus(0, $category->id);
        return view('admin.menus.create', compact('menuCats','category', 'parent_id'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'parent_id' => 'numeric|min:0',
            'name' => 'required',
            'category_id' => 'required',
            'menuable_type' => 'required',
            'menuable_id' => 'sometimes'
        ]);

        $attributes = $request->only([
            'name', 'parent_id', 'category_id', 'type'
        ]) ;
        $attributes['created_by'] = Auth::user()->id;
        $attributes['order'] = Menu::max('order') ? (Menu::max('order') + 1) : 1;

        if ($request->menuable_type == 4) {
            $article = Article::find($request->menuable_id);
            $menu = $article->menus()->create($attributes);
        }

        elseif ($request->menuable_type == 1 || $request->menuable_type == 2 ||  $request->menuable_type == 5 || $request->menuable_type == 6 ) {
            $category = Category::find($request->menuable_id);
            $menu = $category->menus()->create($attributes);
        }

        elseif ($request->menuable_type == 8) {
            $product = Product::find($request->menuable_id);
            $menu = $product->menus()->create($attributes);
        }
        elseif ($request->menuable_type == 0 || $request->menuable_type == 3 || $request->menuable_type == 7) {
            $menu = Menu::create($attributes);
        }
        // $menus = Menu::create($attributes);
        return redirect()->route('admin.menus.edit', ['category' => $request->category_id, 'menu' => $menu->id])->with('success','Lưu dữ liệu thành công');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Category $category, Menu $menu)
    {

            // $menu = Menu::findOrFail($id); // find 1 sao lại số nhiều nhỉ
            // $menu = Menu::find($menus->parent_id); // ??
            $menuCats = $this->getSubMenus(0, $menu->category_id, $menu->id);

            return view('admin.menus.edit', compact('menuCats', 'menu'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, Menu $menu)
    {
        // $request->validate([
        //     'parent_id' => 'numeric|min:0',
        //     'name' => 'required',
        //     'category_id' => 'required'
        // ]);
        // $attributes = $request->only([
        //     'name', 'parent_id', 'category_id', 'link', 'type'
        // ]) ;
        // $attributes['created_by'] = Auth::user()->id;
        // $attributes['category_id'] = $request->category_id;
        // $menus = Menu::findOrFail($id);
        // $menu  = $menus->fill($attributes);
        // $menu->save();
            // print_r($request->all());die;
        $request->validate([
            'parent_id' => 'numeric|min:0',
            'name' => 'required',
            'category_id' => 'required',
            'menuable_type' => 'required',
            'menuable_id' => 'sometimes'
        ]);

        $attributes = $request->only([
            'name', 'parent_id', 'category_id', 'type'
        ]) ;
        if ($request->menuable_type == 4) {
            $article = Article::find($request->menuable_id);
            // $menu = $article->menus()->update($attributes);
            $menu = Menu::find($menu->id);
            $menu->menuable()->associate($article);
            $menu->fill($attributes);
            $menu->save();
        }

        elseif ($request->menuable_type == 1 || $request->menuable_type == 2 || $request->menuable_type == 5 || $request->menuable_type == 6) {
            $category = Category::find($request->menuable_id);
            $menu = Menu::find($menu->id);
            $menu->menuable()->associate($category);
            $menu->fill($attributes);
            $menu->save();
        }

        elseif ($request->menuable_type == 8) {
            $product = Product::find($request->menuable_id);
            // $menu = $product->menus()->update($attributes);
            $menu = Menu::find($menu->id);
            $menu->menuable()->associate($product);
            $menu->fill($attributes);
            $menu->save();
        }

        elseif ($request->menuable_type == 0 || $request->menuable_type == 3 || $request->menuable_type == 7) {
            $menu = Menu::find($menu->id);
            if(empty($menu->menuable_id))
            {
                $menu->update($attributes);
            }
            else {
                $menu->menuable()->dissociate();
                $menu->save();
                $menu->update($attributes);
            }
        }

        return redirect()->back()->with('success','Lưu dữ liệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menus = Menu::findOrFail($id);
        $menus->delete();
        return redirect()->back()->with('success', 'Xoá dữ liệu thành công');
    }
    /**
     * Move menu by order
     */
    public function sort(Request $request)
    {
        $this->service->sortData($request->get('sort'));
    }
    /**
     *
     */
    public function listArticle(Request $request)
    {

        $results = Article::query();
        $isChoose = 0;
        if($request->keyword)
        {
            $results = $results->where('name', 'like', '%'.$request->keyword.'%');
        }
        if($request->menuable_id)
        {
            $results = $results->whereId($request->menuable_id);
            $isChoose = 1;
        }
        $results = $results->with('category')->paginate(5);
        $keyword = $request->keyword ?? '';

        return view('admin.menus.list_articles', compact('results', 'keyword', 'isChoose'))->render();
    }
    /**
     *
     */

    public function listProduct(Request $request)
    {
        $results = Product::query();
        $isChoose = 0;
        if($request->keyword)
        {
            $results = $results->where('name', 'like', '%'.$request->keyword.'%');
        }
        if($request->menuable_id)
        {
            $results = $results->whereId($request->menuable_id);
            $isChoose = 1;
        }
        $results = $results->with('categories')->paginate(5);
        $keyword = $request->keyword ?? '';
        return view('admin.menus.list_products', compact('results', 'keyword', 'isChoose'));
    }
    // /**
    //  *
    //  */

    // public function getArticle($id)
    // {
    //     $article = Article::with(['category'])->findOrFail($id)->toArray();
    //     return response()->json(['results'=>$article]);
    // }
    // /**
    //  *
    //  */

    // public function getProduct($id)
    // {
    //     $product = Product::with(['categories'])->findOrFail($id)->toArray();
    //     // print_r($product);die;
    //     return response()->json(['results'=>$product]);
    // }

    // public function searchArticles(Request $request)
    // {
    //     $results = Article::where('name', 'like', '%'.$request->keyword.'%')->with(['category'])->get()->paginate(5);
    //     return view('admin.menus.list_articles', compact('results'))->render();
    //     // $articles = Article::where('name', 'like', '%'.$request->keyword.'%')->with(['category'])->get();
    //     // return response()->json(compact('articles'), 200);
    // }

    // public function searchProducts(Request $request)
    // {
    //     $results = Product::where('name', 'like', '%'.$request->keyword.'%')->with(['categories'])->get()->paginate(5);
    //     return view('admin.menus.list_products', compact('results'))->render();
    //     // $products = Product::where('name', 'like', '%'.$request->keyword.'%')->with(['categories'])->get();
    //     // return response()->json(compact('products'), 200);
    // }
    /**
     * Gọi ra danh mục sản phẩm
     */
    // public function listCategoryProduct()
    // {
    //     $categories = $this->service->allWithSub(null, true);

    //     return view('admin.menus.category_table_products', compact('categories'))->render();
    // }
    // public function getProductCategory($id)
    // {
    //     $product = Category::findOrFail($id)->toArray();
    //     return response()->json(['results'=>$product]);
    // }

    private function getSubCategories($type, $parent_id, $ignore_id=null)
    {
        $Categories = Category::where('parent_id', $parent_id)
            ->where('type', $type)
            ->where('id', '<>', $ignore_id)
            ->orderBy('order', 'desc')
            ->get()
            ->map(function($query) use ($ignore_id, $type) {
                $query->sub = $this->getSubCategories($type, $query->id, $ignore_id);
                return $query;
            });

        return $Categories;
    }
    // public function listCategoryArticle()
    // {
    //     $categories = $this->getSubCategories(0);
    //     // print_r($categories->toArray());die;
    //     return view('admin.menus.category_table_articles', compact('categories'))->render();
    // }
    // public function getArticleCategory($id)
    // {
    //     $article = Category::findOrFail($id)->toArray();
    //     return response()->json(['results'=>$article]);
    // }

    public function getCategory(Request $request)
    {
        // print_r($request->all());die;
        // $categories = Category::whereType($request->type)->get();
        $categories = $this->getSubCategories($request->type, 0);
        // print_r($categories->toArray());die;
        $menu = $request->menuable_id ?? '';
        return view('admin.menus.list_category', compact('categories', 'menu'));
    }
}
