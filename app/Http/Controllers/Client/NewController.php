<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Image;
use App\Models\Gallery;
use App\Models\Category;

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug_cat = null, Request $request)
    {
        $gallery = Gallery::findOrFail(2);
        $slide = $gallery->images()->orderBy('order', 'desc')->get();        
        
        $category = Category::with('articles')->where([
            ['type', 'article'],
            ['slug', $slug_cat]
        ])->firstOrFail();
        // print_r($category->toArray());die;
        return view('client.new.new', compact('slide', 'category'));
        // $news = Article::where([
        //     ['category_id', '=', '2'],
        //     ['is_public', '=', '1']
        // ])->orderBy('id','desc')->paginate(3);
        // $gallery = Gallery::findOrFail(2);
        // $slide = $gallery->images()->orderBy('order', 'desc')->get();        
        
        // // $category = Category::where([
        // //     ['type', 'article'],
        // //     ['slug', $slug_cat]
        // // ])->firstOrFail();
        // // print_r($category->toArray());die;
        // return view('client.new.new', compact('news', 'slide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug_cat = null, $slug_view = null)
    {
        // $detail = Article::where('slug', $slug_view)->firstOrFail();
        // $newests = Article::where([
        //     ['id', '<>', $detail->id],
        //     ['category_id', '=', '2'],
        //     ['is_public', '=', '1'],
        //     ['is_new', '=', '1']
        // ])->orderBy('id','desc')->limit(3)->get();
        $category = Category::where([
            ['type', 'article'],
            ['slug', $slug_cat]
        ])->first();
        $article = Article::where('slug', $slug_view)->firstOrFail();
        $articles = $category->articles()->where('slug', '<>', $slug_view)->orderBy('id', 'desc')->take(3)->get();

        // print_r($articles->toArray());die;
        return view('client.new.detail', compact('category', 'article', 'articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
