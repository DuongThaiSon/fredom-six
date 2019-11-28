@extends('client.layouts.main', ['title' => __('Complete')])
@section('content')
<!-- checkout -->
<section id="checkout">
    <div class="container">
      <!-- steps  -->
      <div class="steps">
        <div class="row">
          <div class="col-lg-4 col-4 ">
            <div class="step-1 textlg-- col-12center">
              <div class="orange-circle mx-auto text-white active"><span class="number">01</span></div>
              <p class="text-uppercase font-weight-bold">giỏ hàng</p>
            </div>
          </div>
          <div class="col-lg-4 col-4">
            <div class="step-1 text-center">
              <div class="orange-circle mx-auto text-white active"><span class="number">02</span></div>
              <p class="text-uppercase font-weight-bold">xác nhận đơn hàng</p>
            </div>
          </div>
          <div class="col-lg-4 col-4">
            <div class="step-1 text-center">
              <div class="orange-circle mx-auto text-white active"><span class="number">03</span></div>
              <p class="text-uppercase font-weight-bold">hóa đơn</p>
              <div class="orange-underline mx-auto"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

      <!-- Invoice-->
<div class="container" id="cart-complete" style="margin-top: 150px;" >
    <div class="row">
      <div class="col-lg-8 mx-auto">
          <div class="col-12 alert alert-success">Thông tin đã được gửi tới email của bạn. Dưới đây là hóa đơn thanh toán đơn hàng của bạn</div>
            <div class="form-group col-md-12 ">
              <div class="row">
                <div class="col-lg-4 col-12" style="font-weight: bold;">Tên người mua hàng: </div>
                <div class="col-lg-8 col-12" style="font-style: italic;">{{ $order->first_name ?? ''}} {{ $order->last_name ?? '' }} </div>
              </div>
            </div>
            <div class="form-group col-md-12 ">
              <div class="row">
                <div class="col-lg-4 col-12" style="font-weight: bold;">Email: </div>
                <div class="col-lg-8 col-12" style="font-style: italic;">{{ $order->email ?? ''}} </div>
              </div>
            </div>
            <div class="form-group col-md-12 ">
              <div class="row">
                <div class="col-lg-4 col-12" style="font-weight: bold;">Địa chỉ: </div>
                <div class="col-lg-8 col-12" style="font-style: italic;">{{ $order->address ?? ''}} </div>
              </div>
            </div>
            <div class="form-group col-md-12 ">
              <div class="row">
                <div class="col-lg-4 col-12" style="font-weight: bold;">Số điện thoại:</div>
                <div class="col-lg-8 col-12" style="font-style: italic;">{{ $order->phone ?? ''}} </div>
              </div>
            </div>
            <div class="form-group col-md-12 ">
              <div class="row">
                <div class="col-lg-4 col-12" style="font-weight: bold;">Phương thức vận chuyển: </div>
                <div class="col-lg-8 col-12" style="font-style: italic;">{{ $order->ship ?? ''}} </div>
              </div>
            </div>
            <div class="form-group col-md-12 ">
              <div class="row">
                <div class="col-lg-4 col-12" style="font-weight: bold;">Phương thức thanh toán: </div>
                <div class="col-lg-8 col-12" style="font-style: italic;">{{ $order->payment_choice ?? ''}} </div>
              </div>
            </div>
              <div class="form-group col-md-12 ">
                  <div class="row">
                  <div class="col-12" style="font-weight: bold; color: red;">Đơn hàng của bạn:</div>
                    <table class="w-100 table-sm table-hover table mb-2" style="border: 1px solid black; text-align: center">
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
</div>
</section>
@endsection
