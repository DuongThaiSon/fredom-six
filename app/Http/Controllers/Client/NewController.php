<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Image;
use App\Models\Gallery;

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = Article::where([
            ['category_id', '=', '2'],
            ['is_public', '=', '1']
        ])->orderBy('id','desc')->paginate(3);
        $gallery = Gallery::findOrFail(2);
        $slide = $gallery->images()->orderBy('order', 'desc')->get();
        // $firstSlide = $slide = Image::where([
        //     ['imageable_id', '=', '2'],
        //     ['is_public', '=', '1']
        // ])->orderBy('id')->first();
        return view('client.new.new', compact('news', 'slide'));
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
    public function show($slug_view)
    {
        $detail = Article::where('slug', $slug_view)->firstOrFail();
        $newests = Article::where([
            ['id', '<>', $detail->id],
            ['category_id', '=', '2'],
            ['is_public', '=', '1'],
            ['is_new', '=', '1']
        ])->orderBy('id','desc')->limit(3)->get();

        return view('client.new.detail', compact('newests', 'detail'));
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
