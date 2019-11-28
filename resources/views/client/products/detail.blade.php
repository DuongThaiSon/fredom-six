@extends('client.layouts.main', ['title' => __('Product details')])
@section('content')
<!-- breadcrumb -->
<div class="bread-crumb">
    <div style="background: #ebebeb;">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('client.products.category', ['slug_cat' => $category->slug]) }}">{{ $category->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a class="active">{{ $product->name }}</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<section id="product-detail">
    <!-- product-slide-image -->
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="single_product_thumb">
                    <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators d-lg-none circle-nav d-flex">
                        @forelse ($product->images as $item)
                            <li data-target="#product_details_slider" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                        @empty
                        @endforelse
                        </ol>
                        <div class="row d-flex-space-between">
                            <div class="product-thumbs col-lg-2 d-flex justify-content-between flex-column p-0">
                                <button onclick="scrollUp()" class="up-button text-center ml-4"><i class="fas fa-angle-up"></i>
                                </button>
                                <ol class="carousel-indicators d-flex flex-column align-items-center m-0">
                                    <ul class="thumbnail mr-3" style="height: 95%;">
                                        @forelse ($product->images as $item)
                                        <li data-target="#product_details_slider" data-slide-to="{{ $loop->index }}" class="thumbnail-products" data-src="{{ env('UPLOAD_DIR_PRODUCT') }}/{{ $item->name ?? ''}}"
                                            style="background-image: url(/{{ env('UPLOAD_DIR_PRODUCT') }}/{{ $item->name ?? ''}}); background-size: 57px 65px; background-repeat: no-repeat;">
                                        </li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </ol>
                                <button onclick="scrollDown()" class="down-button text-center ml-4"
                                    style="z-index: 999;"><i class="fas fa-angle-down"></i>
                                </button>
                            </div>
                            <div class="col-lg-9">
                                <div class="carousel-inner">
                                    @forelse ($product->images as $item)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }} py-3" style="max-height: 600px;">
                                        <a class="gallery_img"
                                            href="/{{ env('UPLOAD_DIR_PRODUCT') }}/{{ $item->name ??'' }}">
                                            <img class="d-block w-75 mx-auto product-main-image"
                                                style="height: 384px; margin-top: 90px; margin-bottom: 90px;"
                                                src="/{{ env('UPLOAD_DIR_PRODUCT') }}/{{ $item->name ?? $product->avatar }}"
                                                alt="{{ $item->name ??'' }}">
                                        </a>
                                    </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                            <a href="#product_details_slider" class="carousel-control-prev" role="button" data-slide="prev">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                            <a href="#product_details_slider" class="carousel-control-next" role="button" data-slide="next">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 p-0">
                <h5 class="product-name font-weight-bold">{{ $product->name }}</h5>
                <div class="product-code my-3">SKU: {{ $product->product_code }}
                </div>
                <!-- price -->
                <div class="product-price">
                    <span
                        class="new-price font-weight-bold">{{ (($product->discount > 0)?number_format($product->price-$product->price*$product->discount/100) . ' đ':'') }}</span>
                    <span
                        class="{{ ($product->discount > 0)?'old-price text-muted':'new-price font-weight-bold' }}">{{ number_format($product->price) }} đ</span>
                </div>
                <!-- review -->
                <div class="review d-flex mt-2">
                    <!-- rating -->

                    <div id='rating' class='rating'>
                        <span class='ratingStars {{ $rating >= 1 ? 'clickStars' : '' }}'>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </span>
                        <span class='ratingStars {{ $rating >= 2 ? 'clickStars' : '' }}'>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </span>
                        <span class='ratingStars {{ $rating >= 3 ? 'clickStars' : '' }}'>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </span>
                        <span class='ratingStars {{ $rating >= 4 ? 'clickStars' : '' }}'>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </span>
                        <span class='ratingStars {{ $rating >= 5 ? 'clickStars' : '' }}'>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </span>
                    </div>
                    <span class="ml-2 pt-4">({{ count($product->reviews) }} Đánh giá)</span>
                    <a href="#review-tab" class="ml-3 pt-4 text-muted write-review"><i class="fas fa-edit"></i>
                        Viết đánh giá</a>
                </div>

                <!-- detail -->
                <div class="details">
                    <div class="row">
                        <div class="col-lg-12">
                            <span class="more">{!! $product->detail !!}</span>

                            {{-- <p>* Chất liệu : {{ ($product->productAttributeOptions->firstWhere('productAttribute.name', 'Chất liệu')->value )?? 'đang cập nhập' }}
                            </p>
                            <p>* Màu sắc :
                                {{ ($product->productAttributeOptions->firstWhere('productAttribute.name', 'Màu sắc')->value) ?? 'đang cập nhập' }}
                            </p>
                        </div>
                        <div class="col-lg-7">
                            <p>* Xuất xứ :
                                {{ ($product->productAttributeOptions->firstWhere('productAttribute.name', 'Xuất xứ')->value) ?? 'đang cập nhập' }}
                            </p>
                            <p>* Kích thước :
                                {{ ($product->productAttributeOptions->where('productAttribute.name', 'Kích cỡ')->pluck('value')->join(", ")) ?? 'đang cập nhập' }}
                            </p> --}}
                        </div>
                        <div class="col-lg-12">
                            {{--  <p class="description">* Mô tả : <span id="dots"></span>
                  <span id="more"
                    style="display: none;">{!! $product->description !!}</span>
                </p>  --}}
                        </div>
                    </div>
                    {{--  <a class="font-weight-bold" onclick="myFunction()" id="myBtn">Xem thêm...</a>  --}}
                </div>
                <!-- policy -->
                <div class="policy">
                    <div class="row" style="margin-left: 5px;">
                        <div class="col-lg-4 col-4 text-center" style="padding: 22px 0;">
                            <p class="text-muted m-0">Hỗ trợ đặt hàng</p>
                            <p class="font-weight-bold m-0">1900292976</p>
                        </div>
                        <div class="col-lg-4 col-4 text-center" style="padding: 22px 0;">
                            <p class="text-muted m-0">Thời gian đổi hàng</p>
                            <p class="font-weight-bold m-0">7 ngày</p>
                        </div>
                        <div class="col-lg-4 col-4 text-center" style="padding: 22px 0;">
                            <p class="text-muted m-0">Bảo hành VIP</p>
                            <p class="font-weight-bold m-0">12 tháng</p>
                        </div>
                    </div>
                </div>
                <div class="form-underline mt-3 w-100" style="width: 102% !important; margin-left: 6px;"></div>
                <form action="">
                    <div class="row mt-2">
                        <div class="col-lg-4 col-6 pr-0">
                            <!-- color -->
                            <div class="product-colors d-flex">
                                @forelse ($product->productAttributeOptions as $attribute)
                                    @if ($attribute->productAttribute->type === 'color')
                                    <a href="#" class="choose-color" data-color="{{ $attribute->value }}">
                                        <div class="product-color" style="background: {{ $attribute->value }};">
                                        </div>
                                    </a>
                                    @endif

                                @empty
                                @endforelse
                                <input type="hidden" name="color" value="{{ $product->productAttributeOptions->firstWhere('productAttribute.type', 'color') ? $product->productAttributeOptions->firstWhere('productAttribute.type', 'color')->value : '' }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-6 py-2">
                            <!-- size -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span
                                        style="border-radius: 0 !important; background: #ffffff; border-right: none !important;font-size: 14px !important;"
                                        class="input-group-text text-muted pr-0" id="basic-addon1">Kích thước:
                                    </span>
                                </div>
                                <select class="form-control pl-0" name="size" id="size"
                                    style="border-left: 0 !important;" style="font-size: 14px;">
                                    @foreach ($product->productAttributeOptions->where('productAttribute.name',
                                    'Kích cỡ') as $item)
                                    <option value="{{ $item->value }}">{{ $item->value ?? 'Đang cập nhập' }}
                                    </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- quantity -->
                        <div class="col-lg-4 col-12 p-0">
                            <div class="number-input ml-2">
                                <button type="button"
                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                    class="my-auto ml-2"></button>
                                <input class="number detail-quantity" value="1" type="number" oninput="format(this)"
                                    min="1" max="24" step="1" />
                                <button type="button"
                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                    class="plus my-auto mr-2"></button>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            {{-- <div class="form-group">
                                <input class="code form-control text-muted" type="text" placeholder="Mã ưu đãi"
                                    style="font-size: 14px !important;">
                            </div> --}}
                        </div>
                    </div>
                    <div class="btn-group my-3">
                        <a href="" data-id="{{ $product->id }}" type="submit" class="btn buy-button btn-buy-now">
                            <i class="fas fa-shopping-basket mr-2"></i>
                            <span class="font-weight-bold text-uppercase">mua ngay</span>
                        </a>
                        @auth
                            @php
                                $isLikeByMe = App\Models\Like::where([['user_id', auth()->user()->id],['product_id', $product->id]])->first();
                            @endphp
                            <a href="#" class="btn like-button ml-2 {{ $isLikeByMe ? 'is-like' : '' }}" data-href="{{ route('client.products.like') }}" {{ $isLikeByMe ? 'disabled=disabled' : '' }}>
                                <i class="fas fa-heart"></i>
                                <span class="font-weight-bold text-uppercase">thích</span>
                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                            </a>
                        @endauth
                    </div>
                    <div class="form-underline mt- w-100" style="width: 102% !important; margin-left: 1px;">
                    </div>
                    <div class="category mt-2">
                        <span class="text-muted"><i class="fas fa-pen-square mr-2"></i> Bộ sưu tập: </span>
                        <a href="{{ route('client.products.category', $category->slug ??'') }}"
                            class="font-weight-bold">{{ $category->name }}</a>
                    </div>
                    <div class="social-network mt-2">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('client.products.detail', ['slug_cat' => $category->slug, 'slug_view' => $product->slug]) }}" class="btn social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/intent/tweet?url={{ route('client.products.detail', ['slug_cat' => $category->slug, 'slug_view' => $product->slug]) }}" class="btn social-link"><i class="fab fa-twitter"></i></a>
                        {{-- <a href="#" class="btn social-link"><i class="fab fa-pinterest-p"></i></a>
                        <a href="#" class="btn social-link"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="btn social-link"><i class="fab fa-tumblr"></i></a> --}}
                    </div>
                </form>
            </div>
        </div>
        <!-- product-detail-accordion -->
      <div class="product-detail-accordion d-lg-none mt-4">
        <div id="accordion">
          <h3>Mô tả sản phẩm</h3>
          <div class="text-justify">
            {!! $product->description !!}
          </div>
          <h3>Đánh giá</h3>
          <div>
            @auth
                <div class="product-review d-flex">
                    <div class="comment-section" style="flex: 0 0 320px; margin-left: -25px;">
                        <form action="" class="comment-form" id="comment-form">
                            @php
                                $currentUserReview = App\Models\Review::where([['user_id', auth()->user()->id],['product_id', $product->id]])->first();
                            @endphp
                            <fieldset>
                                <textarea class="form-control comment-zone" rows="3"
                                    placeholder="Nội dung....">{{ $currentUserReview->content ??'' }}</textarea>
                                <input type="hidden" name="current-user" value="{{ Auth::user()->id ??'' }}">
                                <div class="d-flex justify-content-between">
                                    <div id='rating' class='rating'>
                                        <span class="pt-4">Đánh giá:</span>
                                        <span
                                            class='ratingStars rate-product {{  !empty($currentUserReview->rate) && $currentUserReview->rate >= 1 ? 'clickStars' : '' }}'
                                            data-star="1">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </span>
                                        <span
                                            class='ratingStars rate-product {{  !empty($currentUserReview->rate) && $currentUserReview->rate >= 2 ? 'clickStars' : '' }}'
                                            data-star="2">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </span>
                                        <span
                                            class='ratingStars rate-product {{  !empty($currentUserReview->rate) && $currentUserReview->rate >= 3 ? 'clickStars' : '' }}'
                                            data-star="3">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </span>
                                        <span
                                            class='ratingStars rate-product {{  !empty($currentUserReview->rate) && $currentUserReview->rate >= 4 ? 'clickStars' : '' }}'
                                            data-star="4">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </span>
                                        <span
                                            class='ratingStars rate-product {{  !empty($currentUserReview->rate) && $currentUserReview->rate >= 5 ? 'clickStars' : '' }}'
                                            data-star="5">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </span>
                                        <input type="hidden" name="rating" value="{{ $currentUserReview->rate ??'' }}">
                                    </div>
                                    <div>
                                        <button
                                            class="btn btn-secondary mt-4 btn-comment {{ !empty($currentUserReview) ? 'd-none' : '' }} ">Gửi
                                            đánh giá</button>
                                        <button
                                            class="btn btn-primary mt-4 btn-fix-review float-right {{ empty($currentUserReview) ? 'd-none' : '' }}">Sửa
                                            đánh giá</button>
                                        {{-- {!! !empty($currentUserReview) ? '<button class="btn btn-primary mt-4 btn-fix-review float-right">Sửa đánh giá</button>' : `<button class="btn btn-secondary mt-4 btn-comment ">Gửi đánh giá</button>` !!} --}}
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                @endauth
                @guest
                <div class="text-center">
                    <a href="{{ route('client.loginform') }}" class="btn btn-secondary">Bạn phải đăng nhập
                        để đánh giá</a>
                </div>
                @endguest

                <div class="list-comments"> </div>
          </div>
          <h3>Size chart</h3>
          <div class="text-justify">
            {!! $product->size_chart !!}
          </div>
        </div>
      </div>
        <!-- product-detail-tab -->
        <div class="product-detail-tab mt-5">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active text-muted" id="desc-tab" data-toggle="tab" href="#desc" role="tab"
                        aria-controls="home" aria-selected="true">Mô tả sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-muted" id="review-tab" data-toggle="tab" href="#review" role="tab"
                        aria-controls="review" aria-selected="false">Đánh giá</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-muted" id="chart-tab" data-toggle="tab" href="#chart" role="tab"
                        aria-controls="chart" aria-selected="false">Size Chart</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link text-muted" id="showroom-tab" data-toggle="tab" href="#showroom" role="tab"
                        aria-controls="showroom" aria-selected="false">Showroom</a>
                </li> --}}
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="desc" role="tabpanel" aria-labelledby="desc-tab">
                    <p>{!! $product->description !!}</p>
                </div>
                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                    @auth
                    <div class="product-review d-flex">
                        {{-- <div class="col-2 text-center align-self-center">
                            <h5>{{ Auth::user()->name ?? '' }}</h5>
                        </div> --}}
                        <div class="comment-section col-12">
                            <form action="" class="comment-form" id="comment-form">
                                @php
                                    // print_r($product->id);die;
                                    $currentUserReview = App\Models\Review::where([['user_id', auth()->user()->id],['product_id', $product->id]])->first();
                                @endphp
                                <fieldset>
                                    <textarea class="form-control comment-zone" rows="5"
                                        placeholder="Nội dung....">{{ $currentUserReview->content ??'' }}</textarea>
                                    <input type="hidden" name="current-user" value="{{ Auth::user()->id ??'' }}">
                                    <div class="d-flex justify-content-between">
                                        <div id='rating' class='rating'>
                                            <span class="pt-4">Đánh giá:</span>
                                            <span
                                                class='ratingStars rate-product {{  !empty($currentUserReview->rate) && $currentUserReview->rate >= 1 ? 'clickStars' : '' }}'
                                                data-star="1">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </span>
                                            <span
                                                class='ratingStars rate-product {{  !empty($currentUserReview->rate) && $currentUserReview->rate >= 2 ? 'clickStars' : '' }}'
                                                data-star="2">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </span>
                                            <span
                                                class='ratingStars rate-product {{  !empty($currentUserReview->rate) && $currentUserReview->rate >= 3 ? 'clickStars' : '' }}'
                                                data-star="3">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </span>
                                            <span
                                                class='ratingStars rate-product {{  !empty($currentUserReview->rate) && $currentUserReview->rate >= 4 ? 'clickStars' : '' }}'
                                                data-star="4">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </span>
                                            <span
                                                class='ratingStars rate-product {{  !empty($currentUserReview->rate) && $currentUserReview->rate >= 5 ? 'clickStars' : '' }}'
                                                data-star="5">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </span>
                                            <input type="hidden" name="rating" value="{{ $currentUserReview->rate ??'' }}">
                                        </div>
                                        <div>
                                            <button
                                                class="btn btn-secondary mt-4 btn-comment {{ !empty($currentUserReview) ? 'd-none' : '' }} ">Gửi
                                                đánh giá</button>
                                            <button
                                                class="btn btn-primary mt-4 btn-fix-review float-right {{ empty($currentUserReview) ? 'd-none' : '' }}">Sửa
                                                đánh giá</button>
                                            {{-- {!! !empty($currentUserReview) ? '<button class="btn btn-primary mt-4 btn-fix-review float-right">Sửa đánh giá</button>' : `<button class="btn btn-secondary mt-4 btn-comment ">Gửi đánh giá</button>` !!} --}}
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    @endauth
                    @guest
                    <div class="text-center">
                        <a href="{{ route('client.loginform') }}" class="btn btn-secondary">Bạn phải đăng nhập
                            để đánh giá</a>
                    </div>
                    @endguest

                    <div class="list-comments"> </div>
                </div>
                {{-- </div> --}}
                <div class="tab-pane fade text-center" id="chart" role="tabpanel" aria-labelledby="chart-tab">{!! $product->size_chart !!}</div>
                <div class="tab-pane fade" id="showroom" role="tabpanel" aria-labelledby="showroom-tab">...
                </div>
            </div>
        </div>



    </div>
</section>

<div class="container">
    <div class="more-product">
        <div class="row">
            <p class="text-capitalize" style="font-size: 34px; margin-bottom: 40px;">sản phẩm liên quan</p>
            <div class="container">
                <div class="row mb-4">
                    @forelse ($products as $item)
                    <div class="col-lg-3 col-6">
                        <div class="product">
                            <div class="card">
                                <div class="product-img">
                                    <a href="{{ route('client.products.detail', ['slug_view' => $item->slug, 'slug_cat' => $category->slug]) }}"><img
                                            src="{{ asset('media/product') }}/{{ $item->avatar }}"
                                            class="mx-auto d-flex justify-content-center" alt=""></a>
                                    <div class="product-colors justify-content-center d-flex">
                                        @forelse ($item->productAttributeOptions as $attribute)
                                            @if ($attribute->productAttribute->type === 'color')
                                            <a href="#" class="choose-color" data-color="{{ $attribute->value }}">
                                                <div class="product-color" style="background: {{ $attribute->value }};">
                                                </div>
                                            </a>
                                            @endif
                                        @empty
                                        @endforelse
                                        <input type="hidden" name="color" value="{{ $item->productAttributeOptions->firstWhere('productAttribute.type', 'color') ? $item->productAttributeOptions->firstWhere('productAttribute.type', 'color')->value : '' }}">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('client.products.detail', ['slug_view' => $item->slug, 'slug_cat' => $category->slug]) }}"
                                        class="product-name">{{ $item->name }}</a>
                                    <!-- rating -->
                                    <div id='rating' class='rating'>
                                        <span
                                            class='ratingStars rating-mobile  {{ !empty($item->rate) && $item->rate >= 1 ? 'clickStars' : '' }}'
                                            data-star="1">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </span>
                                        <span
                                            class='ratingStars rating-mobile  {{ !empty($item->rate) && $item->rate >= 2 ? 'clickStars' : '' }}'
                                            data-star="2">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </span>
                                        <span
                                            class='ratingStars rating-mobile  {{ !empty($item->rate) && $item->rate >= 3 ? 'clickStars' : '' }}'
                                            data-star="3">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </span>
                                        <span
                                            class='ratingStars rating-mobile  {{ !empty($item->rate) && $item->rate >= 4 ? 'clickStars' : '' }}'
                                            data-star="4">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </span>
                                        <span
                                            class='ratingStars rating-mobile  {{ !empty($item->rate) && $item->rate >= 5 ? 'clickStars' : '' }}'
                                            data-star="5">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <!-- price -->
                                    <div class="product-price">
                                        <span
                                            class="{{ ($item->discount > 0)?'old-price':'new-price' }}">{{ number_format($item->price) }}đ</span>
                                        <span
                                            class="new-price">{{ (($item->discount > 0)?number_format($item->price-$item->price*$item->discount/100). 'đ':'') }}</span>
                                    </div>
                                </div>
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item">
                                        <a href="" data-id="{{ $item->id }} " class="cart-link text-muted btn-add-cart">
                                            <i class="fas fa-shopping-basket" style="margin-right: 9px;"></i>
                                            <span>Add to cart</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty

                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
<!-- showroom -->
@endsection

@push('js')
<script src="{{ asset('assets/client') }}/js/carts.detail.js"></script>
<script src="{{ asset('assets/client') }}/js/products.detail.js"></script>
<script src="{{ asset('assets/client') }}js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    function scrollDown() {
    document.querySelector('.thumbnail').scrollBy(0, 50);
  }
  function scrollUp() {
    document.querySelector('.thumbnail').scrollBy(0, -100);
  }
  $('.thumbnail li').click(function () {
    $(this).addClass("active")
  });
    $('.carousel').carousel({
        interval: false,
        touch: true
        });
    $(function () {
        $("#accordion").accordion({
        collapsible: true,
        icons: false
    });
    });
</script>
<script>
    var content = $(".details").find(".more").html();

      var lessText = content.substr(0, 500);
      var showText = content.substr(500, content.length - 500);
      if(content.length > 500) {
          $(".details").find(".more").html(lessText).append("<a href='#' class='read-more-link'> ...Xem thêm</a>");
      } else {
          $(".details").find(".more").html(content);
      }

      $("body").on("click", ".read-more-link", function(e) {
          e.preventDefault();
          $(".details").find(".more").html(content).append("<a href='' class='show-less-link'>Rút gọn</a>");
      });
      $("body").on("click", ".show-less-link", function(e) {
          e.preventDefault();
          $(".details").find(".more").html(lessText).append("<a href='' class='read-more-link'> ...Xem thêm</a>");
  });
</script>
@endpush
