<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMenuRequest;
use App\Http\Requests\Admin\UpdateMenuRequest;
use App\Services\MenuService;
use App\Models\Category;
use App\Models\Menu;
use App\Services\ArticleCategoryService;
use App\Services\ArticleService;
use App\Services\ProductCategoryService;
use App\Services\ProductService;

class MenuController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        MenuService $menuService,
        ArticleCategoryService $articleCategoryService,
        ArticleService $articleService,
        ProductCategoryService $productCategoryService,
        ProductService $productService
    ) {
        $this->menuService = $menuService;
        $this->articleCategoryService = $articleCategoryService;
        $this->articleService = $articleService;
        $this->productCategoryService = $productCategoryService;
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $menus = $this->menuService->getMenu($parentId = 0, $categoryId = $category->id, $ignoreId = null);
        return view('admin.menus.index', compact('menus', 'categoryId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        $menus = $this->menuService->getMenu($selectedId = 0, $categoryId = $category->id, $ignoreId = null);
        $menuType = $this->menuService->getMenuType();
        return view('admin.menus.create', compact('menus', 'categoryId', 'selectedId', 'menuType'));
    }

    public function makeChild(Category $category, Menu $menu)
    {
        $menus = $this->menuService->getMenu($parentId = 0, $categoryId = $category->id, $ignoreId = null);
        $menuType = $this->menuService->getMenuType();
        $selectedId = $menu->id;
        return view('admin.menus.create', compact('menus', 'categoryId', 'selectedId', 'menuType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\StoreMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenuRequest $request)
    {
        $attributes = $request->only([
            'name', 'parent_id', 'category_id', 'link', 'type', 'object_id'
        ]);

        $menu = $this->menuService->create($attributes);
        return redirect()->route('admin.menus.edit', ['category' => $request->category_id, 'menu' => $menu->id])->with('success', 'Menu created.');
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
    public function edit(Category $category, Menu $menu)
    {
        $menus = $this->menuService->getMenu($parentId = 0, $categoryId = $category->id, $ignoreId = $menu->id);
        $menuType = $this->menuService->getMenuType();
        $selectedId = $menu->parent_id;
        switch ($menu->type) {
            case Menu::$LINK_TO_ARTICLE_CATEGORY:
            case Menu::$SYNC_WITH_ARTICLE_CATEGORY:
                $object = $this->articleCategoryService->find($menu->object_id);
                break;
            case Menu::$LINK_TO_ARTICLE:
                $object = $this->articleService->find($menu->object_id);
                break;
            case Menu::$LINK_TO_PRODUCT_CATEGORY:
            case Menu::$SYNC_WITH_PRODUCT_CATEGORY:
                $object = $this->productCategoryService->find($menu->object_id);
                break;
            break;
            case Menu::$LINK_TO_PRODUCT:
                $object = $this->productService->find($menu->object_id);
                break;
            default:
                $object = false;
                break;
        }
        return view('admin.menus.edit', compact('menuType', 'menu', 'menus', 'selectedId', 'categoryId', 'object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenuRequest $request, Category $category, Menu $menu)
    {
        $attributes = $request->only([
            'name', 'parent_id', 'category_id', 'link', 'type', 'object_id'
        ]);
        $this->menuService->update($attributes, $menu);

        return redirect()->back()->with('success', 'Lưu dữ liệu thành công');
    }

    public function destroy(Article $menu)
    {
        if ($this->menuService->destroy($menu)) {
            return response()->json([], 204);
        }

        return response()->json([
            'message' => "failed_to_delete"
        ], 400);
    }

    public function destroyMany(Request $request)
    {
        if ($this->menuService->destroyMany($request->ids)) {
            return response()->json([], 204);
        }

        return response()->json([
            'message' => "failed_to_delete"
        ], 400);
    }

    public function reorder(Request $request)
    {
        $this->menuService->reorder($request->sort, 'item_');
        return response()->json([], 204);
    }

    public function listArticleCategories()
    {
        $categories = $this->articleCategoryService->getSubCategories($parentId = 0, $processId = null, $shouldLoadUpdater = true);
        return view('admin.menus.categories', compact('categories'));
    }

    public function showArticleCategory(Request $request)
    {
        $request->validate([
            'object_id' => 'required'
        ]);

        $object = $this->articleCategoryService->find($request->object_id);
        return view('admin.menus.selected', compact('object'))->render();
    }

    public function listArticles()
    {
        return view('admin.menus.items')->render();
    }

    public function listArticlesDatatables()
    {
        return $this->articleService->datatablesList();
    }

    public function showArticle(Request $request)
    {
        $request->validate([
            'object_id' => 'required'
        ]);

        $object = $this->articleService->find($request->object_id);
        return view('admin.menus.selected', compact('object'))->render();
    }

    public function listProductCategories()
    {
        $categories = $this->productCategoryService->getSubCategories($parentId = 0, $processId = null, $shouldLoadUpdater = true);
        return view('admin.menus.categories', compact('categories'));
    }

    public function showProductCategory(Request $request)
    {
        $request->validate([
            'object_id' => 'required'
        ]);

        $object = $this->productCategoryService->find($request->object_id);
        return view('admin.menus.selected', compact('object'))->render();
    }

    public function listProducts()
    {
        return view('admin.menus.items')->render();
    }

    public function listProductsDatatables()
    {
        return $this->productService->datatablesList();
    }

    public function showProduct(Request $request)
    {
        $request->validate([
            'object_id' => 'required'
        ]);

        $object = $this->productService->find($request->object_id);
        return view('admin.menus.selected', compact('object'))->render();
    }
}
