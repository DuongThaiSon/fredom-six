<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;
use App\Models\ProductAttributeValue;
use App\Models\ProductAttributeOption;
use Illuminate\Support\Collection;
use Str;
use DB;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        return view('admin.productVariants.index', [
            'products' => $product->variants()->get()->unique('id')->paginate(4)->withPath(route('admin.variants.index', $product->id)),
            'product' => $product
        ]);
    }

    /**
     * Create Product Variation based on given Attributes.
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'attributes' => 'required|array'
        ]);

        DB::transaction(function () use ($product, $request) {
            $this->makeProductVariation($product, $request->get('attributes'));
        });

        return view('admin.productVariants.index', [
            'products' => $product->variants()->get()->unique('id')->paginate(4)->withPath(route('admin.variants.index', $product->id)),
            'product' => $product
        ]);
    }

    /**
     * Get the Attribute Model from Request.
     * @param \App\Models\Product $product
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    private function makeProductVariation($product, $attributes)
    {
        if (array_unique($attributes) !== null && count(array_unique($attributes)) > 0) {
            $attributeOptions = Collection::wrap(ProductAttribute::find(array_unique($attributes))
                ->load(['productAttributeOptions'])
                ->pluck('productAttributeOptions'))
                ->map(function($q) {
                    return $q->pluck('id');
                });
            $product->attributes()->sync($attributes);
        }

        $combinations = $this->makeCombinations($attributeOptions->toArray());
        $this->createProductVariations($product, $combinations);
    }

    /**
     * Attach Given Property Model to a Product Categories.
     * @param \App\Models\ProductAttribute $attribute
     * @param \App\Models\Product $product
     * @return void
     */
    private function attacheAttributeWithCategories(ProductAttribute $attribute, Product $product)
    {
        if ($product->categories !== null && $product->categories->count() > 0) {
            foreach ($product->categories as $category) {
                $categoryFilterFlag = $this->categoryFilterRepository->isCategoryFilterModelExist(
                    $category->id,
                    $attribute->id,
                    CategoryFilter::ATTRIBUTE_FILTER_TYPE
                );
                if (! $categoryFilterFlag) {
                    $data = [
                        'category_id' => $category->id,
                        'filter_id' => $attribute->id,
                        'type' => CategoryFilter::ATTRIBUTE_FILTER_TYPE,
                    ];
                    $this->categoryFilterRepository->create($data);
                }
            }
        }
    }

    /**
     * @param \App\Models\Product $product
     * @param \Illuminate\Support\Collection $variations
     * @return void
     */
    private function createProductVariations($product, $variations)
    {
        $variationIds = $product->attributeProductValues()->get()->pluck('variant_id');

        Product::destroy($variationIds);

        foreach ($variations as $variation) {
            $this->generateProductData($product, $variation);
        }
    }

    /**
     * Generate Product Data based on given variation id.
     * @param \App\Models\Product $product
     * @param array $options
     * @return array $data
     */
    private function generateProductData($product, $options)
    {
        $data = [
            'name' => $product->name,
            'type' => 'VARIATION',
            'quantity' => $product->quantity,
            'price' => $product->price,
            'unit' => $product->unit,
            'order' => Product::max('order')+1,
            'created_by' => auth()->id(),
            'updated_by' => auth()->id()
        ];

        $optionValues = ProductAttributeOption::find($options)->transform(function($q) {
            return $q->note??$q->value;
        })->implode(" ");
        $data['name'] .= ' ' . $optionValues;
        $data['product_code'] = Str::slug($data['name']);
        $data['slug'] = Str::slug($data['name']);
        $variation = Product::create($data);
        $this->saveAttributeProductValue($product, $options, $variation);
    }

    /**
     * Generate all the possible combinations among a set of nested arrays.
     *
     * @param array $data  The entry point array container.
     * @param array $all   The final container (used internally).
     * @param array $group The sub container (used internally).
     * @param mixed $val   The value to append (used internally).
     * @param int   $i     The key index (used internally).
     */
    private function makeCombinations(array $data, array &$all = [], array $group = [], $value = null, $i = 0)
    {
        $keys = array_keys($data);

        if (isset($value) === true) {
            array_push($group, $value);
        }

        if ($i >= count($data)) {
            array_push($all, $group);
        } else {
            $currentKey = $keys[$i];
            $currentElement = $data[$currentKey];
            foreach ($currentElement as $val) {
                $this->makeCombinations($data, $all, $group, $val, $i + 1);
            }
        }

        return $all;
    }

    /**
     * Store attribute product values into database.
     * @param Product $product
     * @param Collection $attributeOptionIds
     * @param \App\Models\Product $variation
     * @return void
     */
    private function saveAttributeProductValue($product, $attributeOptionIds, $variation)
    {
        $optionModels = ProductAttributeOption::find($attributeOptionIds);
        foreach ($optionModels as $optionModel) {     
            ProductAttributeValue::firstOrCreate([
                'product_id' => $product->id,
                'product_attribute_id' => $optionModel->productAttribute->id,
                'product_attribute_option_id' => $optionModel->id,
                'variant_id' => $variation->id,
            ]);
        }
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
     * @param  \App\Models\Product $variant
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, Product $variant)
    {
        return view('admin.productVariants.edit', compact('product', 'variant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, Product $variant)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'numeric',
            'product_code' => 'unique:'.(new Product)->getTable().',product_code,'.$variant->id,
            'quantity' => 'numeric',
            'avatar' => 'sometimes|image' 
        ]);

        $attributes = $request->only([
            'name', 'price', 'product_code', 'quantity'
        ]);

        if ($request->hasFile('avatar')) {
            $destinationPath = public_path(env('UPLOAD_DIR_PRODUCT', 'media/images/products')); // upload path
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
                $gitignore = '.gitignore';
                $text = "*\n!.gitignore\n";
                file_put_contents($destinationPath.'/'.$gitignore, $text);
            }

            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $fileName = uniqid(date('d.m.Y')) . '.' . $extension; // renaming image
            // $file->move($destinationPath, $fileName); // upload origin file to given path
            $uploadImage = \Image::make($file); //
            $uploadImage->save($destinationPath.'/'.$fileName); // upload file with reduce quality
            $attributes['avatar'] = $fileName;
        }
        $attributes['is_public'] = $request->has('is_public');
        $attributes['updated_by'] = auth()->id();
        $variant->fill($attributes);
        $variant->save();

        return view('admin.productVariants.index', [
            'products' => $product->variants()->get()->unique('id')->paginate(4)->withPath(route('admin.variants.index', $product->id)),
            'product' => $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Product $variant)
    {        
        $variant->delete();
        return view('admin.productVariants.index', [
            'products' => $product->variants()->get()->unique('id')->paginate(4)->withPath(route('admin.variants.index', $product->id)),
            'product' => $product
        ]);
    }
    
    /**
     * Reorder variant
     */
    public function reorder(Request $request)
    {
        $items = $request->sort;
		$order = array();
		foreach ($items as $c) {
			$id      = str_replace('item_', '', $c);
			$order[] = Product::findOrFail($id)->order;
		}
		rsort($order);
		foreach ($order as $k => $v) {
            Product::where('id', str_replace('item_', '', $items[$k]))->update(['order' => $v]);
        }
    }
}
