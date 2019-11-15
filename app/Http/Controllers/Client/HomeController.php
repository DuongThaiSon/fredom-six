<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Image;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $productNew = Product::where('is_new', 1)->simplePaginate(8);
        print_r($productNew->toArray());die;
        $slide = Image::where([
            ['imageable_id', '=', '2'],
            ['is_public', '=', '1']
        ])->orderBy('order', 'desc')->get();
        $articles = Article::where('category_id', 2)->get();
        $articleIntro = Article::where('category_id', 1)->firstOrFail();
        $articleReview = Article::where('category_id', 25)->get();
        $quote = Article::where('category_id', 26)->firstOrFail();
        $products = Category::with('products')->where('id', 27)->firstOrFail();
        // print_r($products->toArray());die;
        return view('client.index', compact('articles','articleReview', 'slide', 'articleIntro', 'quote', 'products'));
    }
}
