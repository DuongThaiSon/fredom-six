<?php

namespace App\Exports;

use App\Models\Product;
// use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::all();
    }
    public function map($product): array
    {
        return [
            $product->name,
            $product->price,
            $product->discount,
            $product->unit,
            $product->product_code,
            $product->size_chart,
            $product->description,
            $product->detail,
            $product->is_public,
            $product->is_highlight,
            $product->is_new,
            $product->quantity,
            
        ];
    }
    public function headings(): array
    {
        return [
            'name',
            'price',
            'discount',
            'unit',
            'product_code',
            'size_chart',
            'description',
            'detail',
            'is_public',
            'is_highlight',
            'is_new',
            'quantity',
        ];
    }
}
