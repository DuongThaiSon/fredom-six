<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGalleryCategoryRequest;
use App\Http\Requests\Admin\UpdateGalleryCategoryRequest;
use App\Models\Category;
use App\Services\Admin\GalleryCategoryService;

class GalleryCategoryController extends Controller
{
    public function __construct(GalleryCategoryService $service)
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
        return view('admin.galleryCats.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->service->getSubCategories($parentId = 0, $processId = null, $shouldLoadUpdater = false);
        return view('admin.galleryCats.create', compact('categories'));
    }

    public function makeChild(Category $category)
    {
        $selectedId = $category->id;
        $categories = $this->service->getSubCategories($parentId = 0, $processId = null, $shouldLoadUpdater = false);
        return view('admin.galleryCats.create', compact('categories', 'selectedId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\StoreGalleryCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGalleryCategoryRequest $request)
    {
        $attributes = $request->only([
            'parent_id', 'name', 'description', 'is_public', 'is_highlight', 'meta_title', 'slug', 'meta_keyword', 'meta_description', 'meta_page_topic', 'avatar'
        ]);
        $category = $this->service->create($attributes);
        return redirect()->route('admin.gallery-categories.edit', $category->id)->with('success', 'Category created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category
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
        return view('admin.galleryCats.edit', compact('category', 'categories', 'selectedId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\UpdateGalleryCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGalleryCategoryRequest $request, Category $category)
    {
        $attributes = $request->only([
            'parent_id', 'name', 'description', 'is_public', 'is_highlight', 'is_new', 'meta_title', 'slug', 'meta_keyword', 'meta_description', 'meta_page_topic', 'avatar'
        ]);
        $category = $this->service->update($attributes, $category);
        return redirect()->route('admin.gallery-categories.edit', $category->id)->with('success', 'Category updated.');
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
