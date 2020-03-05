@extends('client.layouts.main')
@section('title', 'Bộ sưu tập')
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
    </div>
</div>

<section id="collection-page" class="collection">
    <h2 class="title">bộ sưu tập</h2>
    <div class="collection-list">
        <div class="collection-block">
            <div class="collection-block--content">
                <h2 class="collection-block--title">lemon project</h2>
                <a href="product-list" class="btn-discover">Xem bộ sưu tập</a>
            </div>
            <div class="product-image">
                <div class="product-double--image">
                    <div class="product-double--front"
                        style="background-image: url('{{ asset('assets/client') }}/images/1.jpg')">

                    </div>
                    <div class="product-double--under"
                        style="background-image: url('{{ asset('assets/client') }}/images/2.jpg')">

                    </div>
                </div>
            </div>
        </div>
        <div class="collection-block">
            <div class="collection-block--content">
                <h2 class="collection-block--title">will i be missed</h2>
                <a href="product-list" class="btn-discover">Xem bộ sưu tập</a>
            </div>
            <div class="product-image">
                <div class="product-double--image">
                    <div class="product-double--front"
                        style="background-image: url('{{ asset('assets/client') }}/images/22.jpg')">

                    </div>
                    <div class="product-double--under"
                        style="background-image: url('{{ asset('assets/client') }}/images/16.jpg')">

                    </div>
                </div>
            </div>
        </div>
        <div class="collection-block">
            <div class="collection-block--content">
                <h2 class="collection-block--title">lemon project</h2>
                <a href="product-list" class="btn-discover">Xem bộ sưu tập</a>
            </div>
            <div class="product-image">
                <div class="product-double--image">
                    <div class="product-double--front"
                        style="background-image: url('{{ asset('assets/client') }}/images/22.jpg')">

                    </div>
                    <div class="product-double--under"
                        style="background-image: url('{{ asset('assets/client') }}/images/16.jpg')">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
