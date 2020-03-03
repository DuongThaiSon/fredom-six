<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productParentCat = Category::find(6);
        $productCat = Category::where([['is_public', 1], ['parent_id', 6]])->orderBy('order')->get();
        foreach ($productCat as $item) {
            $products[$item->id] = $item->articles->where('is_public', 1)->sortBy('order')->paginate(9);
        }
        $allProducts = $productCat->pluck('articles')
            ->flatten(1)
            ->unique('id')
            ->sortByDesc('order')
            ->where('is_public', 1)
            ->paginate(9);

        return view('client.product', compact('productCat', 'products', 'allProducts', 'productParentCat'));
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
    public function show($slug)
    {
        $product = Article::where([['is_public', 1], ['slug', $slug]])->first();
        $category = $product->category;
        $reportCat = Category::find(4);
        $reports = optional($reportCat->articles)->where('is_public', 1)->sortBy('order');

        return view('client.productDetail', compact('product', 'category', 'reports'));
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
