<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use App\Models\Category;
use App\Models\Filter;
use App\Models\ProductAttribute;
use App\Models\Like;

class ProductController extends Controller
{
    public function newArrival(Request $request)

    {
        $productNew = Product::where([['is_new', 1],['is_public', 1]])->with(['categories'])->paginate(16);
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
        $products = $category->products()->with(['productAttributeOptions', 'productAttributeOptions.productAttribute'])->where('slug', '<>', $slug_view)->take(4)->get();
        $products = $products->map(function($q) {
            $q->rate = $q->reviews()->avg('rate');
            return $q;
        });
        // print_r($products->toArray());die;
        $product = Product::with(['comments', 'images'])->where('slug', $slug_view)->firstOrFail();
        // print_r($product);die;
        $rating = $product->reviews()->avg('rate');
        return view('client.products.detail', compact('product', 'category', 'products', 'rating'));
    }
    public function review(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'detail' => 'required',
        ]);
        $attributes = $request->only([
            'email', 'detail'
        ]);

        $review = new Review($attributes);
        $review->fill($attributes);
        $review->save();
        return redirect()->back();
    }
    public function productCat($slug_cat = null, Request $request)
    {
        // print_r($request->all());die;
        $products = Product::query();
        if($request->categories)
        {
            $categories = $request->categories;
            $products = $products->whereHas('categories', function($q) use ( $categories) {
                return $q->whereIn('id', $categories);
            });
            // print_r($products->toArray());die;
        }
        if($request->properties)
        {
            $properties = $request->properties; // STOP HERE ALREADY SEARCH PROPERTIES AND FILTER
            // print_r($properties);die;
            $products = $products->whereHas('productAttributeOptions', function($q) use ($properties) {
                return $q->whereIn('product_attribute_option_id', $properties);
            });
        }
        else
        {
            $products = $products->whereHas('categories', function($q) use ($slug_cat) {
                return $q->where('slug', $slug_cat);
            });
        }
        $products = $products->get()->load([ 'productAttributeOptions']);

        $category = Category::where([
            ['type', 'product'],
            ['slug', $slug_cat]
        ])->firstOrFail();
        $category_id = $category->id;
        $filters = Filter::where('is_public', 1)->get()->load(['categories']);

        // print_r($filters[0]->categories);die;

        // print_r($filters->toArray());die;
        // $category = Category::whereType('product');
        // if ($slug_cat) {
        //     $category->whereSlug($slug_cat);
        // }
        // if($request->term)
        // {
        //     $ids = explode(",", $request->term);
        //     $category = $category->with(['products' => function($q) use ($ids) {
        //         $q->whereHas('productAttributeOptions', function ($q) use ($ids){
        //             return $q->whereIn('id', $ids);
        //         });
        //     }, 'productAttributes.productAttributeOptions']);
        // } else {
        //     $category = $category->with(['products', 'productAttributes.productAttributeOptions']);
        // }
        // $category = $category->firstOrFail();
        // $products = $category->products->map(function($q) {
        //     $q->rate = $q->reviews()->avg('rate');
        //     return $q;
        // });

        return view('client.products.productCat', compact('category', 'products', 'filters'));
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
