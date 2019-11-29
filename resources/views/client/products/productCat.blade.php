@extends('client.layouts.main', ['title' => __('Product')])
@section('content')
<!-- breadcrumb -->
<div class="bread-crumb">
    <div class="row" style="background: #ebebeb;">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a class="active"
                            href="{{ route('client.products.category', $category->slug) }}">{{ $category->name ??''}}</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- showcase -->
<div id="showcase" style="height: 645px; overflow: hidden;">
    <img src="/{{ env('UPLOAD_DIR_PRODUCT') }}/{{ $category->avatar }}" style="width: 100%; background-position: top;" alt="">
</div>
<!-- product -->
<section id="product-option">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="options d-flex justify-content-center">
                    <ul class="nav">

                        <li class="text-muted">Bộ lọc</li>
                        @foreach ($category->productAttributes as $item)
                        <li class="options-list font-weight-bold">{{ $item->name }}<i class="fas fa-caret-down"></i>
                        </li>
                        @endforeach
                    </ul>
                    <div class="checkbox-option p-3" style="margin-left: 4%; width: fit-content;">
                        <div class="all-options d-flex">
                            <!-- styles -->
                            @forelse ($category->productAttributes as $attribute)

                            <div class="style-options {{($attribute->type === "color")?"d-flex":"flex-column"}} flex-wrap align-self-start" style="margin-inline-end: 60px; {{($attribute->type === "color")?'max-width: 90px':''}}">
                                @forelse ($attribute->productAttributeOptions as $attributeValue)

                                <label class="checkbox-container"
                                    style="{{ $attribute->type==="color"?'margin: 0 18px 18px 0':''}}">
                                    <input type="checkbox" class="checkbox-product" value="{{ $attributeValue->id }}">
                                    <span class="checkmark"
                                        {{ $attribute->type==="color"?'style=background:'.$attributeValue->value:''}}></span>
                                    <span
                                        style="margin-left: 25px; {{ $attribute->type==="color"?'display: none':''}}">{{ $attributeValue->value }}</span>
                                </label>
                                @empty

                                @endforelse
                            </div>
                            @empty

                            @endforelse
                        </div>
                        <form action="{{ route('client.products.category', $category->slug) }}" method="GET"
                            enctype="text/plain">
                            <button style="border-radius: 0.25rem !important;" class="btn btn-primary" type="submit" value="Tìm kiếm">Lọc sản phẩm</button>
                            <input type="hidden" id="tags" data-role="tagsinput" value="" name="term"
                                placeholder="Tìm kiếm">
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- product list-->
<section id="product-list">
    <div class="container">
        <div class="row mb-4">
            @forelse ($products as $prod)
            <div class="col-lg-3 col-6">
                <div class="product mb-3">
                    <div class="card">
                        <div class="product-img">
                            <a href="{{ route('client.products.detail', ['slug_view' => $prod->slug, 'slug_cat' => $category->slug]) }}">
                                <img
                                    src="/{{ env('UPLOAD_DIR_PRODUCT') }}/{{ $prod->avatar }}"
                                    class="mx-auto d-flex justify-content-center" alt=""></a>
                            <div class="product-colors justify-content-center d-flex">
                                @php
                                    $colors = $prod->productAttributeOptions->filter(function($q){
                                        return $q->product_attribute_id == 2;
                                    })->unique();
                                @endphp
                                @forelse ($colors as $color)
                                    {{-- <a href="#" class="choose-color" data-color="{{ $color->value }}"> --}}
                                        <div class="product-color" style="background: {{ $color->value }};" title="{{ $color->note }}">
                                        </div>
                                    {{-- </a> --}}
                                @empty
                                @endforelse
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('client.products.detail', ['slug_view' => $prod->slug, 'slug_cat' => $category->slug]) }}"
                                class="product-name">{{ $prod->name }}</a>
                            <!-- rating -->
                            <div id='rating' class='rating'>
                                <span class='ratingStars {{ !empty($prod->rate) && $prod->rate >= 1 ? 'clickStars': '' }}'>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </span>
                                <span class='ratingStars {{ !empty($prod->rate) && $prod->rate >= 2 ? 'clickStars': '' }}'>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </span>
                                <span class='ratingStars {{ !empty($prod->rate) && $prod->rate >= 3 ? 'clickStars': '' }}'>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </span>
                                <span class='ratingStars {{ !empty($prod->rate) && $prod->rate >= 4 ? 'clickStars': '' }}'>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </span>
                                <span class='ratingStars {{ !empty($prod->rate) && $prod->rate >= 5 ? 'clickStars': '' }}'>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="clear"></div>
                            <!-- price -->
                            <div class="product-price">
                                <span
                                    class="{{ ($prod->discount > 0)?'old-price':'new-price' }}" >{{ number_format($prod->price) }}đ</span>

                                <span
                                    class="new-price">{{ (($prod->discount > 0)?number_format($prod->price-$prod->price*$prod->discount/100) .'đ':'') }}</span>
                            </div>
                        </div>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item">
                                <a href="" data-id="{{ $prod->id }}" class="btn-add-cart cart-link text-muted ">
                                    <i class="fas fa-shopping-basket" style="margin-right: 9px;"></i>
                                    <span>Add to cart</span>
                                </a>
                            </div>
                        </div>

                    </div>
                    {{-- {{ $product->links() }} --}}
                    {{-- <p class="text-uppercase text-center mt-5">loading...</p> --}}
                </div>
            </div>
            @empty
            <div class="alert alert-danger text-center m-auto w-100">Không có sản phẩm nào được tìm thấy
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
@push('js')
<script>
    $(".options-list").click(function () {
      if ($('.checkbox-option:visible').length)
        $('.checkbox-option').fadeToggle(500);
      else
        $('.checkbox-option').fadeToggle(500);
    })

</script>
<script src="{{ asset('assets/client') }}/js/products.js"></script>
@endpush
