<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use App\Models\Category;
use App\Models\ProductAttributeValue;
use App\Models\ProductAttribute;

class ProductController extends Controller
{
    public function product(Request $request)

    {   $productAttr = ProductAttribute::get();
        $product = Product::simplePaginate(8);
        
        return view('client.products.product', compact('product', 'productAttr'));
    }
    Public function detail($id)
    {
        $products = Product::where('product_code', 'like', '%'.'GN'.'%')->simplePaginate(4);
        $reviews = Review::where('is_public', 1)->orderBy('order')->paginate(10);
        $product = Product::with(['productAttributeValues', 'productAttributeValues.productAttribute'])->findOrFail($id);
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
    public function productCat($slug_cat)
    {
        $category = Category::where([
            ['type', 'product'],
            ['slug', $slug_cat]
        ])->with(['products'])->first();
        
        return view('client.products.productCat', compact('category'));
    }
    public function searchProduct(Request $request)
    {
        if($request->key != ""){
            $attrsResult = ProductAttributeValue::with('products')->where('value', 'like', '%'.$request->key.'%')->get();
            return view('client.products.search')->with([
                'attrs' => !empty($attrsResult) ? $attrsResult->pluck('products')->collapse() : []
            ]);
        }
        else{
            $product = Product::simplePaginate(8);
            return view('client.products.product', compact('product'));
        }
        
    }
}
