<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Article;
use Auth;

class ArticleCategoryController extends Controller
{
    const PER_PAGE = 10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->getSubCategories(0);
        return view('admin.articleCats.index', compact('categories'));
    }

    private function getSubCategories($parent_id, $ignore_id=null)
    {
        $Categories = Category::where('parent_id', $parent_id)
            ->where('type', 'article')
            ->where('id', '<>', $ignore_id)
            ->orderBy('order', 'desc')
            ->get()
            ->map(function($query) use($ignore_id) {
                $query->sub = $this->getSubCategories($query->id, $ignore_id);
                return $query;
            });

        return $Categories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->getSubCategories(0);
        return view('admin.articleCats.create', compact('categories'));
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
            'parent_id' => 'required|numeric|min:0',
            'name' => 'required|unique:categories',
            'avatar' => 'nullable|sometimes|image'
        ]);

        $attributes = $request->only([
            'parent_id', 'name', 'description', 'is_highlight', 'meta_title', 'slug', 'meta_keyword', 'meta_discription',
            'meta_page_topic'
        ]);
        $attributes['type'] = 'article';
        $attributes['created_by'] = Auth::user()->id;
        $attributes['is_highlight'] = isset($request->is_highlight)?1:0;
        $attributes['order'] = Category::max('order') ? (Category::max('order') + 1) : 1;
        $attributes['slug']         = Str::slug($request->name,'-').$request->id;

        if($request->hasFile('avatar')){
            $destinationDir = public_path('media/articleCategories');
            $filename = uniqid('leotive').'.'.$request->avatar->extension();
            $request->avatar->move($destinationDir, $filename);
            $attributes['avatar'] = '/media/articleCategories/'.$filename;
        }

        $category = Category::create($attributes);

        return redirect()->route('admin.article-cats.edit', $category->id)->with('SUCCESS');
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
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = $this->getSubCategories(0,$id);

        return view('admin.articleCats.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'parent_id' => 'required|numeric|min:0',
            'name' => 'required|unique:categories'.$id,
            'avatar' => 'nullable|sometimes|image'
        ]);
        $attributes = $request->only([
            'parent_id', 'name', 'description', 'is_highlight', 'meta_title', 'slug', 'meta_keyword', 'meta_discription',
            'meta_page_topic'
        ]);

        $attributes['updated_by'] = Auth::user()->id;
        $attributes['is_highlight'] = isset($request->is_highlight)?1:0;
        $attributes['slug']         = Str::slug($request->name,'-').$request->id;

        if($request->hasFile('avatar')){
            $destinationDir = public_path('media/articleCategories');
            $filename = uniqid('leotive').'.'.$request->avatar->extension();
            $request->avatar->move($destinationDir, $filename);
            $attributes['avatar'] = '/media/articleCategories/'.$filename;
        }

        $categories = Category::findOrFail($id);
        $category = $categories->fill($attributes);
        $category->save();

        return redirect()->route('admin.article-cats.edit', $category->id)->with('UPDATED COMPLE');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryid = $this->getSubCategories($id);
        $this->foreachlong($categoryid);
        Category::findOrFail($id)->delete();
        $categories = $this->getSubCategories(0);
        $category = $categories->filter(function($value, $key) use ($id){
            return $value->id == $id;
        });
        return redirect()->route('admin.article-cats.index')->with('DETELED COMPLE');
    }
    public function sortcat(Request $request){
        $cats = $request->sort;
		$order = array();
		foreach ($cats as $c) {
			$id = str_replace('cat_', '', $c);
			$order[] = Category::findOrFail($id)->order;
		}
		rsort($order);
		foreach ($order as $k => $v) {
            Category::where('id', str_replace('cat_', '', $cats[$k]))->update(['order' => $v]);
        }
    }

    private function foreachlong($chil_id)
    {
        foreach ($chil_id as $key => $child) {
            $cat_child = $this->getSubCategories($child->id);
            if(!empty($cat_child))
            {
                Category::findOrFail($child->id)->delete();
            }
            else
            {
                $this->foreachlong($cat_child);
            }
        }
    }

    public function articles($id)
    {
        $articles = Article::where('category_id', $id)
                    ->orderBy('order')
                    ->paginate();
        return view('admin.articles.index', compact('articles'));
    }
}
