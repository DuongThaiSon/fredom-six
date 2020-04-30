@extends('client.layouts.main')
@section('title', 'Sản phẩm')
@section('content')
<div class="breadcrumbs my-3">
    <div class="container">
        <a href="/">trang chủ</a>
        <span class="breadcrumbs-arrow">
            <span class="ti-angle-right"></span>
        </span>
        <a href="{{ route('client.productCategory', ['slug_cat' => $category->slug]) }}">{{ $category->name }}</a>
        <span class="breadcrumbs-arrow">
            <span class="ti-angle-right"></span>
        </span>
        <a href="{{ route('client.productDetail', ['slug_cat' => $category->slug, 'slug_view' => $product->slug]) }}">{{ $product->name }}</a>
    </div>
</div>

<section class="products-wrapper py-5">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div id="product-detail--slide" class="owl-carousel owl-theme">
                <div class="product-detail--item" style="background: url('/{{ env('UPLOAD_DIR_PRODUCT', 'media/products') }}/{{ $product->avatar }}')">
                    
                </div>
                @foreach ($product->images as $image)
                    <div class="product-detail--item" style="background: url('/{{ env('UPLOAD_DIR_PRODUCT', 'media/products') }}/{{ $image->name }}')">

                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="product-info--wrapper">
                <div class="product-title">
                    <h1>{{ $product->name }}</h1>
                </div>
                <div class="product-price">
                    <p >{{ number_format($variants->first()->price) ?? '0' }} VNĐ</p>
                </div>
                <div class="product-form">
                    <form action="{{ route('client.cart.store') }}"  method="post">
                        @csrf
                        <input type="hidden" name="category_slug" value="{{ $category->slug }}">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="size">
                            <label for="">Size</label>
                            <select name="variant" id="">
                                @foreach ($variants as $option)
                                    <option value="{{ $option->id }}" data-price="{{ $option->price ?? '0' }}" data-quantity={{ $option->quantity ?? '0' }} {{ $loop->first ? 'selected' : '' }}>{{ $option->size }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="quantity-selector">
                            <span class="quantity-minus quantity-adjust">
                                <i class="ti-minus"></i>
                            </span>
                            <input type="text" class="quantity-input" value="1" max="{{ $variants->first()->quantity }}" name="quantity" readonly>
                            <span class="quantity-plus quantity-adjust">
                                <i class="ti-plus"></i>
                            </span>
                        </div>
                        <span>Còn <span class="stock">{{ $variants->first()->quantity }}</span> sản phẩm</span>
                        <div class="button-group-action mt-2">
                            @if ($variants->first()->quantity && $variants->first()->quantity > 0)
                                <button type="submit" class="btn-cart">
                                    <span>Thêm vào giỏ</span>
                                </button>
                            @else
                                <button class="btn-cart btn" disabled>
                                    <span>Hết hàng</span>
                                </button>
                            @endif
                        </div>

                    </form>
                </div>
                <div class="product-des">
                    {!! $product->description !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('select[name=variant]').on('change', function() {
                let price = $('option:selected', this).data('price');
                $('.product-price>p').text(parseFloat(price) + ' VNĐ');
                $('.stock').text($('option:selected', this).data('quantity'))
                if($('option:selected', this).data('quantity') < 1) {
                    $('.button-group-action').empty();
                    $('.button-group-action').append(`<button class="btn-cart btn" disabled><span>Hết hàng</span></button>`);
                } else {
                    $('.button-group-action').empty();
                    $('.button-group-action').append(`<button type="submit" class="btn-cart"><span>Thêm vào giỏ</span></button>`);
                }
            })
        });
    </script>
@endpush
