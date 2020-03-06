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
        <a href="/">home</a>
        <span class="breadcrumbs-arrow">
            <span class="ti-angle-right"></span>
        </span>
        <a href="{{ route('client.productCategory', ['slug_cat' => $category->slug]) }}">{{ $category->name ?? '' }}</a>
    </div>
</div>

<section class="products-page collection pb-5">
    <h2 class="title">{{ $category->name }}</h2>
    <div class="row product-grid m-0">
        @forelse ($category->products as $product)
            <div class="col-lg-4 col-md-4 p-0">
                <div class="product-item">
                    <a href="{{ route('client.productDetail', ['slug_cat' => $category->slug, 'slug_view' => $product->slug]) }}" class="product-link">
                        <div class="product-double--image">
                            <div class="product-double--front"
                                style="background-image: url('/{{ env('UPLOAD_DIR_PRODUCT', 'media/products') }}/{{ $product->avatar }}')">

                            </div>
                            {{-- <div class="product-double--front"
                                style="background-image: url('{{ asset('assets/client') }}/images/9.jpg')">

                            </div>
                            <div class="product-double--under"
                                style="background-image: url('{{ asset('assets/client') }}/images/10.jpg')">

                            </div> --}}
                        </div>
                        <div class="product-content--info">
                            <h3 class="title p-0">{{ $product->name }}</h3>
                            <span class="price">{{ number_format($product->price) ?? '0' }} VNĐ</span>
                        </div>
                    </a>
                </div>
            </div>
        @empty
            <div class="text-center">
                <h3 >
                    Không có sản phẩm!
                </h3>
            </div>
        @endforelse
        {{-- <div class="col-lg-4 col-md-4 p-0">
            <div class="product-item">
                <a href="product-detail" class="product-link">
                    <div class="product-double--image">
                        <div class="product-double--front"
                            style="background-image: url('{{ asset('assets/client') }}/images/9.jpg')">

                        </div>
                        <div class="product-double--under"
                            style="background-image: url('{{ asset('assets/client') }}/images/10.jpg')">

                        </div>
                    </div>
                    <div class="product-content--info">
                        <h3 class="title p-0">Lemon croptop</h3>
                        <span class="price">450.000 VNĐ</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 p-0">
            <div class="product-item">
                <a href="product-detail" class="product-link">
                    <div class="product-double--image">
                        <div class="product-double--front"
                            style="background-image: url('{{ asset('assets/client') }}/images/9.jpg')">

                        </div>
                        <div class="product-double--under"
                            style="background-image: url('{{ asset('assets/client') }}/images/10.jpg')">

                        </div>
                    </div>
                    <div class="product-content--info">
                        <h3 class="title p-0">Lemon croptop</h3>
                        <span class="price">450.000 VNĐ</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 p-0">
            <div class="product-item">
                <a href="product-detail" class="product-link">
                    <div class="product-double--image">
                        <div class="product-double--front"
                            style="background-image: url('{{ asset('assets/client') }}/images/9.jpg')">

                        </div>
                        <div class="product-double--under"
                            style="background-image: url('{{ asset('assets/client') }}/images/10.jpg')">

                        </div>
                    </div>
                    <div class="product-content--info">
                        <h3 class="title p-0">Lemon croptop</h3>
                        <span class="price">450.000 VNĐ</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 p-0">
            <div class="product-item">
                <a href="product-detail" class="product-link">
                    <div class="product-double--image">
                        <div class="product-double--front"
                            style="background-image: url('{{ asset('assets/client') }}/images/9.jpg')">

                        </div>
                        <div class="product-double--under"
                            style="background-image: url('{{ asset('assets/client') }}/images/10.jpg')">

                        </div>
                    </div>
                    <div class="product-content--info">
                        <h3 class="title p-0">Lemon croptop</h3>
                        <span class="price">450.000 VNĐ</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 p-0">
            <div class="product-item">
                <a href="product-detail" class="product-link">
                    <div class="product-double--image">
                        <div class="product-double--front"
                            style="background-image: url('{{ asset('assets/client') }}/images/9.jpg')">

                        </div>
                        <div class="product-double--under"
                            style="background-image: url('{{ asset('assets/client') }}/images/10.jpg')">

                        </div>
                    </div>
                    <div class="product-content--info">
                        <h3 class="title p-0">Lemon croptop</h3>
                        <span class="price">450.000 VNĐ</span>
                    </div>
                </a>
            </div>
        </div> --}}
    </div>
</section>
@endsection
