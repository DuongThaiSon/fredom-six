<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Category;
use App\Models\Image;
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

    public function clone($productId)
    {
        $product = $this->productService->findOrFail($productId);
        $typeOptions = Product::PRODUCT_TYPES;
        $categories = $this->productCategoryService->getSubCategories($parentId = 0, $processId = null, $shouldLoadUpdater = false);
        $productAttributes = ProductAttribute::latest()->with('productAttributeOptions')->get();
        $selectedId = $product->categories()->get()->pluck('id');
        return view('admin.products.create', compact('categories', 'product', 'productAttributes', 'selectedId', 'typeOptions'));
    }

    public function edit($productId)
    {
        $product = $this->productService->findOrFail($productId);
        $typeOptions = Product::PRODUCT_TYPES;
        $categories = $this->productCategoryService->getSubCategories($parentId = 0, $processId = null, $shouldLoadUpdater = false);
        $productAttributes = ProductAttribute::latest()->with('productAttributeOptions')->get();
        $selectedId = $product->categories()->get()->pluck('id');
        return view('admin.products.edit', compact('categories', 'product', 'productAttributes', 'selectedId', 'typeOptions'));
    }

    public function update(UpdateProductRequest $request, $productId)
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
        $this->productService->update($attributes, $productId);
        return redirect()->route('admin.products.edit', $productId)->with('success', 'Product updated.');
    }

    public function destroy($productId)
    {
        $product = $this->productService->findOrFail($productId);
        if ($this->productService->destroy($product)) {
            return response()->json([], 204);
        }

        return response()->json([
            'message' => "failed_to_delete"
        ], 400);
    }

    public function destroyMany(Request $request)
    {
        if ($this->productService->destroyMany($request->ids)) {
            return response()->json([], 204);
        }

        return response()->json([
            'message' => "failed_to_delete"
        ], 400);
    }

    public function updateViewStatus(Request $request)
    {
        $article = $this->productService->updateViewStatus($request->id, $field = $request->field, $request->value);
        return response()->json(['value' => $article->$field], 200);
    }

    public function moveTop($productId)
    {
        $product = $this->productService->findOrFail($productId);
        if ($this->productService->moveTop($product)) {
            return response()->json([], 204);
        }

        return response()->json([
            'message' => "failed_to_move"
        ], 500);
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

    public function reorder(Request $request)
    {
        $this->productService->reorder($request->sort, 'item_');
        return response()->json([], 204);
    }
}
