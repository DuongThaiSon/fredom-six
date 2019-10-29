@extends('client.layouts.main', ['title' => __('Product Cart')])
@section('content')
  <!-- checkout -->
  <section id="cart">
    <div class="container">
      <!-- steps  -->
      <div class="steps">
        <div class="row">
          <div class="col-lg-4">
            <div class="step-1 text-center">
              <div class="orange-circle mx-auto text-white active"><span class="number">01</span></div>
              <p class="text-uppercase font-weight-bold">giỏ hàng</p>
              <div class="orange-underline mx-auto"></div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="step-1 text-center">
              <div class="orange-circle mx-auto text-white"><span class="number">02</span></div>
              <p class="text-uppercase font-weight-bold">xác nhận đơn hàng</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="step-1 text-center">
              <div class="orange-circle mx-auto text-white"><span class="number">03</span></div>
              <p class="text-uppercase font-weight-bold">hóa đơn</p>
            </div>
          </div>
        </div>
      </div>
      <!-- cart -->
      <div class="cart">
        <!-- product -->
        <table class="table">
          <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col" class="font-weight-bold">Sản phẩm</th>
              <th scope="col" class="font-weight-bold text-center">Giá</th>
              <th scope="col" class="font-weight-bold text-center">Số lượng</th>
              <th scope="col" class="font-weight-bold text-center">Thành tiền</th>
            </tr>
          </thead>
          <tbody>
              {{-- @dd($cartItems) --}}
            @forelse($cartItems as $item)
            
            <tr class="product-cart">
              <th scope="row" style="vertical-align: middle !important;"><a href="#"><i
                    class="fas fa-times-circle text-muted btn-remove-product" data-id={{ $item->id }}></i></a></th>
              <td>
                <div class="product d-flex align-items-center">
                  <div class="product-image">
                    <img src="{{ asset('media/products') }}/{{ $item->attributes->avatar }}" class="img-fluid" alt="">
                  </div>
                  <a href="#" style="width: 240px; font-size: 16px !important; margin-bottom: -30px !important;"
                    class="font-weight-bold text-uppercase mb-0 ml-5">{{ $item->name }} ,
                    SKU: {{ $item->attributes->product_code }} , 
                    Đen - cỡ nhỏ</a>
                </div>
              </td>
              <td class="font-weight-bold text-center">{{ number_format($item->price) }}</td>
              <td class="text-center">
                <div class="number-input ">
                  <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                    class="my-auto ml-2"></button>
                  <input class="number input-quantity" name="quantity" data-id="{{ $item->id }}" value="{{ $item->quantity }}" type="number" min="1"  />
                  <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                    class="plus my-auto mr-2"></button>
                </div>
              </td>
              <td class="text-center"><span class="orange-text summed-price">{{ number_format($item->price*$item->quantity) }}</span></td>
            </tr>
            @empty
                <div class="alert alert-danger text-center">Giỏ hàng trống</div> 
            @endforelse
          </tbody>
        </table>
        <div class="row">
          <div class="col-lg-6"></div>
          <div class="col-lg-6 mt-5">
            <p class="font-weight-bold text-uppercase">đơn hàng</p>
            <div class="d-flex justify-content-between p-2">
              <p class="text-capitalize font-weight-bold m-0">thành tiền:</p>
              <p class="sub-total orange-text m-0" style="font-size:20px;">{{ number_format(Cart::getSubTotal()) }} vnđ</p>
            </div>
            <div class="form-underline"></div>
            <div class="d-flex justify-content-between p-2">
              <p class="text-capitalize font-weight-bold m-0">khuyến mãi:</p>
              <p class="font-weight-bold m-0">-500.000 vnđ</p>
            </div>
            <div class="form-underline"></div>
            <!-- Total -->
            <div class="d-flex justify-content-between mt-3 text-white p-2" style="background: #e36b00;">
              <p class="text-capitalize font-weight-bold m-0">tổng tiền:</p>
              <p class="font-weight-bold m-0">{{ number_format(Cart::getTotal()-500000) }} vnđ</p>
            </div>
          </div>
        </div>
      </div>
      <div class="form-underline my-5"></div>
      <div class="row mb-5">
        <div class="col-lg-6">
          <div class="coupon-input">
            <form action="" class="d-flex justify-content-between">
              <input type="text" class="code form-control p-3" placeholder="Mã giảm giá">
              <button type="submit" class="btn code-apply text-uppercase orange-text orange-border font-weight-bold">áp
                dụng</button>
            </form>
          </div>
        </div>
        <div class="col-lg-6">
          <button type="submit"
            class="btn confirm text-uppercase orange-text orange-border font-weight-bold float-right">xác nhận đơn
            hàng</button>
        </div>
      </div>

      <div class="more-product">
        <div class="row">
          <p class="text-capitalize" style="font-size: 34px; margin-bottom: 40px;">sản phẩm bạn có thể thích</p>
          <div class="container">
            <div class="row mb-4">
              <div class="col-lg-3">
                <div class="product">
                  <div class="card">
                    <div class="product-img">
                      <a href="#"><img src="/assets/client/img/products/product-1.png"
                          class="mx-auto d-flex justify-content-center" alt=""></a>
                      <div class="product-colors justify-content-center d-flex">
                        <div class="product-color" style="background: #2d2d2d;"></div>
                        <div class="product-color" style="background: #ffffff;"></div>
                        <div class="product-color" style="background: #f55678;"></div>
                        <div class="product-color" style="background: #ffa733;"></div>
                      </div>
                    </div>
                    <div class="card-body">
                      <a href="#" class="product-name">Luxury Bag for Women</a>
                      <!-- rating -->
                      <div class="rating">
                        <!-- <input name="stars1" id="e1" type="radio"> -->
                        <label for="e1">
                          <i class="fas fa-star"></i>
                        </label>
                        <!-- <input name="stars1" id="e2" type="radio"> -->
                        <label for="e2">
                          <i class="fas fa-star"></i>
                        </label>
                        <!-- <input name="stars1" id="e3" type="radio"> -->
                        <label for="e3">
                          <i class="fas fa-star"></i>
                        </label>
                        <!-- <input name="stars1" id="e4" type="radio"> -->
                        <label for="e4">
                          <i class="fas fa-star"></i>
                        </label>
                        <!-- <input name="stars1" id="e5" type="radio"> -->
                        <label for="e5">
                          <i class="fas fa-star"></i>
                        </label>
                      </div>
                      <div class="clear"></div>
                      <!-- price -->
                      <div class="product-price">
                        <span class="old-price">8.000.000</span>
                        <span class="new-price">4.000.000</span>
                      </div>
                    </div>
                    <div class="list-group list-group-flush">
                      <div class="list-group-item">
                        <a href="#" class="cart-link text-muted">
                          <i class="fas fa-shopping-basket" style="margin-right: 9px;"></i>
                          <span>Add to cart</span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              {{-- <div class="col-lg-3">
                <div class="product">
                  <div class="card">
                    <div class="product-img">
                      <a href="#"><img src="/assets/client/img/products/product-2.png"
                          class="mx-auto d-flex justify-content-center" alt=""></a>
                      <div class="product-colors justify-content-center d-flex">
                        <div class="product-color" style="background: #2d2d2d;"></div>
                        <div class="product-color" style="background: #ffffff;"></div>
                        <div class="product-color" style="background: #f55678;"></div>
                        <div class="product-color" style="background: #ffa733;"></div>
                      </div>
                    </div>
                    <div class="card-body">
                      <a href="#" class="product-name">Luxury Bag for Women</a>
                      <!-- rating -->
                      <div class="rating">
                        <!-- <input name="stars1" id="e1" type="radio"> -->
                        <label for="e1">
                          <i class="fas fa-star"></i>
                        </label>
                        <!-- <input name="stars1" id="e2" type="radio"> -->
                        <label for="e2">
                          <i class="fas fa-star"></i>
                        </label>
                        <!-- <input name="stars1" id="e3" type="radio"> -->
                        <label for="e3">
                          <i class="fas fa-star"></i>
                        </label>
                        <!-- <input name="stars1" id="e4" type="radio"> -->
                        <label for="e4">
                          <i class="fas fa-star"></i>
                        </label>
                        <!-- <input name="stars1" id="e5" type="radio"> -->
                        <label for="e5">
                          <i class="fas fa-star"></i>
                        </label>
                      </div>
                      <div class="clear"></div>
                      <!-- price -->
                      <div class="product-price">
                        <span class="old-price">8.000.000</span>
                        <span class="new-price"></span>
                      </div>
                    </div>
                    <div class="list-group list-group-flush">
                      <div class="list-group-item">
                        <a href="#" class="cart-link text-muted">
                          <i class="fas fa-shopping-basket" style="margin-right: 9px;"></i>
                          <span>Add to cart</span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="product">
                  <div class="card">
                    <div class="product-img">
                      <a href="#"><img src="/assets/client/img/products/product-3.png"
                          class="mx-auto d-flex justify-content-center" alt=""></a>
                      <div class="product-colors justify-content-center d-flex">
                        <div class="product-color" style="background: #2d2d2d;"></div>
                        <div class="product-color" style="background: #ffffff;"></div>
                        <div class="product-color" style="background: #f55678;"></div>
                        <div class="product-color" style="background: #ffa733;"></div>
                      </div>
                    </div>
                    <div class="card-body">
                      <a href="#" class="product-name">Luxury Bag for Women</a>
                      <!-- rating -->
                      <div class="rating">
                        <!-- <input name="stars1" id="e1" type="radio"> -->
                        <label for="e1">
                          <i class="fas fa-star"></i>
                        </label>
                        <!-- <input name="stars1" id="e2" type="radio"> -->
                        <label for="e2">
                          <i class="fas fa-star"></i>
                        </label>
                        <!-- <input name="stars1" id="e3" type="radio"> -->
                        <label for="e3">
                          <i class="fas fa-star"></i>
                        </label>
                        <!-- <input name="stars1" id="e4" type="radio"> -->
                        <label for="e4">
                          <i class="fas fa-star"></i>
                        </label>
                        <!-- <input name="stars1" id="e5" type="radio"> -->
                        <label for="e5">
                          <i class="fas fa-star"></i>
                        </label>
                      </div>
                      <div class="clear"></div>
                      <!-- price -->
                      <div class="product-price">
                        <span class="old-price">8.000.000</span>
                        <span class="new-price"></span>
                      </div>
                    </div>
                    <div class="list-group list-group-flush">
                      <div class="list-group-item">
                        <a href="#" class="cart-link text-muted">
                          <i class="fas fa-shopping-basket" style="margin-right: 9px;"></i>
                          <span>Add to cart</span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="product">
                  <div class="card">
                    <div class="product-img">
                      <a href="#"><img src="/assets/client/img/products/product-4.png"
                          class="mx-auto d-flex justify-content-center" alt=""></a>
                      <div class="product-colors justify-content-center d-flex">
                        <div class="product-color" style="background: #2d2d2d;"></div>
                        <div class="product-color" style="background: #ffffff;"></div>
                        <div class="product-color" style="background: #f55678;"></div>
                        <div class="product-color" style="background: #ffa733;"></div>
                      </div>
                    </div>
                    <div class="card-body">
                      <a href="#" class="product-name">Luxury Bag for Women</a>
                      <!-- rating -->
                      <div class="rating">
                        <!-- <input name="stars1" id="e1" type="radio"> -->
                        <label for="e1">
                          <i class="fas fa-star"></i>
                        </label>
                        <!-- <input name="stars1" id="e2" type="radio"> -->
                        <label for="e2">
                          <i class="fas fa-star"></i>
                        </label>
                        <!-- <input name="stars1" id="e3" type="radio"> -->
                        <label for="e3">
                          <i class="fas fa-star"></i>
                        </label>
                        <!-- <input name="stars1" id="e4" type="radio"> -->
                        <label for="e4">
                          <i class="fas fa-star"></i>
                        </label>
                        <!-- <input name="stars1" id="e5" type="radio"> -->
                        <label for="e5">
                          <i class="fas fa-star"></i>
                        </label>
                      </div>
                      <div class="clear"></div>
                      <!-- price -->
                      <div class="product-price">
                        <span class="old-price">8.000.000</span>
                        <span class="new-price"></span>
                      </div>
                    </div>
                    <div class="list-group list-group-flush">
                      <div class="list-group-item">
                        <a href="#" class="cart-link text-muted">
                          <i class="fas fa-shopping-basket" style="margin-right: 9px;"></i>
                          <span>Add to cart</span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@push('js')
    <script>
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $('.input-quantity').change(function(e)
        {
        e.preventDefault();
        let data = {
            id: $(this).attr('data-id'),
            quantity: $(this).val(),
        }
        let _this = $(this);
        $.ajax({
            url: '/cart/update',
            method: 'POST',
            data: data,
            success: function(scs){
                _this.parents('.product-cart').find('.summed-price').text(`${scs.summedPrice}`);
                $('.sub-total').text(`${scs.subTotal}`)
            },
            error: function(){

            }
          });
        });

        $('.btn-remove-product').on('click', function(e) {
          e.preventDefault();
          let id = $(this).attr('data-id');
          let _this = $(this);

          if(confirm('Bạn có chắc chắn muốn xóa không?')) {
            $.ajax({
              url: '/cart/destroy',
              method: 'POST',
              data: {
                id: id
              },
              success: function() {
                _this.parents('.product-cart').remove();
                _this.parents('.product-cart').find('.summed-price').text(`${scs.summedPrice}`);
                $('.sub-total').text(`${scs.subTotal}`)
              },
              error: function(){

              }
            });
          }
        });

    </script>
@endpush