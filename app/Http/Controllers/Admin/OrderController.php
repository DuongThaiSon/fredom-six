<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CartItem;
use Cart;
use App\Models\Cart as Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with(['cartItems'])->simplePaginate(5);
        $orders->map(function($q){
            $q->total_quantity = $q->cartItems->sum('quantity');
            $q->total_price = $q->cartItems->sum(function($q) {
                return $q->quantity * $q->price;
            });
            return $q;
        });

        return view('admin.orders.index', compact('orders'));

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
        $order = Order::with(['cartItems', 'cartItems.product'])->findOrFail($id);
        // print_r($order->toArray());die;
        $order->sum = $order->cartItems->sum(function($q) {
            return $q->price * $q->quantity;
        });

        return view('admin.orders.edit', compact('order'));
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
        $order = Order::findOrFail($id);

        $attributes = $request->only([
            'payment_status'
        ]);
        $order->fill($attributes);
        $order->save();
        // print_r($attributes);die;

        return redirect()->back()->with('success', 'Lưu dữ liệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Xóa dữ liệu thành công');
    }
}
