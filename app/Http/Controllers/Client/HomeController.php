<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Image;
use App\Models\Category;
use App\Models\Component;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        
        $slide = Image::where([
            ['imageable_id', '=', '2'],
            ['is_public', '=', '1']
        ])->orderBy('order', 'desc')->get();
        $articles = Article::where('category_id', 2)->get();
        $articleIntro = Category::with('articles')->where('id', 1)->firstOrFail();
        $articleReview = Category::with('articles')->where('id', 13)->firstOrFail();
        $quote = Article::where('category_id', 14)->firstOrFail();
        $products = Category::with('products')->where('id', 15)->firstOrFail();
        $lookbook = Category::with('articles')->where('id', 16)->firstOrFail();
        // print_r($products->toArray());die;
        return view('client.index', compact('articles','articleReview', 'slide', 'articleIntro', 'quote', 'products', 'lookbook'));
    }
    // public function __construct($layout)
    // {
    //     $this->layout = $layout;
    // }

    // public function compose(View $view)
    // {
    //     $view->with('layout', $this->layout->count());
    // }
}
