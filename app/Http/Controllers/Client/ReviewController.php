<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Review;

class ReviewController extends Controller
{
    public function create(Request $request)
    {
        $review = new Review();
        $this->validate($request,[
            'email' => 'required|email',
            'detail' => 'required',
        ]);
        $atrributes = $request->only([
            'email', 'detail'
        ]);
        $review->fill($atrributes);
        $review->save();

    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $review = Review::where('is_public', 1)->orderBy('order')->get()->paginate(10);
        return view('client.products.detail', compact('review', 'product'));
    }
}
