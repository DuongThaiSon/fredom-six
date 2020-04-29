<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart as AppCart;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItems = Cart::getContent();
        return view('client.cart', compact('cartItems'));
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
        $variant = Product::find($request->variant);
        $product = Product::find($request->product_id);
        $cart = [
            'id' => $variant->id,
            'name' => $product->name,
            'price' => $variant->price,
            'quantity' => $request->quantity,
            'attributes' => [
                'category_slug' => $request->category_slug,
                'product_size' => $variant->variantAttributeValues->pluck('value')->first(),
                'product_avatar' => $product->avatar ?? '',
                'product_slug' => $product->slug,
            ]
        ];
        Cart::add($cart);

        return redirect()->route('client.cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        Cart::update($id, ['quantity' => [
            'relative' => false,
            'value' => $request->quantity
        ]]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cartItems = Cart::remove($id);
        return response()->json(compact('cartItems'), 200);
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'ten' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required',
            'total' => 'required'
        ]);
        $cartTotalQuantity = Cart::getTotalQuantity();
        if ($cartTotalQuantity == 0) {
            abort(404);
        }
        $cartItems = Cart::getContent();
        $order = AppCart::create([
            'first_name' => $request->ten,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'payment_status' => 'done',
            // 'total' => $cartSubTotal,
            'total' => $request->total
        ]);

        foreach ($cartItems as $key => $item) {
            $order->cartItems()->create([
                'quantity' => $item->quantity,
                'price' => $item->price,
                'product_id' => $item->id,
            ]);
        }
        Cart::clear();

        return redirect()->route('client.cart');
    }
}
