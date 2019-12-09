<?php

namespace App\Http\Controllers\Client;

use App\Events\OrderCreated;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart as Order;
use App\Models\Partner;

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
        $product = Product::with(['variants', 'categories'])->findOrFail($request->id);

        if ($request->size || $request->color) {
            $request->color ? $attributeSelected[] = $request->color : '';
            $request->size ? $attributeSelected[] = $request->size : '';
            // print_r($attributeSelected);die;
            $variantId = $product->variants()->get()->groupBy(['id', function($query) {
                return $query->pivot->product_attribute_option_id;
            }])->filter(function($query) use($attributeSelected) {
                $results = true;
                $attributeAvailable = $query->keys();
                foreach ($attributeSelected as $queryValue) {
                    $results = $results && $attributeAvailable->contains($queryValue);
                }

                return $results;
            });
            $variant = Product::findOrFail($variantId->keys()->first());
        }
        else
        {
            $variant = $product->variants->first();
        }

        if($variant)
        {
            $attributes = $variant->variantAttributeValues()->get();
            $attributeValues = [];
            foreach ($attributes as $key => $attribute) {
                $attributeValues[$attribute->productAttribute->name] = $attribute->product_attribute_id == 2 ? $attribute->note : $attribute->value;
            }
            $values = array(
                'id' => $variant->id,
                'name' => $product->name,
                'price' => $product->discount>0?($variant->price-$product->discount*$variant->price/100):$variant->price,
                'quantity' => $request->quantity,
                'attributes' => array(
                    'avatar' => $variant->avatar,
                    'product_code' => $variant->product_code,
                    'discount' => $variant->discount,
                    'category_id' => $product->categories[0]->id,
                    'category' => $product->categories[0]->name,
                    'attributeOptions' => $attributeValues
                )
            );
        }
        else {
            $values = array(
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->discount>0?($product->price-$product->discount*$product->price/100):$product->price,
                'quantity' => $request->quantity,
                'attributes' => array(
                    'avatar' => $product->avatar,
                    'product_code' => $product->product_code,
                    'discount' => $product->discount,
                    'category_id' => $product->categories[0]->id,
                    'category' => $product->categories[0]->name,
                    // 'attributeOptions' => $attributeValues
                )
            );
        }

        Cart::add($values);

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
        if(!Cart::isEmpty()){
            $partners = Partner::get();
            return view('client.carts.checkout', compact('partners'));
        }
        else{
            abort(404);
        }
    }
    public function store(Request $request)
    {
        // print_r($request->all());
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
        $attributes['payment_status'] = 'Đặt hàng';
        $attributes['total'] = Cart::getTotal();
        
        $order = Order::create($attributes);
            
        foreach (Cart::getContent() as $item) {

            $order->cartItems()->create([
                'product_id' => $item->id,
                'price' => $item->price*$item->quantity,
                'quantity' => $item->quantity
            ]);};

        Cart::clear();

        event(new OrderCreated($order));
        $encrypt = encrypt($order->id);
        return redirect()->route('client.carts.complete', $encrypt);
    }
    /**
     * Complete cart
     */

    public function complete($key)
    {
        $id = decrypt($key);
        $order = Order::with(['cartItems', 'partner'])->findOrFail($id);
        $order->sum = $order->cartItems->sum(function($q) {
            return $q->price * $q->quantity;
        });
        return view('client.carts.complete', compact('order'));
    }
}
