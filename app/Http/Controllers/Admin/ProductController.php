<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\ProductService;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\User;
use App\Models\Category;
use App\Models\Image;
use App\Models\Showroom;

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
        $products = Product::withoutVariation()->orderBy('order', 'desc')->with(['categories:name', 'updater'])->simplePaginate();
        // $categories = $this->service->allWithSub();
        // $users = User::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $showrooms = Showroom::get();
        $typeOptions = Product::PRODUCT_TYPES;
        $categories = $this->service->allWithSub();
        return view('admin.products.create', compact('categories', 'typeOptions', 'showrooms'));
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
        $product->showrooms()->sync($request->showroom);
        $product->categories()->attach($request->category);

        return redirect()->route('admin.products.edit', $product->id)->with('success', 'Thêm mới sản phẩm thành công');
    }


    public function createProduct(Request $request)
    {
        // 'name',
        // 'category_name',
        // 'avatar',
        // 'description',
        // 'detail',        
        // 'price',
        // 'discount',
        // 'unit',
        // 'weight',
        // 'product_code',
        // 'quantity',
        // 'store_location',

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
        $showrooms = Showroom::get();
        // print_r($showrooms[0]->district);die;
        $typeOptions = Product::PRODUCT_TYPES;
        $categories = $this->service->allWithSub($product->id);
        $product->load(['attributes', 'categories.productAttributes', 'reviews' => function($q) {
            $q->orderBy('created_at', 'desc');
        }]);
        $selectedCategory = $product->categories->first();
        if ($product->categories->count()) {
            $productAttributes = $product->categories->first()->productAttributes;
        } else {
            $productAttributes = ProductAttribute::all();
        }
        $selectedProductAttributes = $product->attributes->pluck('id');
        $selectedShowroom = $product->showrooms->pluck('id')->toArray();
        // print_r($selectedShowroom);die;
        return view('admin.products.edit', compact('categories', 'product', 'productAttributes', 'selectedProductAttributes', 'typeOptions', 'showrooms'));
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
        $product->showrooms()->sync($request->showroom);
        $product->categories()->sync($request->category);
        // print_r($product->toArray());die;
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
        $productAttributes = ProductAttribute::findOrFail($request->checked_ids)->load(['productAttributeOptions']);
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

    public function deleteMany(Request $request)
    {
        $products = explode(",",$request->ids);
        foreach ($products as $product) {
            Product::findOrFail($product)->delete();
        }
        return redirect()->back()->with('win', 'Xóa dữ liệu thành công');
    }

    public function processImage(Request $request, Product $product)
    {
        $request->validate([
            'uploadImage' => 'required|image'
        ]);

        $destinationPath = public_path(env('UPLOAD_DIR_PRODUCT', 'media/products')); // upload path
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
            $gitignore = '.gitignore';
            $text = "*\n!.gitignore\n";
            file_put_contents($destinationPath.'/'.$gitignore, $text);
        }

        $file = $request->file('uploadImage');
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $fileName = uniqid(date('d.m.Y')) . '.' . $extension; // renaming image
        // $file->move($destinationPath, $fileName); // upload origin file to given path
        $uploadImage = \Image::make($file); //
        $uploadImage->save($destinationPath.'/'.$fileName); // upload file with reduce quality
        $currentOrder = \App\Models\Image::max('order');
        $product->images()->create([
            'name' => $fileName,
            'url' => "/media/images/products/{$fileName}",
            'size' => $file->getClientSize(),
            'mime' => $file->getClientMimeType(),
            'order' => $currentOrder?$currentOrder+1:1,
            'created_by' => auth()->guard('admin')->id(),
            'updated_by' => auth()->guard('admin')->id()
        ]);

        return view('admin.products.imageShowcase', compact('product'));
    }

    public function revertImage(Product $product, Image $image)
    {
        $destinationPath = public_path(env('UPLOAD_DIR_PRODUCT', 'media/products'));
        $fileName = $image->name;
        if (file_exists($destinationPath.'/'.$fileName)) {
            unlink($destinationPath.'/'.$fileName);
        }
        $image->delete();
        return view('admin.products.imageShowcase', compact('product'));
    }
}
