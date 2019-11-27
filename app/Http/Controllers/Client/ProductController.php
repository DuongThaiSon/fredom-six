<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use App\Models\Category;
use App\Models\ProductAttribute;
use App\Models\Like;

class ProductController extends Controller
{
    public function newArrival(Request $request)

    {
        $productNew = Product::where([['is_new', 1],['is_public', 1]])->with(['categories','productAttributeValues', 'productAttributeValues.productAttribute'])->paginate(16);
        $productNew = $productNew->map(function($q) {
            $q->rate = $q->reviews()->avg('rate');
            return $q;
        });
        
        return view('client.products.newArrival', compact('productNew'));
    }
    Public function detail($slug_cat = null, $slug_view = null)
    {
        $category = Category::where([
            ['type', 'product'],
            ['slug', $slug_cat]
        ])->first();
        $products = $category->products()->with(['productAttributeValues', 'productAttributeValues.productAttribute'])->where('slug', '<>', $slug_view)->take(4)->get();
        $products = $products->map(function($q) {
            $q->rate = $q->reviews()->avg('rate');
            return $q;
        });
        
        $product = Product::with(['productAttributeValues', 'productAttributeValues.productAttribute', 'comments', 'images'])->where('slug', $slug_view)->firstOrFail();
        $rating = $product->reviews()->avg('rate');
        return view('client.products.detail', compact('product', 'category', 'products', 'rating'));
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
    public function productCat($slug_cat = null, Request $request)
    {
        $category = Category::whereType('product');
        if ($slug_cat) {
            $category->whereSlug($slug_cat);
        }
        if($request->term)
        {
            $ids = explode(",", $request->term);
            $category = $category->with(['products' => function($q) use ($ids) {
                $q->whereHas('productAttributeValues', function ($q) use ($ids){
                    return $q->whereIn('id', $ids);
                });
            }, 'productAttributes.productAttributeValues']);
        } else {
            $category = $category->with(['products', 'productAttributes.productAttributeValues']);
        }
        $category = $category->firstOrFail();
        $products = $category->products->map(function($q) {
            $q->rate = $q->reviews()->avg('rate');
            return $q;
        });
        
        return view('client.products.productCat', compact('category', 'products'));
    }

    public function like(Request $request)
    {
        $like = Like::create([
            'product_id' => $request->product_id,
            'user_id' => $request->user_id
        ]);

        return response()->json(compact('like'), 200);
    }
}
