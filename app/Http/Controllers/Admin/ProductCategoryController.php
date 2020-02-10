<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductCategoryRequest;
use App\Http\Requests\Admin\UpdateProductCategoryRequest;
use App\Models\Category;
use App\Services\Admin\ProductCategoryService;

class ProductCategoryController extends Controller
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
    public function index()
    {
        $categories = $this->service->getSubCategories($parentId = 0, $processId = null, $shouldLoadUpdater = true);
        return view('admin.productCats.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->service->getSubCategories($parentId = 0, $processId = null, $shouldLoadUpdater = false);
        return view('admin.productCats.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\StoreProductCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductCategoryRequest $request)
    {
        $attributes = $request->only([
            'parent_id', 'name', 'description', 'is_public', 'is_highlight', 'is_new', 'meta_title', 'slug', 'meta_keyword', 'meta_description', 'meta_page_topic', 'avatar'
        ]);
        $category = $this->service->create($attributes);
        return redirect()->route('admin.product-categories.edit', $category->id)->with('success', 'Category created.');
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = $this->service->getSubCategories($parentId = 0, $processId = $category->id, $shouldLoadUpdater = false);
        $selectedId = $category->parent_id;
        return view('admin.productCats.edit', compact('category', 'categories', 'selectedId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\UpdateProductCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductCategoryRequest $request, Category $category)
    {
        $attributes = $request->only([
            'parent_id', 'name', 'description', 'is_public', 'is_highlight', 'is_new', 'meta_title', 'slug', 'meta_keyword', 'meta_description', 'meta_page_topic', 'avatar'
        ]);
        $category = $this->service->update($attributes, $category);
        return redirect()->route('admin.product-categories.edit', $category->id)->with('success', 'Category updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($this->service->destroy($category)) {
            return response()->json([], 204);
        } else {
            return response()->json([
                'message' => "failed_to_delete"
            ], 400);
        }
    }

    public function destroyMany(Request $request)
    {
        if ($this->service->destroyMany($request->ids)) {
            return response()->json([], 204);
        } else {
            return response()->json([
                'message' => "failed_to_delete"
            ], 400);
        }
    }

    public function reorder(Request $request)
    {
        $this->service->reorder($request->sort);

        return response()->json([], 204);
    }
}
