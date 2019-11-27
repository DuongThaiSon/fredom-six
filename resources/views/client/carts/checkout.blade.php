@extends('client.layouts.main', ['title' => __('Checkout')])
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
              <div class="orange-underline mx-auto"></div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="step-1 text-center">
              <div class="orange-circle mx-auto text-white" style="background: #ffffff"><span class="number"
                  style="color: #000000">03</span></div>
              <p class="text-uppercase font-weight-bold">hóa đơn</p>
            </div>
          </div>
        </div>
      </div>
      <!-- form checkout -->
      <div class="form-checkout">
          @guest('web')
        <p>Cần phải đăng nhập để thanh toán? <a href="{{ route('client.loginform')}}" class="reg font-weight-bold">Nhấn vào đây để Đăng ký hoặc Đăng
            nhập</a></p>
          @endguest
          @auth('web')
        <form method="POST" action="/cart/store" id="form-checkout" enctype="multipart/form-data">
            @csrf
          <div class="row">
            <div class="col-lg-7">
              <div class="checkout-info">
                <p class="text-uppercase font-weight-bold">thông tin thanh toán</p>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="name" class="font-weight-bold">HỌ *</label>
                      <input type="text" name="first_name" class="form-control form-control-block" required>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="name" class="font-weight-bold">TÊN *</label>
                      <input type="text" name="last_name" class="form-control form-control-block" required>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="name" class="font-weight-bold">EMAIL *</label>
                  <input type="email" name="email" class="form-control form-control-block" required>
                </div>
                <div class="form-group">
                  <label for="name" class="font-weight-bold">ĐỊA CHỈ *</label>
                  <input type="text" name="address" class="form-control form-control-block" required>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="name" class="font-weight-bold">THÀNH PHỐ *</label>
                      <input type="text" name="city" class="form-control form-control-block" required>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="name" class="font-weight-bold">SỐ ĐIỆN THOẠI *</label>
                      <input type="text" name="phone" class="form-control form-control-block" required>
                    </div>
                  </div>
                </div>
                <div class="form-group my-4">
                  <label class="checkbox-container">
                    <input type="checkbox">
                    <span class="checkmark align-self-center"></span> <span style="margin-left: 35px;">Sử dụng cùng một
                      địa chỉ thanh toán ?</span>
                  </label>
                </div>
              </div>
            </div>
            <div class="col-lg-5">
              <p class="text-uppercase font-weight-bold m-0">phương thức vận chuyển *</p>
              <div class="form-underline"></div>
                <div class="form-group m-4">
                    @foreach ($partners as $partner)
                        <label class="checkbox-container mb-3">
                            <input type="checkbox" value="{{ $partner->id }}" name="ship" class="partners">
                            <span class="checkmark align-self-center"></span>
                            <span style="margin-left: 35px;">{{ $partner->name }} - {{ number_format($partner->price) }} vnđ</span>
                        </label>
                    @endforeach
                </div>
              <p class="text-uppercase font-weight-bold m-0">phương thức thanh toán *</p>
              <div class="form-underline"></div>
              <div class="form-group m-4">
                <label class="checkbox-container mb-3">
                  <input type="checkbox" value="COD" name="payment_choice" class="payment-choice">
                  <span class="checkmark align-self-center"></span> <span style="margin-left: 35px;">Thanh toán khi nhận
                    hàng - COD</span>
                </label>
                <label class="checkbox-container">
                  <input type="checkbox" value="VNPay" name="payment_choice" class="payment-choice">
                  <span class="checkmark align-self-center"></span> <span style="margin-left: 35px;">Thanh toán trực
                    tuyến - VNPay</span>
                </label>
              </div>
              <button type="submit" class="btn btn-checkout checkout-button align-self-end text-uppercase font-weight-bold">thanh
                toán</button>
            </div>
          </div>
        </form>
          @endauth
      </div>
      <!-- receipt -->
      <div class="receipt">
        <div class="row mb-4">
          <div class="col-lg-10 mx-auto text-center">
            <p class="text-uppercase font-weight-bold">đơn hàng của bạn</p>
            <div class="orange-underline mx-auto"></div>
          </div>
        </div>
        <div class="row justify-content-between p-2">
          <p class="font-weight-bold text-uppercase ml-3 mb-0">sản phẩm</p>
          <p class="font-weight-bold text-uppercase mr-3 mb-0">tổng tiền</p>
        </div>
        <div class="form-underline"></div>
      </div>
      <!-- product quantity -->
      <div class="row p-2" style="margin-top: 25px;">
            @forelse (Cart::getContent() as $item)
        <div class="col-lg-6">
          <div class="product-quantity d-flex flex-column">
            <a href="#" class="text-capitalize mb-3">{{ $item->name }} <span
                class="quantity text-uppercase ml-2"> x
                {{ $item->quantity }}</span>
            </a>
          </div>
        </div>
        <div class="col-lg-6 text-right">
          <p class="font-weight-bold">{{ number_format($item->quantity*$item->price) }}</p>
        </div>
            @empty

            @endforelse
      </div>
      <div class="form-underline"></div>
      <div class="d-flex justify-content-between p-2">
        <p class="text-capitalize font-weight-bold m-0">thành tiền:</p>
        <p class="orange-text m-0" style="font-size:20px;">{{ number_format(Cart::getSubTotal()) }}</p>
      </div>
      {{-- <div class="form-underline"></div>
      <div class="d-flex justify-content-between p-2">
        <p class="text-capitalize font-weight-bold m-0">khuyến mãi:</p>
        <p class="font-weight-bold m-0">-500.000 vnđ</p>
      </div> --}}
      <div class="form-underline"></div>
      <!-- Total -->
      <div class="d-flex justify-content-between mt-3 text-white p-2" style="background: #e36b00;">
        <p class="text-capitalize font-weight-bold m-0">tổng tiền:</p>
        <p class="font-weight-bold m-0">{{ number_format(Cart::getTotal()) }} vnđ</p>
      </div>
    </div>
  </section>
@endsection
@push('js')
    <script>
    //   $("input:checkbox").on('click', function() {
    //     var $box = $(this);
    //     if ($box.is(":checked")) {
    //       var group = "input:checkbox[name='" + $box.attr("name") + "']";
    //         $(group).prop("checked", false);
    //         $box.prop("checked", true);
    //     } else {
    //       $box.prop("checked", false);
    //     }
    //   });

    $(".partners").change(function() {
        $(".partners").prop('checked', false);
        $(this).prop('checked', true);
        // $(".partners").not(this).prop('checked', false);
    });

    $(".payment-choice").change(function() {
        $(".payment-choice").prop('checked', false);
        $(this).prop('checked', true);
        // $(".payment-choice").not(this).prop('checked', false);
    });
    </script>
@endpush
