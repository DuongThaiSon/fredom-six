<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\User;
use App\Models\Category;
use App\Models\Image;
use App\Models\Showroom;
use App\Services\Admin\ProductCategoryService;
use App\Services\Admin\ProductService;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductService $productService, ProductCategoryService $productCategoryService)
    {
        $this->productService = $productService;
        $this->productCategoryService = $productCategoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->productService->allWithDatatables();
        }
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeOptions = Product::PRODUCT_TYPES;
        $categories = $this->productCategoryService->getSubCategories($parentId = 0, $processId = null, $shouldLoadUpdater = false);
        return view('admin.products.create', compact('categories', 'typeOptions'));
    }

    public function store(StoreProductRequest $request)
    {
        $attributes = $request->only([
            'name',
            'sku',
            'type',
            'category_id',
            'price',
            'unit',
            'weight',
            'height',
            'quantity',
            'is_public',
            'is_highlight',
            'is_new',
            'is_taxable',
            'meta_title',
            'slug',
            'meta_description',
            'meta_keyword',
            'meta_page_topic',
            'avatar',
            'description',
            'detail'
        ]);
        $product = $this->productService->create($attributes);
        return redirect()->route('admin.products.edit', $product->id)->with('success', 'Product created.');
    }

    public function show($id)
    {
        //
    }

    public function edit($productId)
    {
        $product = Product::findOrFail($productId);
        $typeOptions = Product::PRODUCT_TYPES;
        $categories = $this->productCategoryService->getSubCategories($parentId = 0, $processId = $productId, $shouldLoadUpdater = false);
        $productAttributes = ProductAttribute::latest()->with('productAttributeOptions')->get();
        $selectedProductAttributes = collect([]);
        return view('admin.products.edit', compact('categories', 'product', 'productAttributes', 'selectedProductAttributes', 'typeOptions'));
    }

    public function update(UpdateProductRequest $request, $productId)
    {
        $attributes = [
            'name',
            'sku',
            'type',
            'category_id',
            'price',
            'unit',
            'weight',
            'height',
            'quantity',
            'is_public',
            'is_highlight',
            'is_new',
            'is_taxable',
            'meta_title',
            'slug',
            'meta_description',
            'meta_keyword',
            'meta_page_topic',
            'avatar',
            'description',
            'detail'
        ];
        $this->productService->update($attributes, $productId);
        return redirect()->route('admin.products.edit', $productId)->with('success', 'Product updated.');
    }

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
        $products = explode(",", $request->ids);
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
            file_put_contents($destinationPath . '/' . $gitignore, $text);
        }

        $file = $request->file('uploadImage');
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $fileName = uniqid(date('d.m.Y')) . '.' . $extension; // renaming image
        // $file->move($destinationPath, $fileName); // upload origin file to given path
        $uploadImage = \Image::make($file); //
        $uploadImage->save($destinationPath . '/' . $fileName); // upload file with reduce quality
        $currentOrder = \App\Models\Image::max('order');
        $product->images()->create([
            'name' => $fileName,
            'url' => "/media/images/products/{$fileName}",
            'size' => $file->getClientSize(),
            'mime' => $file->getClientMimeType(),
            'order' => $currentOrder ? $currentOrder + 1 : 1,
            'created_by' => auth()->guard('admin')->id(),
            'updated_by' => auth()->guard('admin')->id()
        ]);

        return view('admin.products.imageShowcase', compact('product'));
    }

    public function revertImage(Product $product, Image $image)
    {
        $destinationPath = public_path(env('UPLOAD_DIR_PRODUCT', 'media/products'));
        $fileName = $image->name;
        if (file_exists($destinationPath . '/' . $fileName)) {
            unlink($destinationPath . '/' . $fileName);
        }
        $image->delete();
        return view('admin.products.imageShowcase', compact('product'));
    }
}
