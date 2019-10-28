<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function product(Request $request)
    {
        $product = Product::get();
        return view('client.products.product', compact('product'));
    }
    Public function detail($id)
    {
        $product = Product::findOrFail($id);
        return view('client.products.detail', compact('product'));
    }
}
