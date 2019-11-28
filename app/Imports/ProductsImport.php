<?php

namespace App\Imports;

use Illuminate\Http\Request;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;
use Auth;

class ProductsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return Product::create([
            'name'          => $row['name'], 
            'price'         => $row['price'], 
            'discount'      => $row['discount'],  
            'unit'          => $row['unit'],
            'product_code'  => $row['product_code'],
            'size_chart'    => $row['size_chart'],
            'description'   => $row['description'],
            'detail'        => $row['detail'],
            'is_public'     => $row['is_public'],
            'is_highlight'  => $row['is_highlight'],
            'is_new'        => $row['is_new'],
            'slug'          => Str::slug($row['name'], '-'),
            'quantity'      => $row['quantity'],
            'order'         => Product::max('order') ? (Product::max('order') + 1) : 1,
            'created_by'    => Auth::id(),
        ]);
    }
}
