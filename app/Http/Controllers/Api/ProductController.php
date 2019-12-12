<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\ProductService;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\User;
use App\Models\Category;
use App\Models\Image;
use App\Models\Showroom;
use Auth;
use Str;

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
    protected function guard()
    {
        return Auth::guard('admin');
    }
    // public function model()
    // {
    //     return Product::class;
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            // 'sku' => 'required|unique'
        ]);
        $attributes = $request->only([
            'name', 'meta_title', 'slug', 'size_chart', 'meta_description', 'meta_keyword', 'sku',
            'meta_page_topic', 'avatar', 'description', 'detail', 'price', 'discount', 'unit', 'weight', 'product_code', 'quantity',
        ]);
        $attributes['created_by'] = $attributes['updated_by'] = $this->guard()->id();
        $attributes['is_public'] = array_key_exists('is_public', $attributes)?'1':'0';
        $attributes['is_highlight'] = array_key_exists('is_highlight', $attributes)?'1':'0';
        $attributes['is_new'] = array_key_exists('is_new', $attributes)?'1':'0';
        $attributes['order'] = Product::max('order') + 1;
        if (!$request->has('slug')) {
            $slug = Str::slug($attributes['name'], '-');
            while (Product::where('slug', $slug)->get()->count() > 0) {
                $slug .= '-'.rand(0, 9);
            }
            // $attributes['slug'] = $slug;
        }
        $attribute = $request->attribute;
        print_r($attributes);die;
        $categories = $request->category_name;
        $showrooms = $request->store_location;
        $categoryIds = [];
        foreach (explode(',', $categories) as $cat ) {
            $category = Category::firstOrCreate(['name' => $cat]);
            $categoryIds[] = $category->id;
        }

        // print_r($showrooms);die;
        $product = Product::create($attributes);
        
        $showroomIds = [];
        foreach (explode(',',$showrooms) as $value) {
            $showroom = Showroom::firstOrCreate(['name' => $value]);
            $showroomIds[] = $showroom->id; 
        }
        $product->showrooms()->sync($showroomIds);
        $product->categories()->attach($categoryIds);

        return response()->json([
            'message' => 'Product store successfully.',
            'data' => $product
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
