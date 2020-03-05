@extends('client.layouts.main')
@section('title', 'Sản phẩm')
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

<div class="breadcrumbs my-3">
    <div class="container">
        <a href="">home</a>
        <span class="breadcrumbs-arrow">
            <span class="ti-angle-right"></span>
        </span>
        <a href="">bộ sưu tập</a>
        <span class="breadcrumbs-arrow">
            <span class="ti-angle-right"></span>
        </span>
        <a href="">Chi tiết sản phẩm</a>
    </div>
</div>

<section class="products-wrapper pb-5">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div id="product-detail--slide" class="owl-carousel owl-theme">
                <div class="product-detail--item" style="background: url('{{ asset('assets/client') }}/images/1.jpg')">

                </div>
                <div class="product-detail--item" style="background: url('{{ asset('assets/client') }}/images/2.jpg')">

                </div>
                <div class="product-detail--item" style="background: url('{{ asset('assets/client') }}/images/11.jpg')">

                </div>
            </div>

            <!-- <div class="slider-for">
                <div class="product">
                    <img src="{{ asset('assets/client') }}/images/1.jpg" alt="">
                </div>
                <div class="product">
                    <img src="{{ asset('assets/client') }}/images/2.jpg" alt="">
                </div>
                <div class="product">
                    <img src="{{ asset('assets/client') }}/images/3.jpg" alt="">
                </div>
            </div>
            <div class="slider-nav">
            <div class="product">
                    <img src="{{ asset('assets/client') }}/images/1.jpg" alt="">
                </div>
                <div class="product">
                    <img src="{{ asset('assets/client') }}/images/2.jpg" alt="">
                </div>
                <div class="product">
                    <img src="{{ asset('assets/client') }}/images/3.jpg" alt="">
                </div>
            </div> -->
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="product-info--wrapper">
                <div class="product-title">
                    <h1>Lemon jacket</h1>
                </div>
                <div class="product-price">
                    <p>700.000 VNĐ</p>
                </div>
                <div class="product-form">
                    <form action="">
                        <div class="size">
                            <label for="">Size</label>
                            <select name="" id="">
                                <option value="">S</option>
                                <option value="">M</option>
                                <option value="">L</option>
                                <option value="">XL</option>
                            </select>
                        </div>
                        <div class="quantity-selector">
                            <span class="quantity-minus quantity-adjust">
                                <i class="ti-minus"></i>
                            </span>
                            <input type="text" class="quantity-input" value="1" name="quantity" readonly>
                            <span class="quantity-plus quantity-adjust">
                                <i class="ti-plus"></i>
                            </span>
                        </div>
                        <button type="submit" class="btn-cart">
                            <span>Thêm vào giỏ</span>
                        </button>
                    </form>
                </div>
                <div class="product-des">
                    <p>Oversized vest with Space Program embroidered patch, smiley embroidery on the back, cargo
                        pockets, and adjustable front buckle closure. Marzia is wearing a Small, Felix is wearing a
                        Medium.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
