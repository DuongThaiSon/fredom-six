@extends('client.layouts.main', ['title' => __('Hoàn thành')])
@section('content')
<!-- checkout -->
<section id="checkout">
    <div class="container">
      <!-- steps  -->
      <div class="steps">
        <div class="row">
          <div class="col-lg-4">
            <div class="step-1 text-center">
              <div class="orange-circle mx-auto text-white active"><span class="number">01</span></div>
              <p class="text-uppercase font-weight-bold">giỏ hàng</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="step-1 text-center">
              <div class="orange-circle mx-auto text-white active"><span class="number">02</span></div>
              <p class="text-uppercase font-weight-bold">xác nhận đơn hàng</p>
            </div>
          </div>
          <div class="col-lg-4">
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
            <div class="col-12 alert alert-success">Cảm ơn bạn đã mua hàng tại Moolez. Dưới đây là hóa đơn thanh toán đơn hàng của bạn</div>
            <div class="form-group col-12 col-md-12">
                        <div class="row">
                        <div class="col-4" style="font-weight: bold;">Tên người mua hàng: </div>
                        <div class="col-8" style="font-style: italic;">{{ $cart['name'] ?? ''}}</div>
                    </div>
                </div>
                <div class="form-group col-12 col-md-12">
                        <div class="row">
                        <div class="col-4" style="font-weight: bold;">Email: </div>
                        <div class="col-8" style="font-style: italic;">{{ $cart['email'] ?? ''}}</div>
                    </div>
                </div>
                <div class="form-group col-12 col-md-12">
                        <div class="row">
                        <div class="col-4" style="font-weight: bold;">Địa chỉ: </div>
                        <div class="col-8" style="font-style: italic;">{{ $cart['address'] ?? ''}}</div>
                    </div>
                </div>
                <div class="form-group col-12 col-md-12">
                        <div class="row">
                        <div class="col-4" style="font-weight: bold;">Số điện thoại:</div>
                        <div class="col-8" style="font-style: italic;">{{ $cart['phone'] ?? ''}}</div>
                    </div>
                </div>
                <div class="form-group col-12 col-md-12">
                        <div class="row">
                        <div class="col-4" style="font-weight: bold;">Phương thức vận chuyển: </div>
                        <div class="col-8" style="font-style: italic;">{{ $cart['ship'] ?? ''}}</div>
                    </div>
                </div>
                <div class="form-group col-12 col-md-12">
                        <div class="row">
                        <div class="col-4" style="font-weight: bold;">Phương thức thanh toán: </div>
                        <div class="col-8" style="font-style: italic;">{{ $cart['payment_choice'] ?? ''}}</div>
                    </div>
                </div>
                <div class="form-group col-12 col-md-12">
                    <div class="row">
                    <div class="col-12" style="font-weight: bold; color: red;">Đơn hàng của bạn</div>
                    <table class="w-100 table-sm table-hover table mb-2" style="border: 1px solid black">
                        <thead>
        
                            <tr class="" style="background: orange; color: white;">
                                </div>
                                <th class="w-25">Sản phẩm</th>
                                <th class="w-25">Số lượng</th>
                                <th class="w-25">Giá</th>
                                <th class="w-25">Thành tiền</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                                {{--  <tr style="border: 1px solid black !important">
                                    <td>Áo quần</td>
                                    <td>12</td>
                                    <td>20.000.000</td>
                                    <td>240.000.000</td>
                                </tr>
                                <tr style="border: 1px solid black !important">
                                    <td>Áo quần</td>
                                    <td>12</td>
                                    <td>20.000.000</td>
                                    <td>240.000.000</td>
                                </tr>
                                <tr style="border: 1px solid black !important">
                                    <td>Áo quần</td>
                                    <td>12</td>
                                    <td>20.000.000</td>
                                    <td>240.000.000</td>
                                </tr>
                                <tr style="border: 1px solid black !important">
                                    <td colspan="3">Áo quần</td>
                                    
                                    <td>720.000.000</td>
                                </tr>  --}}
                            @foreach ($cart_item as $item)
                                
                                <tr style="border: 1px solid black !important">
                                    <td>{{ $item['product_name']??'' }}</td>
                                    <td>{{ $item['quantity']??'' }}</td>
                                    <td>{{ $item['price']??'' }}</td>
                                    <td>{{ $item['total']??'' }}</td>
                                </tr>

                                @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
        
    </div>
</div>
</section>
@endsection
