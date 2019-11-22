<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart as Order;

class CartController extends Controller
{
    public function index()

    {
        // Cart::clear();die;
        // print_r($product);die;
        // $condition = new \Darryldecode\Cart\CartCondition(array(
        //     'name' => 'Khuyến Mãi',
        //     'type' => 'number',
        //     'target' => 'total', // this condition will be applied to cart's subtotal when getSubTotal() is called.
        //     'value' => '-500000',
        // ));
        // Cart::condition($condition);
        $cartItems = Cart::getContent();
        // print_r($cartItems);die;
        $productIds = $cartItems->pluck('id');
        if(count($cartItems) > 0)
        {
            $relatedCategory = Category::with(['products'])->findOrFail($cartItems->first()->attributes->category_id);
            $product = $relatedCategory->products()->whereNotIn('id', $productIds)->take(4)->get();

        }
        else
        {
            $product = Product::take(4)->get();
        }
        $product = $product->map(function($q) {
            $q->rate = $q->reviews()->avg('rate');
            return $q;
        });

        return view('client.carts.index', compact('cartItems', 'product'));
    }
    public function add(Request $request)
    {
        $product = Product::with(['categories'])->findOrFail($request->id);
        Cart::add(array(
            'id' => $request->id,
            'name' => $product->name,
            'price' => $product->discount>0?($product->price-$product->discount*$product->price/100):$product->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'avatar' => $product->avatar,
                'product_code' => $product->product_code,
                'discount' => $product->discount,
                'category_id' => $product->categories[0]->id,
                'category' => $product->categories[0]->name,
                'size' => $request->size,
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
        // dd($request->all());
            $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
            'city' => 'required'

        ]);
        $attributes = $request->only([
            'first_name', 'last_name', 'email', 'address', 'phone', 'city', 'ship', 'payment_choice'
        ]);
        $order = Order::create($attributes);
        // r a bấm thanh toán đi a 
        
        $cart_item = [];
        $i = 0;
        foreach (Cart::getContent() as $item) {
            
            $order->cartItems()->create([
                'product_id' => $item->id,
                'price' => $item->price*$item->quantity,
                'quantity' => $item->quantity
            ]);
            $cart_item[$i]=[
                'product_name' => $item->name,
                'quantity'      => $item->quantity,
                'price'         => $item->price,
                'total'         => $item->price*$item->quantity,
            ];
            $i++;
            
        }
        $cart = [
            'name' => $request->last_name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'city' => $request->city,
            'ship' => $request->ship,
            'payment_choice' => $request->payment_choice,
        ];
       

        Cart::clear();      
        return view('client.carts.complete', compact('cart','cart_item'));// view comple 
    }
    /**
     * Complete cart
     */

    public function complete()
    {  
        $order = Order::with(['cartItems'])->get();
        // print_r($order->toArray());die;
        return view('client.carts.complete', compact('order'));
    }
}
