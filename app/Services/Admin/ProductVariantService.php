<?php

namespace App\Services\Admin;

use App\Models\Product;
use App\Models\ProductAttributeOption;
use App\Models\ProductAttributeValue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ProductVariantService
{

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function create(array $attributeOptionIds, string $productId)
    {
        $product = Product::findOrFail($productId);
        DB::transaction(function () use ($product, $attributeOptionIds) {
            $this->makeProductVariation($attributeOptionIds, $product);
        });
    }

    public function update(array $attributes, $variationId)
    {
        $product = Product::whereType('VARIATION')->whereId($variationId)->firstOrFail();
        $attributes['is_public'] = array_key_exists('is_public', $attributes) ? 1 : 0;
        $attributes['is_taxable'] = array_key_exists('is_taxable', $attributes) ? 1 : 0;
        if (array_key_exists('avatar', $attributes)) {
            $attributes['avatar'] = $this->uploadImage($attributes['avatar'], $this->getDestinationUploadDir());
        }
        if (array_key_exists('slug', $attributes) && !$attributes['slug']) {
            $slug = Str::slug($attributes['name'], '-');
            while (Product::where('slug', $slug)->get()->count() > 0) {
                $slug .= '-' . rand(0, 9);
            }
            $attributes['slug'] = $slug;
        }
        $attributes['updated_by'] = $this->guard()->id();
        $product->fill($attributes);
        $product->save();
        return $product;
    }

    public function destroy($variationId)
    {
        $product = Product::whereType('VARIATION')->whereId($variationId)->firstOrFail();
        $product->delete();
    }

    public function allWithDatatables($productId)
    {
        $product = Product::withoutVariation()->whereId($productId)->firstOrFail();
        $list = $product->variants()->orderBy('order', 'desc')->get()->unique('id');

        return DataTables::of($list)
            ->setRowClass(function () {
                return 'ui-state-default';
            })
            ->setRowId(function ($row) {
                return "item_{$row->id}";
            })
            ->addColumn('route', function ($row) use ($productId) {
                return [
                    'edit' => route('admin.variants.edit', ['productId' => $productId, 'variantId' => $row->id]),
                    'destroy' => route('admin.variants.destroy', ['productId' => $productId, 'variantId' => $row->id]),
                ];
            })
            ->make(true);
    }

    /**
     * Get the Attribute Model from Request.
     * @param \App\Models\Product $product
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    private function makeProductVariation($attributeOptionIds, $product)
    {
        if (array_unique($attributeOptionIds) !== null && count(array_unique($attributeOptionIds)) > 0) {
            $attributes = ProductAttributeOption::find($attributeOptionIds);
            $attributeIds = $attributes->load('productAttribute')->pluck('productAttribute')->unique('id')->pluck('id');
            $groupOptionIds = $attributes->groupBy('product_attribute_id')
                ->map(function ($q) {
                    return $q->pluck('id');
                })
                ->toArray();
            $product->attributes()->sync($attributeIds);
        }

        $combinations = $this->makeCombinations($groupOptionIds);
        $this->createProductVariations($product, $combinations);
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
            'avatar' => $product->avatar,
            'unit' => $product->unit,
            'order' => Product::max('order') + 1,
            'created_by' => auth()->id(),
            'updated_by' => auth()->id()
        ];

        $optionValues = ProductAttributeOption::find($options)->transform(function ($q) {
            return $q->note ?? $q->value;
        })->implode(" ");
        $data['name'] .= ' ' . $optionValues;
        $sku = $product->sku;
            while (Product::where('sku', $sku)->get()->count() > 0) {
                $sku .= '-' . rand(0, 9);
            }
        $data['sku'] = $sku;
        $data['slug'] = Str::slug($data['name']);
        $variation = Product::create($data);
        $this->saveAttributeProductValue($product, $options, $variation);
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
}
