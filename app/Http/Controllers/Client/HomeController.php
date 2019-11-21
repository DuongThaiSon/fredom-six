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
        $articleIntro = Category::with('articles')->find(1);
        $articleReview = Category::with('articles')->find(13);
        $quote = Article::where('category_id', 14)->firstOrFail();
        $products = Category::with('products')->find(15);
        $lookbook = Category::with('articles')->find(16);
        $partner =  Image::where('imageable_id', 4)->get();
        $sale = Image::where('imageable_id',5)->get();
        $saleBanner = Category::find(18);
        $luxury = Category::find(19);
        $business = Category::find(20);
        $classic = Category::find(21);
        $gifts = Category::find(22);
        // print_r($partner->toArray());die;
        return view('client.index', compact('articles','articleReview', 'slide', 'articleIntro', 'quote', 'products', 'lookbook', 'partner','sale', 'saleBanner', 'luxury', 'business', 'classic', 'gifts'));
    }
}
