<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug_cat = null)
    {
        $category = Category::where('slug', $slug_cat)->with(['products' => function($q) {
            $q->where('is_public', 1);
        }])->firstOrFail();
        return view('client.product-list', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug_cat = null, $slug_view = null)
    {
        $product = Product::where('slug', $slug_view)->where('is_public', 1)->firstOrFail()->load(['categories', 'productAttributeOptions', 'variants', 'variants.variantAttributeValues']);
        // $attributes = $product->productAttributeOptions->pluck('value','id' );
        $variants = $product->variants->map(function($q) {
            $q->size = $q->variantAttributeValues->pluck('value')->first();

            $q->quantity = $q->cartItem ? $q->quantity - $q->cartItem->sum('quantity')  : $q->quantity;
            return $q;
        });
        // print_r($variants->load(['cartItem'])->toArray());die;
        $category = Category::where('slug', $slug_cat)->firstOrFail();
        if($product->categories->pluck('id')->contains($category->id)) {
            return view('client.product-detail', compact('product', 'category', 'variants'));
        }
        else {
            abort(404);
        }

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
