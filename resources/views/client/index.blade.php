@extends('client.layouts.main', ['title' => __('Home Moolez')])
@section('content')
<!-- showcase -->
<!-- showcase -->
<div id="showcase">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @forelse ($slide as $image)
            <li data-target="#myCarousel" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
            @empty
            @endforelse
        </ol>
        <div class="carousel-inner">
            <!-- slide -->
            @forelse ($slide as $image)
            <div class="carousel-item {{ $loop->first ? 'active':'' }} "
                style="background:url('/{{ env('UPLOAD_DIR_GALLERY') }}/{{ $image->name }}'); background-size: cover; height: 900px;">
                <div class="container">
                    <div class="row">
                        <div class="col-6"></div>
                        <div class="col-md-6 d-none d-md-block" style="padding-left: 70px;">
                            <div class="showcase-title">
                                <h2 class="text-uppercase font-italic">the</h2>
                                <h2 class="text-uppercase font-italic ml-3">most</h2>
                                <h1 class="text-uppercase display-4">luxury</h1>
                                <h1 class="text-uppercase display-4 mb-4" style="margin-left: 120px;">
                                    bag
                                </h1>
                                <p>{{ $image->caption }}</p>
                                <a href="{{ route('client.products.new') }}" class="btn text-uppercase">news
                                    arrivals</a>
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
<!-- about -->
<section id="about">
    <div class="container">
        <div class="row py-5">
            <div class="col-lg-6 col-md-12 py-lg-4 my-lg-5">
                <h3 class="text-uppercase">{{ $articleIntro->articles[0]->name }}</h3>
                <h1 class="text-uppercase display-4">{!! strip_tags($articleIntro->articles[0]->description) !!}</h1>
                <p class="mb-5">{!! $articleIntro->articles[0]->detail !!}</p>
            </div>
            <div class="col-lg-6 col-md-12 py-lg-4 my-lg-5">
                <img src="/{{ env('UPLOAD_DIR_ARTICLE') }}/{{ $articleIntro->articles[0]->avatar }}" class="pl-5 mt-5"
                    alt="" />
            </div>
        </div>
    </div>
    <!-- about text -->
    <div class="row" data-aos="fade-right" data-aos-duration="3000">
        <div class="col-lg-8 col-md-12" style="background: #ebebeb">
            <div class="about-text py-5">
                <p class="m-0">
                    {!! strip_tags($articleIntro->articles[1]->detail) !!}
                </p>
            </div>
        </div>
    </div>
</section>
<!-- collection -->
<section id="collection">
    <div class="row">
        <div class="col-md-4 col-sm-block">
            <a href="{{ route('client.products.category', ['slug_cat' => 'luxury-collection']) }}">
                <div class="card-collection"
                    style="background: url(/{{ env('UPLOAD_DIR_PRODUCT') }}/{{ $luxury->avatar }}) no-repeat center; background-size: cover; height: 520px;">
                    <div class="dark-overlay">
                        <h2>{{ $luxury->name }}</h2>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-sm-block">
            <a href="{{ route('client.products.category', ['slug_cat' => 'business-collection']) }}">
                <div class="card-collection"
                    style="background: url(/{{ env('UPLOAD_DIR_PRODUCT') }}/{{ $business->avatar }}) no-repeat center; background-size: cover; height: 520px;">
                    <div class="dark-overlay">
                        <h2>{{ $business->name }}</h2>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-sm-block">
            <a href="{{ route('client.products.category', ['slug_cat' => 'classic-collection']) }}">
                <div class="card-collection"
                    style="background: url(/{{ env('UPLOAD_DIR_PRODUCT') }}/{{ $classic->avatar }}) no-repeat center; background-size: cover; height: 520px;">
                    <div class="dark-overlay">
                        <h2>{{ $classic->name }}</h2>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>
<!-- sale -->
<section id="sale" style="background: url(/{{ env('UPLOAD_DIR_GALLERY') }}/{{ $saleBanner->avatar }})">
    <h2 class="sale-title">{{ $saleBanner->name }}</h2>
    <div class="container">
        <div class="banner">
            <div id="banner" class="owl-carousel owl-theme">
                @foreach ($sale as $item)
                <div class="item">
                    <a href="#">
                        <img src="/{{ env('UPLOAD_DIR_GALLERY') }}/{{ $item->name }}" alt="{{ $item->name }}">
                    </a>
                    <div class="banner-content position-absolute">
                        <div class="banner-text"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- gift -->
<section id="gift">
    <div class="gift-image">
        <a href="{{ route('client.products.category', ['slug_cat' => 'gifts']) }}"><img src="/{{ env('UPLOAD_DIR_PRODUCT') }}/{{ $gifts->avatar }}" alt=""></a>
        <h1 class="text-uppercase display-3">{{ $gifts->name }}</h1>
    </div>
</section>
<!-- mix & match -->
<section id="mix-match" class="mb-4">
    <h1 class="text-center display-3 text-uppercase">{{ $products->name }}</h1>
    <div id="match" class="owl-carousel owl-theme">
        <div class="item">
            <div class="row" style="height: 578px">
                <div class="col-lg-3 col-6 full-set">
                    <img src="/{{ env('UPLOAD_DIR_PRODUCT') }}/{{ $products->avatar }}" alt="">
                </div>
                <div class="col-lg-3 col-6 p-0">
                    @foreach ($products->products->take(2) as $item)
                    <div class="{{ $loop->iteration === 1?'clothe':'short' }}">
                        <img src="/{{ env('UPLOAD_DIR_PRODUCT') }}/{{ $item->avatar }}" alt="">
                        <div class="{{ $loop->iteration === 1?'clothe-name':'short-name' }}">
                            <p class="mb-0">{{ $item->name }}</p>
                            <a href="{{ route('client.products.detail', ['slug_cat' => 'mix-match', 'slug_view' => $item->slug]) }}" class="item-link">Xem sản
                                phẩm</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-3 col-6">
                    @foreach ($products->products->skip(2)->take(3) as $item)
                    <div class="{{ $loop->iteration === 1?'earing':($loop->iteration === 2?'watch':'glasses') }}">
                        <img src="/{{ env('UPLOAD_DIR_PRODUCT') }}/{{ $item->avatar }}" alt="">
                        <div class="{{ $loop->iteration === 1?'earing-name':($loop->iteration === 2?'watch-name':'glasses-name') }}">
                            <p class="mb-0">{{ $item->name }}</p>
                            <a href="{{ route('client.products.detail', ['slug_cat' => 'mix-match', 'slug_view' => $item->slug]) }}" class="item-link">Xem sản
                                phẩm</a>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="col-lg-3 col-6 p-0">
                    @foreach ($products->products->skip(5)->take(2) as $item)
                    <div class="{{ $loop->iteration === 1?'shoes':'bag' }}">
                        <img src="/{{ env('UPLOAD_DIR_PRODUCT') }}/{{ $item->avatar }}" alt="">
                        <div class="{{ $loop->iteration === 1?'shoes-name':'bag-name' }}">
                            <p class="mb-0">{{ $item->name }}</p>
                            <a href="{{ route('client.products.detail', ['slug_cat' => 'mix-match', 'slug_view' => $item->slug]) }}" class="item-link">Xem sản
                                phẩm</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- lookbook -->
<section id="lookbook">
    <div class="row">
        <div class="col-md-6 p-0">
            <div class="col-lg-9 mx-auto">
                <div class="lookbook-content">
                    <h3 class="text-uppercase">{{ $lookbook->articles[0]->name }}</h3>
                    <h2 class="text-uppercase display-4">{!! $lookbook->articles[0]->description !!}</h2>
                    <div class="line"></div>
                    <div class="text-Area">{!! $lookbook->articles[0]->detail !!}</div>
                    <div class="learn">
                        <a href="" class="text-uppercase">learn more</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 p-0">
            <div class="lookbook-img">
                <img src="/{{ env('UPLOAD_DIR_ARTICLE') }}/{{ $lookbook->articles[0]->avatar }}" alt="">
            </div>
        </div>

        <div class="col-md-6 p-0">
            <div class="lookbook-img">
                <img src="/{{ env('UPLOAD_DIR_ARTICLE') }}/{{ $lookbook->articles[1]->avatar }}" alt="">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 p-0">
            <div class="col-lg-9 mx-auto">
                <div class="lookbook-content">
                    <h3 class="text-uppercase">{{ $lookbook->articles[1]->name }}</h3>
                    <h2 class="text-uppercase display-4">{!! $lookbook->articles[1]->description !!}</h2>
                    <div class="line"></div>
                    <div class="text-Area">{!! $lookbook->articles[1]->detail !!}</div>
                    <div class="learn">
                        <a href="" class="text-uppercase">learn more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- customer -->
<section id="customer">
    <h2 class="cus-title display-4 text-uppercase text-center">
        {{ $articleReview->name }}
    </h2>
    <div class="container">
        <!-- customer slide -->
        <div id="cus-slide" class="owl-carousel owl-theme">
            @foreach ($articleReview->articles as $item)
            <div class="item">
                <div class="card-customer card border-0 mx-auto">
                    <img src="/{{ env('UPLOAD_DIR_ARTICLE') }}/{{ $item->avatar }}" class="card-img" alt="">
                    <div class="card-body">
                        <div class="card-name text-capitalize text-center">{{ $item->name }}</div>
                        <div class="card-job text-capitalize text-center">{!! $item->description !!}</div>
                        <div class="card-text">{!! $item->detail !!}</div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <!-- quote -->
        <div class="quote">
            <img src="{{ asset('assets/client') }}/img/quote.png" class="float-left" alt="">
            <div class="text-center font-italic">{!! $quote->detail !!}</div>
        </div>
        <div class="cmt text-center">
            <div class="ava-cmt">
                <img src="/{{ env('UPLOAD_DIR_ARTICLE') }}/{{ $quote->avatar }}" alt="">
            </div>
            <div class="cmt-name">
                <p class="text-capitalize font-weight-bold">{{ $quote->name }}</p>
                <p class="font-italic">{!! strip_tags($quote->description) !!}</p>
            </div>
        </div>
    </div>
</section>
<!-- partner -->
<section id="partner">
    <div class="line"></div>
    <div class="container">
        <div id="logo-partner" class="owl-carousel owl-theme">
            @forelse ($partner as $item)
            <div class="item">
                <div class="logo-list">
                    <img src="/{{ env('UPLOAD_DIR_GALLERY') }}/{{ $item->name }}" alt="">
                </div>
            </div>
            @empty

            @endforelse
        </div>
    </div>
    <div class="line"></div>
</section>
<!-- customer voice -->
{{-- <section id="customer-voice">
    <div class="row">
        <div class="col-lg-4">
            <h1 class="text-uppercase text-right">customer voice</h1>
        </div>
        <div class="col-lg-8 ask">
            <div class="form">
                <textarea name="" id="" cols="30" rows="10"></textarea>
                <div class="textarea-bottom">
                    <div class="send d-flex">
                        <span class="mr-auto m-0">Đặt câu hỏi thắc mắc cho chúng tôi</span>
                        <button type="submit" class="border-0" style="background: #ebebeb;">
                            <a href="">
                                <i class="fas fa-paper-plane"></i>
                            </a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- news -->
<section id="news">
    <div class="container">
            <div class=""><h1 class="text-uppercase text-center">News</h1></div>
        <div id="new-slide" class="owl-carousel owl-theme">
            @foreach ($articles as $item)
            <div class="card-news card-border-0 news-item">
                <img src="/{{ env('UPLOAD_DIR_ARTICLE') }}/{{ $item->avatar}}" alt="" class="card-img-top">
                <div class="card-body">
                    <p class="card-title text-uppercase font-weight-bold pt-3">{{ $item->name }}</p>
                    <div class="card-text more">{!! $item->description !!}</div>
                    <a href="{{ route('client.news.detail', $item->slug) }}" class="learn text-uppercase">Learn more</a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endsection
@push('js')
<script>
    $('.more').each(function(e) {
        let content = $(this).parents('.news-item').find('.more').text();
        var lessText = content.substr(0, 70);
        if(content.length > 70) {
            $(this).parents('.news-item').find(".more").text(lessText).append("...");
        } else {
            $(this).parents('.news-item').find(".more").text(content);
        }
      });

</script>

@endpush
