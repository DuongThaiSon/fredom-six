<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use App\Models\Product;
use App\Models\Cart as Order;

class CartController extends Controller
{
    public function index()
    
    {
        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'Khuyến Mãi',
            'type' => 'number',
            'target' => 'total', // this condition will be applied to cart's subtotal when getSubTotal() is called.
            'value' => '-500000',
        ));
        Cart::condition($condition);
        $cartItems = Cart::getContent();
        // print_r($cartItems);die;
        // Cart::clear();
        return view('client.carts.index', compact('cartItems'));
    }
    public function add(Request $request)
    {
        $product = Product::findOrFail($request->id);
        Cart::add(array(
            'id' => $request->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'avatar' => $product->avatar,
                'product_code' => $product->product_code,
            )
        ));

        return response()->json(['quantity' => Cart::getTotalQuantity()>5?'5+':Cart::getTotalQuantity()], 200);
    }
    public function update(Request $request)
    {
        Cart::update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity,
            ),
        ));

        // $totalPrice = Cart::getTotal();
        $summedPrice = Cart::get($request->id)->getPriceSum();
        return response()->json([
            'summedPrice' => number_format($summedPrice),
            'subTotal' => number_format(Cart::getSubTotal()),
            'totalPrice' => number_format(Cart::getTotal()),
        ], 200);
    }
    public function destroy(Request $request)
    {
        Cart::remove($request->id);
        return response()->json([], 204);
    }

    public function checkout()
    {
        return view('client.carts.checkout');
    }
    public function store(Request $request)
    {
            $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
            'city' => 'required'

        ]);
        $attributes = $request->only([
            'first_name', 'last_name', 'email', 'address', 'phone', 'city'
        ]); 
        $order = Order::create($attributes);
        foreach (Cart::getContent() as $item) {
            $order->cartItems()->create([
                'product_id' => $item->id,
                'price' => $item->price,
                'quantity' => $item->quantity
            ]);
        }
        // print_r($order);die;
        Cart::clear();
        return redirect('/cart/checkout');
    }

}
