<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Services\Traits\RequestDataCreate;
use App\Http\Services\Traits\RequestDataEdit;
use App\Http\Services\Traits\CategoryTrait;
use App\Http\Services\MenuCategoryService;
use Auth;
use Illuminate\Support\Str;

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
        $categories = Category::where('type', 'menu')->with('user')->get();
        return view('admin.menuCats.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->service->allWithSub();
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
            'parent_id' => 'min:0',
            'name' => 'required|unique:categories',
        ]);

        $attributes = $request->only([
             'name',
        ]);
        $attributes['parent_id'] = '0';
        $attributes['type'] = 'menu';
        $attributes['created_by'] = Auth::user()->id;
        $attributes['is_public'] = isset($request->is_public)?1:0;
        $attributes['order'] = Category::max('order') ? (Category::max('order') + 1) : 1;
        $attributes['slug'] = Str::slug($request->name,'-').$request->id;

        $category = Category::create($attributes);
        return redirect()->route('admin.menu-categories.index')->with('message', 'Lưu dữ liệu thành công');
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
        $categories = Category::findOrFail($id);
        return view('admin.menuCats.edit', compact('categories'));
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
        print_r($request->all());die;
        $request->validate([
            'name' => 'required|unique:categories'
        ]);
        $attributes = $request->only([
            'name', 
        ]);

        $attributes['updated_by'] = Auth::user()->id;
        $attributes['is_public'] = isset($request->is_public)?1:0;
        $attributes['slug'] = Str::slug($request->name,'-').$request->id;
        $categories = Category::findOrFail($id);
        $categories->fill($attributes);
        $categories->save();
        return redirect()->route('admin.menu-categories.edit', $categories->id)->with('message', 'Lưu dữ liệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
