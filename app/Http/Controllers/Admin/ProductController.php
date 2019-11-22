<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\ProductService;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\User;
use App\Models\Category;


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
        $product->load(['productAttributeValues.productAttribute', 'categories.productAttributes']);
        $selectedCategory = $product->categories->first();
        if ($product->categories->count()) {
            $productAttributes = $product->categories->first()->productAttributes;
        } else {
            $productAttributes = ProductAttribute::all();
        }
        $selectedProductAttributes = $product->productAttributeValues->pluck('productAttribute')->unique('id');
        return view('admin.products.edit', compact('categories', 'product', 'productAttributes', 'selectedProductAttributes'));
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
        $product->categories()->sync($request->category);
        $attributes = $this->service->appendEditData($request->all());
        $product = Product::findOrFail($request->id);
        $product = $product->fill($attributes);
        $product->save();
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
        Product::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Xóa dữ liệu thành công');
    }

    public function fetchOption(Request $request)
    {
        $request->validate([
            'checked_ids' => 'required'
        ]);
        $productAttributes = ProductAttribute::findOrFail($request->checked_ids)->load(['productAttributeValues']);
        if ($request->has('product_id')) {
            $product = Product::findOrFail($request->product_id);
        } else {
            $product = new Product;
        }
        return view('admin.partials.productAttributeOptions', compact('product', 'productAttributes'));
    }

    public function fetchAttributeOption(Request $request)
    {
        // print_r($request->all());die;
        // $request->validate([
        //     'checked_ids' => 'required'
        // ]);
        $productAttributes = Category::whereIdAndType($request->category_id, 'product')->firstOrFail()->productAttributes()->get();
        return view('admin.partials.productAttributeModalOptions', compact('productAttributes'));
    }
}
