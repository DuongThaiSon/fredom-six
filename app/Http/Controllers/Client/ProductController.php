<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use App\Models\Category;
use App\Models\ProductAttribute;

class ProductController extends Controller
{
    public function newArrival(Request $request)

    {   
        $productNew = Product::where('is_new', 1)->simplePaginate(8);
        return view('client.products.newArrival', compact('productNew'));
    }
    Public function detail($id)
    {
        $products = Product::where('product_code', 'like', '%'.'GN'.'%')->simplePaginate(4);
        $reviews = Review::where('is_public', 1)->orderBy('order')->paginate(10);
        $product = Product::with(['productAttributeValues', 'productAttributeValues.productAttribute'])->findOrFail($id);
        // print_r($product->toArray());die;
        return view('client.products.detail', compact('product','reviews', 'products'));
    }
    public function review(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'detail' => 'required',
        ]);
        $atrributes = $request->only([
            'email', 'detail'
        ]);
        
        $review = new Review($atrributes);
        $review->fill($atrributes);
        $review->save();
        return redirect()->back();
    }
    public function productCat($slug_cat, Request $request)
    {
        $category = Category::where([
            ['type', 'product'],
            ['slug', $slug_cat]
        ]);
        if($request->term)
        {
            $ids = explode(",", $request->term);
            $category = $category->with(['products' => function($q) use ($ids) {
                $q->whereHas('productAttributeValues', function ($q) use ($ids){
                    return $q->whereIn('id', $ids);
                });
            }, 'productAttributes.productAttributeValues']);
        }
        else
        {
            $category = $category->with(['products', 'productAttributes.productAttributeValues']);
        }
        $category = $category->first();
        
        return view('client.products.productCat', compact('category'));
    }
}
