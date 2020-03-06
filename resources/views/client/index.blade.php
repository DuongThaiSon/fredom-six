@extends('client.layouts.main')
@section('title', 'Trang chủ')
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

<section class="welcome">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="welcome-img d-flex justify-content-center">
                    <img src="{{ asset('assets/client') }}/images/1.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="col-lg-8 mx-auto d-flex align-items-center h-100">
                    <div class="welcome-content">
                        <h2 class="mb-3 animated bounce">Welcome</h2>
                        <p>Chúng tôi mong muốn cung cấp cho bạn những bộ quần áo độc đáo được làm bằng tất cả tâm huyết
                            và trái tim vậy nên
                            Fredom.6ix chắc chắn sẽ có thứ bạn đang tìm kiếm.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="collection" class="owl-carousel owl-theme">
    @foreach ($collections->children as $collection)
        <div class="collection-item">
            <div class="collection-wrap">
                <div class="collection-content">
                    <h1 class="collection-content--title">{{ $collection->name }}</h1>
                    <p class="collection-content--des">{!! strip_tags($collection->description) !!}</p>
                    <a href="{{ route('client.productCategory', ['slug_cat' => $collection->slug]) }}" class="btn-discover">khám phá</a>
                </div>
            </div>
            <img src="{{ env('UPLOAD_DIR_PRODUCT', 'media/products') }}/{{ $collection->avatar }}" alt="">
        </div>
    @endforeach
    {{-- <div class="collection-item">
        <div class="collection-wrap">
            <div class="collection-content">
                <h1 class="collection-content--title">lemon project</h1>
                <p class="collection-content--des">Bộ sưu tập mới nhất của chúng tôi đã ra mắt, hãy cùng xem nhé</p>
                <a href="" class="btn-discover">khám phá</a>
            </div>
        </div>
        <img src="{{ asset('assets/client') }}/images/collection-1.png" alt="">
    </div>
    <div class="collection-item">
        <div class="collection-wrap">
            <div class="collection-content">
                <h1 class="collection-content--title">glow</h1>
                <p class="collection-content--des">Bộ sưu tập mới nhất của chúng tôi đã ra mắt</p>
                <a href="" class="btn-discover">khám phá</a>
            </div>
        </div>
        <img src="{{ asset('assets/client') }}/images/collection-2.jpg" alt="">
    </div> --}}
</section>

<section id="intro" class="welcome owl-carousel owl-theme">
    <div class="intro-item">
        <div class="d-flex justify-content-center">
            <div class="intro-content ">
                <div class="intro-content--box w-50 text-center mb-4 mx-auto">
                    <span class="ti-quote-right"></span>
                    <p>The name comes from the original Japanese translation - Moon. We've always been enchanted by her astrological beauty.</p>
                </div>
                <div class="intro-content--author d-flex justify-content-center align-items-center">
                    <div class="logo">
                        <img src="{{ asset('assets/client') }}/images/logo.png" alt="">
                    </div>
                    <strong>fredom.6ix</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="intro-item">
        <div class="d-flex justify-content-center">
            <div class="intro-content ">
                <div class="intro-content--box w-50 text-center mb-5 mx-auto">
                    <span class="ti-quote-right"></span>
                    <p>The name comes from the original Japanese translation - Moon. We've always been enchanted by her astrological beauty.</p>
                </div>
                <div class="intro-content--author d-flex justify-content-center align-items-center">
                    <div class="logo">
                        <img src="{{ asset('assets/client') }}/images/logo.png" alt="">
                    </div>
                    <strong>fredom.6ix</strong>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="product" class="owl-carousel owl-theme">
    @foreach ($highlightProducts as $product)
        <div class="product-item border-0">
            <div class="product-item--wrap">
                <p class="product-title--mobile">shop the look</p>
                <div class="product-image">
                    <div class="product-image--bg" style="background-image: url('{{ env('UPLOAD_DIR_PRODUCT', 'media/products') }}/{{ $product->avatar ?? ''}}')">

                    </div>
                </div>
                <div class="product-content">
                    <div class="product-content--item">
                        <a href="{{ route('client.productDetail', ['slug_cat' => $product->categories[0]->slug, 'slug_view' => $product->slug]) }}" class="product-link">
                            <div class="product-double--image">
                                @foreach ($product->images()->orderBy('order', 'desc')->take(2)->get() as $item)
                                    <div class="{{ $loop->first ? 'product-double--front' : 'product-double--under' }}" style="background-image: url('{{ env('UPLOAD_DIR_PRODUCT', 'media/products') }}/{{ $item->name }}')">

                                    </div>
                                @endforeach
                                {{-- <div class="product-double--front" style="background-image: url('{{ asset('assets/client') }}/images/9.jpg')">

                                </div>
                                <div class="product-double--under" style="background-image: url('{{ asset('assets/client') }}/images/10.jpg')"> --}}

                                {{-- </div> --}}
                            </div>
                            <div class="product-content--info">
                                <h3 class="title">{{ $product->name }}</h3>
                                <span class="price">{{ number_format($product->price) ?? '0' }} VNĐ</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- <div class="product-item border-0">
        <div class="product-item--wrap">
            <p class="product-title--mobile">shop the look</p>
            <div class="product-image">
                <div class="product-image--bg" style="background-image: url('{{ asset('assets/client') }}/images/product-bg-1.jpg')">

                </div>
            </div>
            <div class="product-content">
                <div class="product-content--item">
                    <a href="" class="product-link">
                        <div class="product-double--image">
                            <div class="product-double--front" style="background-image: url('{{ asset('assets/client') }}/images/9.jpg')">

                            </div>
                            <div class="product-double--under" style="background-image: url('{{ asset('assets/client') }}/images/10.jpg')">

                            </div>
                        </div>
                        <div class="product-content--info">
                            <h3 class="title">Lemon croptop</h3>
                            <span class="price">450.000 VNĐ</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="product-item border-0">
        <div class="product-item--wrap">
            <p class="product-title--mobile">shop the look</p>
            <div class="product-image">
                <div class="product-image--bg" style="background-image: url('{{ asset('assets/client') }}/images/15.jpg')">

                </div>
            </div>
            <div class="product-content">
                <div class="product-content--item">
                    <a href="" class="product-link">
                        <div class="product-double--image">
                            <div class="product-double--front" style="background-image: url('{{ asset('assets/client') }}/images/7.jpg')">

                            </div>
                            <div class="product-double--under" style="background-image: url('{{ asset('assets/client') }}/images/16.jpg')">

                            </div>
                        </div>
                        <div class="product-content--info">
                            <h3 class="title">glow shirt</h3>
                            <span class="price">450.000 VNĐ</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="product-item border-0">
        <div class="product-item--wrap">
            <p class="product-title--mobile">shop the look</p>
            <div class="product-image">
                <div class="product-image--bg" style="background-image: url('{{ asset('assets/client') }}/images/4.jpg')">

                </div>
            </div>
            <div class="product-content">
                <div class="product-content--item">
                    <a href="" class="product-link">
                        <div class="product-double--image">
                            <div class="product-double--front" style="background-image: url('{{ asset('assets/client') }}/images/8.jpg')">

                            </div>
                            <div class="product-double--under" style="background-image: url('{{ asset('assets/client') }}/images/6.jpg')">

                            </div>
                        </div>
                        <div class="product-content--info">
                            <h3 class="title">lemon hoodie</h3>
                            <span class="price">450.000 VNĐ</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="product-item border-0">
        <div class="product-item--wrap">
            <p class="product-title--mobile">shop the look</p>
            <div class="product-image">
                <div class="product-image--bg" style="background-image: url('{{ asset('assets/client') }}/images/25.jpg')">

                </div>
            </div>
            <div class="product-content">
                <div class="product-content--item">
                    <a href="" class="product-link">
                        <div class="product-double--image">
                            <div class="product-double--front" style="background-image: url('{{ asset('assets/client') }}/images/27.jpg')">

                            </div>
                            <div class="product-double--under" style="background-image: url('{{ asset('assets/client') }}/images/26.jpg')">

                            </div>
                        </div>
                        <div class="product-content--info">
                            <h3 class="title">lemon pant</h3>
                            <span class="price">700.000 VNĐ</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div> --}}
</section>
@endsection
