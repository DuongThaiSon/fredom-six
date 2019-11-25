<div class="container" id="cart-complete" style="margin-top: 150px;" >
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div>
                <div class="col-12 alert alert-success">Cảm ơn bạn đã mua hàng tại Moolez. Dưới đây là hóa đơn thanh toán đơn hàng của bạn</div>
                <div class="form-group col-12 col-md-12">
                    <div style="display: flex; margin-bottom: 10px">
                    <div style="font-weight: bold;">Tên người mua hàng: </div>
                    <div style="font-style: italic;">{{ $order->first_name ?? ''}} {{ $order->last_name ?? '' }} </div>
                    </div>
                </div>
                <div class="form-group col-12 col-md-12">
                    <div style="display: flex; margin-bottom: 10px">
                    <div style="font-weight: bold;">Email: </div>
                    <div style="font-style: italic;">{{ $order->email ?? ''}} </div>
                    </div>
                </div>
                <div class="form-group col-12 col-md-12">
                    <div style="display: flex; margin-bottom: 10px">
                    <div style="font-weight: bold;">Địa chỉ: </div>
                    <div style="font-style: italic;">{{ $order->address ?? ''}} </div>
                    </div>
                </div>
                <div class="form-group col-12 col-md-12">
                    <div style="display: flex; margin-bottom: 10px">
                    <div style="font-weight: bold;">Số điện thoại:</div>
                    <div style="font-style: italic;">{{ $order->phone ?? ''}} </div>
                    </div>
                </div>
                <div class="form-group col-12 col-md-12">
                    <div style="display: flex; margin-bottom: 10px">
                    <div style="font-weight: bold;">Phương thức vận chuyển: </div>
                    <div style="font-style: italic;">{{ $order->ship ?? ''}} </div>
                    </div>
                </div>
                <div class="form-group col-12 col-md-12">
                    <div style="display: flex; margin-bottom: 10px">
                    <div style="font-weight: bold;">Phương thức thanh toán: </div>
                    <div style="font-style: italic;">{{ $order->payment_choice ?? ''}} </div>
                    </div>
                </div>
            </div>
            <div class="form-group col-12 col-md-12">
                <div class="row">
                <div class="col-12" style="font-weight: bold; color: red;">Đơn hàng của bạn:</div>
                <table class="w-100 table-sm table-hover table mb-2" style="border: 1px solid black; width: 50%; text-align: center;">
                    <thead>
    
                    <tr class="" style="background: #ffa500; color: white;">
                        <th style="border: 1px solid black !important" class="w-5">STT</th>
                        <th style="border: 1px solid black !important" class="w-25">Sản phẩm</th>
                        <th style="border: 1px solid black !important" class="w-20">Số lượng</th>
                        <th style="border: 1px solid black !important" class="w-25">Giá</th>
                        <th style="border: 1px solid black !important" class="w-25">Thành tiền</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($order->cartItems as $cartItem)
                    <tr style="border: 1px solid black !important">
                        <td style="border: 1px solid black !important" class="w-5">{{ $loop->iteration }}</td>
                        <td style="border: 1px solid black !important" class="w-25">{{ $cartItem->product->name ??'' }}</td>
                        <td style="border: 1px solid black !important" class="w-20">{{ $cartItem->quantity ??'' }}</td>
                        <td style="border: 1px solid black !important" class="w-25">{{ number_format($cartItem->price) ??'' }}&nbsp;đ</td>
                        <td style="border: 1px solid black !important" class="w-25">{{ number_format($cartItem->quantity * $cartItem->price) ??'' }}&nbsp;đ</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="100%">
                            Không có dữ liệu!
                        </td>
                    </tr>
                    @endforelse
                    <tr style="border: 1px solid black !important">
                        <th style="border: 1px solid black !important" class="w-5">Tổng</th>
                        <th style="border: 1px solid black !important" class="w-25"></th>
                        <th style="border: 1px solid black !important" class="w-20">{{ $order->cartItems->sum('quantity') }}</th>
                        <th style="border: 1px solid black !important" class="w-25"></th>
                        <th style="border: 1px solid black !important" class="w-25">{{ number_format($order->sum) }}&nbsp;đ</th>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>