<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\Admin\MenuCategoryService;

class MenuCategoryController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MenuCategoryService $service)
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
        return view('admin.menuCats.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menuCats.create', compact('categories'));
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
            'name' => 'required',
        ]);
        $attributes = $request->only('name');
        $attributes['parent_id'] = 0;
        $this->service->create($attributes);
        return redirect()->route('admin.menu-categories.index');
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
    public function edit(Category $category)
    {
        return view('admin.menuCats.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ]);
        $category = $this->service->update($request->only(['name', 'slug']), $category);
        return redirect()->route('admin.menu-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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
}
