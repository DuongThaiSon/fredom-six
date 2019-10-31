<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;

class ProductController extends Controller
{
    public function product(Request $request)
    {
        $product = Product::get();
        return view('client.products.product', compact('product'));
    }
    Public function detail($id)
    {
        // $review_count = Review::where('public', 1)->count();
        $products = Product::where('product_code', 'DEF')->simplePaginate(4);
        $reviews = Review::where('is_public', 1)->orderBy('order')->paginate(10);
        $product = Product::findOrFail($id);
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
}
