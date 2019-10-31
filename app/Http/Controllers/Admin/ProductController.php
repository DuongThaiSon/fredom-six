<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\ProductService;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\User;


class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductService $service)
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
        $products = Product::orderBy('order', 'desc')->with(['categories', 'updater'])->simplePaginate();
        $categories = $this->service->allWithSub();
        $users = User::all();
        return view('admin.products.index', compact('products','categories', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->service->allWithSub();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $this->service->productCreate($request->all());
        $product = Product::create($attributes);
        $product->categories()->attach($request->category);

        return redirect()->back();
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
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = $this->service->allWithSub($product->id);
        $productAttributes = ProductAttribute::all();
        $product->load(['productAttributeValues.productAttribute']);
        // print_r($product->toArray());die;
        $productAttributeSelected = collect($product);
        $productAttributeSelected= collect($productAttributeSelected['product_attribute_values'])->pluck('product_attribute');
        $productAttributeSelected = $productAttributeSelected->unique('name')->pluck('id');
        $productAttributeSelected = ProductAttribute::find($productAttributeSelected);
        return view('admin.products.edit', compact('categories', 'product', 'productAttributes', 'productAttributeSelected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $productAttributes = ProductAttribute::findOrFail(collect($request->attribute_values)->keys()->all());
        $syncData = [];
        foreach ($productAttributes as $productAttribute) {


            if (!$productAttribute->can_select) {
                $productAttribute->productAttributeValues()->update([
                    'value' => collect($request->attribute_values[13])->first()
                ]);
                $syncData[] = collect($request->attribute_values[$productAttribute->id])->keys()->first();
            } else {
                $syncData = array_merge($request->attribute_values[$productAttribute->id], $syncData);
            }


        }
        $product->productAttributeValues()->sync($syncData);
        return redirect()->back()->with('success', 'Cập nhật sản phẩm thành công');
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

    public function fetchOption(Request $request)
    {
        $request->validate([
            'checked_ids' => 'required'
        ]);
        $productAttributes = ProductAttribute::findOrFail($request->checked_ids)->load(['productAttributeValues']);
        if ($request->has('product_id')) {
            $product = Product::findOrFail($request->product_id);
        }
        return view('admin.partials.productAttributeOptions', compact('product', 'productAttributes'));
    }
}
