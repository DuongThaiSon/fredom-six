@extends('client.layouts.main')
@section('title', 'Sản phẩm')
@section('content')
<div class="breadcrumbs my-3">
    <div class="container">
        <a href="/">trang chủ</a>
        <span class="breadcrumbs-arrow">
            <span class="ti-angle-right"></span>
        </span>
        <a href="{{ route('client.productCategory', ['slug_cat' => $category->slug]) }}">{{ $category->name ?? '' }}</a>
    </div>
</div>

<section class="products-page collection py-5" >
    <div class="row product-grid m-0">
        @forelse ($category->products as $product)
            <div class="col-lg-4 col-md-4 p-0">
                <div class="product-item">
                    <a href="{{ route('client.productDetail', ['slug_cat' => $category->slug, 'slug_view' => $product->slug]) }}" class="product-link">
                        <div class="product-double--image">
                            <div class="product-double--front"
                                style="background-image: url('/{{ env('UPLOAD_DIR_PRODUCT', 'media/products') }}/{{ $product->avatar }}')">

                            </div>

                            <div class="product-double--under"
                                style="background-image: url('/{{ env('UPLOAD_DIR_PRODUCT', 'media/products') }}/{{ $product->images[0]->name ?? '' }}')">

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
    </div>
</section>
@endsection
