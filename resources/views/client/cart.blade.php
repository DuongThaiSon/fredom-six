@extends('client.layouts.main')
@section('title', 'Giỏ hàng')
@section('content')
<section id="banner" class="owl-carousel owl-theme">
    <div class="banner-item">
        <img src="{{ asset('assets/client') }}/images/banner.jpg" alt="">
    </div>
    <div class="banner-item">
        <img src="{{ asset('assets/client') }}/images/banner.jpg" alt="">
    </div>
    <div class="banner-item">
        <img src="{{ asset('assets/client') }}/images/banner.jpg" alt="">
    </div>
</section>

<section class="cart-page py-5">
    <div class="container">
        <h2 class="mb-3">Giỏ hàng</h2>
        <div class="row">
            <div class="col-lg-8 col-md-6">
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th class="cart-img"></th>
                            <th class="cart-des" colspan="2">Sản phẩm</th>
                            <th class="cart-price-head">Giá</th>
                            <th class="cart-quantity text-right">Số lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cartItems as $item)
                            <tr class="item">
                                <td class="cart-img">
                                    <a href="{{ route('client.productDetail', ['slug_cat' => $item->attributes->category_slug, 'slug_view' => $item->attributes->product_slug]) }}">
                                        <img src="{{ env('UPLOAD_DIR_PRODUCT', 'media/products') }}/{{ $item->attributes->product_avatar }}" alt="">
                                        <div class="mobile-small text-capitalize">
                                            <p class="m-0">{{ $item->name }}</p>
                                            <small class="text-text-uppercase">S</small>
                                        </div>
                                        <div class="mobile-small cart-price--mobile">
                                            <span>{{ number_format($item->price) }}</span>
                                        </div>
                                    </a>
                                </td>
                                <td class="cart-des" colspan="2">
                                    <a href="{{ route('client.productDetail', ['slug_cat' => $item->attributes->category_slug, 'slug_view' => $item->attributes->product_slug]) }}" class="text-capitalize">
                                        {{ $item->name }}
                                    </a>
                                    <small>{{ $item->attributes->product_size }}</small>
                                    <small>
                                        <a href="#" class="remove-cart--item remove-cart" data-href="{{ route('client.cart.destroy', $item->id) }}">Remove</a>
                                    </small>
                                </td>
                                <td class="cart-price">
                                    <p>{{ number_format($item->price) }}</p>
                                </td>
                                <td class="cart-quantity text-right">
                                    <div class="quantity-selector">
                                        <span class="quantity-minus quantity-adjust">
                                            <i class="ti-minus"></i>
                                        </span>
                                        <input type="text" class="quantity-input" value="{{ $item->quantity }}" min="1" data-href="{{ route('client.cart.update', $item->id) }}" name="quantity" readonly>
                                        <span class="quantity-plus quantity-adjust">
                                            <i class="ti-plus"></i>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        @empty

                        @endforelse

                        {{-- <tr class="item">
                            <td class="cart-img">
                                <a href="">
                                    <img src="{{ asset('assets/client') }}/images/1.jpg" alt="">
                                    <div class="mobile-small text-capitalize">
                                        <p class="m-0">lemon jacket</p>
                                        <small class="text-text-uppercase">S</small>
                                    </div>
                                    <div class="mobile-small cart-price--mobile">
                                        <span>700.000 VNĐ</span>
                                    </div>
                                </a>
                            </td>
                            <td class="cart-des" colspan="2">
                                <a href="" class="text-capitalize">
                                    lemon jacket
                                </a>
                                <small>S</small>
                                <small>
                                    <a href="" class="remove-cart--item">Remove</a>
                                </small>
                            </td>
                            <td class="cart-price">
                                <p>700.000 VNĐ</p>
                            </td>
                            <td class="cart-quantity text-right">
                                <div class="quantity-selector">
                                    <span class="quantity-minus quantity-adjust">
                                        <i class="ti-minus"></i>
                                    </span>
                                    <input type="text" class="quantity-input" value="1" name="quantity" readonly>
                                    <span class="quantity-plus quantity-adjust">
                                        <i class="ti-plus"></i>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr class="item">
                            <td class="cart-img">
                                <a href="">
                                    <img src="{{ asset('assets/client') }}/images/1.jpg" alt="">
                                    <div class="mobile-small text-capitalize">
                                        <p class="m-0">lemon jacket</p>
                                        <small class="text-text-uppercase">S</small>
                                    </div>
                                    <div class="mobile-small cart-price--mobile">
                                        <span>700.000 VNĐ</span>
                                    </div>
                                </a>
                            </td>
                            <td class="cart-des" colspan="2">
                                <a href="" class="text-capitalize">
                                    lemon jacket
                                </a>
                                <small>S</small>
                                <small>
                                    <a href="" class="remove-cart--item">Remove</a>
                                </small>
                            </td>
                            <td class="cart-price">
                                <p>700.000 VNĐ</p>
                            </td>
                            <td class="cart-quantity text-right">
                                <div class="quantity-selector">
                                    <span class="quantity-minus quantity-adjust">
                                        <i class="ti-minus"></i>
                                    </span>
                                    <input type="text" class="quantity-input" value="1" name="quantity" readonly>
                                    <span class="quantity-plus quantity-adjust">
                                        <i class="ti-plus"></i>
                                    </span>
                                </div>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="cart-info">
                    <h3>
                        <span>Tổng: </span>
                        <span class="total-price">0</span><span> VNĐ</span>

                    </h3>
                    <form action="{{ route('client.cart.checkout') }}" method="post" id="checkout-form">
                        @csrf
                        <input type="hidden" name="total" id="">
                        <div>
                            <label for="">Email</label>
                            <input type="email" name="email" id="" placeholder="Email" required>
                        </div>
                        <div>
                            <label for="">Phone</label>
                            <input type="text" name="phone" id="" placeholder="Phone" required>
                        </div>
                        <div>
                            <label for="">Địa chỉ</label>
                            <input type="text" name="address" id="" placeholder="Địa chỉ" required>
                        </div>
                        <div class="proceed {{ count($cartItems) ? '' : 'd-none' }}">
                            <button href="#" class="btn-proceed">Thanh toán</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('.quantity-adjust').on('click', function() {
                let quantity = $(this).parents('.cart-quantity').find('input[name=quantity]').val();
                let url = $(this).parents('.cart-quantity').find('input[name=quantity]').data('href');
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        _method: 'PUT',
                        quantity: quantity
                    },
                    success: function(result) {
                        calculateTotalPrice()
                    }
                })

            });

            $('.remove-cart').on('click', function(e) {
                e.preventDefault();
                let url = $(this).data('href');
                let _this = $(this);
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        _method: 'DELETE'
                    },
                    success: function(result) {
                        if(result) {
                            _this.parents('.item').remove()
                            calculateTotalPrice();
                            if($('.item').length == 0) {
                                $('.proceed').addClass('d-none')
                            }

                        }
                    }
                });
            });

            calculateTotalPrice();
        });

        let calculateTotalPrice = function() {
            let sum = 0;
            $('.cart-price').each(function() {
                let price = accounting.unformat($(this).text());
                let quantity = $(this).parents('.item').find('input[name=quantity]').val();
                sum += parseInt(price) * parseInt(quantity);
            });
            $('.total-price').text(accounting.formatMoney(sum, "", ""))
            $('input[name=total]').val(sum)
        }
    </script>
@endpush
