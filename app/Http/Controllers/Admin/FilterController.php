<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Filter;
use App\Models\Category;
use App\Http\Services\ProductCategoryService;
use Auth;

class FilterController extends Controller
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
        $filters = Filter::with('user')->simplePaginate(10);
        return view('admin.productFilters.index', compact('filters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->service->allWithSub();
        return view('admin.productFilters.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // print_r($request->all());die;
        $attributes = $request->only([
            'name'
        ]);
        $attributes['is_public'] = $request->is_public?'1':'0';
        $attributes['created_by'] = $attributes['updated_by'] = Auth::id();
        $filters = Filter::create($attributes);
        $filters->categories()->sync($request->category);
        // $category = Category::create($attributes);

        return redirect()->route('admin.products-filters.index')->with('success','Lưu dữ liệu thành công');

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
        $filter = Filter::with('categories')->findOrFail($id);
        $categories = $this->service->allWithSub(0, $id);
        $selectedCategory = $filter->categories->pluck('id')->toArray();

        // print_r($selectedCategory);die;
        return view('admin.productFilters.edit', compact('filter', 'categories', 'selectedCategory'));
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
        $filter = Filter::findOrFail($id);
        $attributes = $request->only([
            'name'
        ]);
        $attributes['is_public'] = $request->is_public?'1':'0';
        $attributes['updated_by'] = Auth::id();
        // print_r($attributes);die;
        $filter->categories()->sync($request->category);
        $filter->fill($attributes);
        $filter->save();

        return redirect()->back()->with('success', 'Lưu dữ liệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Filter::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Xóa dữ liệu thành công');
    }
    public function delete($id)
    {
        //
    }
}
