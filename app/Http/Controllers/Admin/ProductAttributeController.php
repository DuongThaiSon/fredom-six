<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;

class ProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = ProductAttribute::latest()->get();
        return view('admin.productAttributes.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productAttributes.create');
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
            'attribute_values.*.value' => 'required'
        ]);

        // print_r($request->can_select);die;
        $productAttribute = ProductAttribute::create([
            'name' => $request->name,
            'can_select' => $request->has('can_select')?'1':'0',
            'allow_multiple' => $request->has('allow_multiple')?'1':'0',
            'created_by' => auth()->guard('admin')->id(),
            'updated_by' => auth()->guard('admin')->id(),
        ]);

        foreach ($request->attribute_values as $value) {
            $productAttribute->productAttributeValues()->create([
                'value' => $value['value']
            ]);
        }

        return redirect()->route('admin.product-attributes.edit', $productAttribute->id)
            ->with('success', 'Tạo thuộc tính mới thành công');
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
        //
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
        //
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
