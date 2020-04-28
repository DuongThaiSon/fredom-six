@extends('client.layouts.main')
@section('title', 'Tìm kiếm')
@section('content')
<div class="breadcrumbs my-3">
    <div class="container">
        <a href="/">trang chủ</a>
        <span class="breadcrumbs-arrow">
            <span class="ti-angle-right"></span>
        </span>
        <a href="#">Tìm kiếm</a>
    </div>
</div>

<section class="products-page collection py-5">
    <!-- <h2 class="title">Tìm kiếm</h2> -->
    <div class="row product-grid m-0">
    @forelse($products as $product)
        <div class="col-lg-4 col-md-4 p-0">
            <div class="product-item">
                <a href="{{ route('client.productDetail', ['slug_cat' => $product->categories[0]->slug, 'slug_view' => $product->slug]) }}" class="product-link">
                    <div class="product-double--image">
                        <div class="product-double--front"
                            style="background-image: url('/{{ env('UPLOAD_DIR_PRODUCT', 'media/products') }}/{{ $product->avatar }}')">

                        </div>

                        <div class="product-double--under"
                            style="background-image: url('/{{ env('UPLOAD_DIR_PRODUCT', 'media/products') }}/{{ $product->images[0]->name ?? '' }}')">

                        </div>
                    </div>
                    <div class="product-content--info">
                        <h3 class="title p-0">{{ $product->name }}</h3>
                        <span class="price">{{ number_format($product->price) }} VNĐ</span>
                    </div>
                </a>
            </div>
        </div>
    @empty

    @endforelse
    </div>
</section>
@endsection
