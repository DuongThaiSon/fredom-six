<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::where('name', 'like', '%'.$request->name.'%')->where('type','BASIC')->where('is_public', 1)->get();
        return view('client.search', compact('products'));
    }
}
