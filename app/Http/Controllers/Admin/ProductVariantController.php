<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\Admin\ProductService;
use App\Services\Admin\ProductVariantService;

class ProductVariantController extends Controller
{
    public function __construct(ProductVariantService $productVariantService, ProductService $productService)
    {
        $this->productService = $productService;
        $this->productVariantService = $productVariantService;
    }

    public function index(Request $request, $productId)
    {
        if ($request->wantsJson()) {
            return $this->productVariantService->allWithDatatables($productId);
        }
        return;
    }

    /**
     * Create Product Variation based on given Attributes.
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $productId)
    {
        $request->validate([
            'attribute_options' => 'required|array'
        ]);
        $this->productVariantService->create($request->get('attribute_options'), $productId);
        return response()->json([], 204);
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

    public function edit($productId, $variantId)
    {
        $product = Product::findOrFail($productId);
        $variant = Product::findOrFail($variantId);
        return view('admin.productVariants.edit', compact('product', 'variant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productId, $variantId)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'numeric',
            'sku' => 'unique:' . (new Product)->getTable() . ',sku,' . $variantId,
            'quantity' => 'numeric',
            'avatar' => 'sometimes|image'
        ]);
        $attributes = $request->only([
            'name', 'price', 'sku', 'quantity'
        ]);
        $this->productVariantService->update($attributes, $variantId);
        return response()->json([], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($productId, $variantId)
    {
        $this->productVariantService->destroy($variantId);
        return response()->json([], 204);
    }
}
