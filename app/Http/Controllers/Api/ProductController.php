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
use App\Models\ProductAttributeValue;
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
            'name' => 'required',
            'sku' => 'required|unique:products',
            'price' => 'required|numeric|min:0',
            'product_code' => 'required',
            'quantity' => 'required|numeric',
            'category' => 'required',
            'showroom' => 'required',
            'unit' => 'required',
            'weight' => 'required',
        ]);

        // basic info
        $attributes = $request->only([
            'name',
            'size_chart',
            'sku',
            'avatar',
            'description',
            'detail',
            'price',
            'unit',
            'weight',
            'product_code',
            'quantity',
        ]);
        $attributes['created_by'] = $attributes['updated_by'] = $request->user()->id;
        $attributes['is_public'] = $attributes['is_highlight'] = $attributes['is_new'] = 0;
        $attributes['order'] = Product::max('order') + 1;
        $slug = Str::slug($attributes['name'], '-');
        while (Product::where('slug', $slug)->get()->count() > 0) {
            $slug .= '-'.rand(0, 9);
        }
        $attributes['slug'] = $slug;
        $product = Product::create($attributes);

        // category
        $categoryIds = [];
        $categories = $request->category;
        foreach (explode(',', $categories) as $cat ) {
            $category = Category::firstOrCreate(['name' => $cat]);
            $categoryIds[] = $category->id;
        }
        $product->categories()->attach($categoryIds);

        // showroom
        $showroomIds = [];
        $showrooms = $request->showroom;
        foreach (explode(',',$showrooms) as $value) {
            $showroom = Showroom::firstOrCreate(['name' => $value]);
            $showroomIds[] = $showroom->id;
        }
        $product->showrooms()->attach($showroomIds);

        // attribute
        $attributes = json_decode($request->attribute);
        foreach ($attributes as $attributeKey => $attributeValue) {
            $attribute = ProductAttribute::firstOrCreate([
                'name' => $attributeKey,
                'type' => $attributeValue->type
            ]);

            $option = $attribute->productAttributeOptions()->firstOrCreate([
                'value' => $attributeValue->option,
                'note' => $attributeValue->note ?? ''
            ]);

            ProductAttributeValue::firstOrCreate([
                'product_id' => $product->id,
                'product_attribute_id' => $attribute->id,
                'product_attribute_option_id' => $option->id,
            ]);
        }

        $images = json_decode($request->additional_images);
        foreach ($images as $image) {
            $product->images()->create([
                'url' => $image,
                'is_public' => 1,
                'order' => Image::max('order') + 1,
                'created_by' => $request->user()->id,
                'updated_by' => $request->user()->id,
            ]);
        }

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
