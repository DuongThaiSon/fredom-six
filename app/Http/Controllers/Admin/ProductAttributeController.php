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
            'attribute_values.*.value' => 'required_with:can_select'
        ]);

        // print_r($request->can_select);die;
        $productAttribute = ProductAttribute::create([
            'name' => $request->name,
            'can_select' => $request->has('can_select')?'1':'0',
            'allow_multiple' => $request->has('allow_multiple')?'1':'0',
            'created_by' => auth()->guard('admin')->id(),
            'updated_by' => auth()->guard('admin')->id(),
        ]);

        foreach ($request->attribute_values as $data) {
            $productAttribute->productAttributeValues()->create([
                'value' => $data['value']
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
    public function edit(ProductAttribute $productAttribute)
    {
        return view('admin.productAttributes.edit', compact('productAttribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductAttribute $productAttribute)
    {
        $request->validate([
            'name' => 'required',
            'attribute_values.*.value' => 'required'
        ]);

        $productAttribute = $productAttribute->fill([
            'name' => $request->name,
            'type' => $request->type,
            'can_select' => $request->has('can_select')?'1':'0',
            'allow_multiple' => $request->has('allow_multiple')?'1':'0',
            'updated_by' => auth()->guard('admin')->id(),
        ]);
        $productAttribute->save();


        $keepIds = collect($request->attribute_values)
            ->reject(function($data) {
                return empty($data['id']);
            })
            ->pluck('id')
            ->toArray();

        $productAttribute->productAttributeValues()->whereNotIn('id', $keepIds)->delete();
        foreach ($request->attribute_values as $data) {
            $productAttribute->productAttributeValues()->updateOrCreate(['id'=>$data['id']], [
                'value' => $data['value']
            ]);
        }

        return redirect()->route('admin.product-attributes.edit', $productAttribute->id)
            ->with('success', 'Cập nhật thuộc tính mới thành công');
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
