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
                            <th class="cart-price">Giá</th>
                            <th class="cart-quantity text-right">Số lượng</th>
                        </tr>
                    </thead>
                    <tbody>
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
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="cart-info">
                    <h3>
                        <span>Tổng: </span> 
                        <span>1.600.000 VNĐ</span>
                    </h3>
                    <div class="proceed">
                        <a href="billInfo" class="btn-proceed">Thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
