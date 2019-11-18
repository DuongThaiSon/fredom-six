@extends('client.layouts.main', ['title' => __('Home Moolez')])
@section('content')
<!-- showcase -->
 <!-- showcase -->
 <div id="showcase">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
      <!-- slide -->
      @forelse ($slide as $image)
        <div class="carousel-item {{ $loop->first ? 'active':'' }} "
          style="background:url('{{ asset('/media/uploadImg') }}/{{ $image->name }}'); background-size: cover; height: 900px;">
          <div class="container">
            <div class="row">
              <div class="col-6"></div>
              <div class="col-md-6 d-none d-md-block" style="padding-left: 70px;">
                <div class="showcase-title">
                  <h2 class="text-uppercase font-italic">the</h2>
                  <h2 class="text-uppercase font-italic ml-3">most</h2>
                  <h1 class="text-uppercase display-4">luxury</h1>
                  <h1 class="text-uppercase display-4 mb-4"  style="margin-left: 120px;">
                    bag
                  </h1>
                  <p>
                    Use this text to share information about your brand with your
                    customers. Describe a product, share annoucement, or welcome
                    customers to your store
                  </p>
                  <a href="{{ route('client.products.new') }}" class="btn text-uppercase">news arrivals</a>
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
          <img src="/{{ env('UPLOAD_DIR_ARTICLE') }}/{{ $articleIntro->articles[0]->avatar }}" class="pl-5 mt-5" alt="" />
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
        <a href="#">
          <div class="card-collection"
            style="background: url('{{ asset('assets/client') }}/img/luxury.png') no-repeat center; background-size: cover; height: 520px;">
            <div class="dark-overlay">
              <h2>luxury collection</h2>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4 col-sm-block">
        <a href="#">
          <div class="card-collection"
            style="background: url('{{ asset('assets/client') }}/img/business.png') no-repeat center; background-size: cover; height: 520px;">
            <div class="dark-overlay">
              <h2>business collection</h2>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4 col-sm-block">
        <a href="#">
          <div class="card-collection"
            style="background: url('{{ asset('assets/client') }}/img/classic.png') no-repeat center; background-size: cover; height: 520px;">
            <div class="dark-overlay">
              <h2>classic collection</h2>
            </div>
          </div>
        </a>
      </div>
    </div>
  </section>
  <!-- sale -->
  <section id="sale">
    <h2 class="sale-title">Hot sale</h2>
    <div class="container">
      <div class="banner">
        <div id="banner" class="owl-carousel owl-theme">
          <div class="item">
            <a href="#">
              <img src="{{ asset('assets/client') }}/img/SaleImage.png" alt="">
            </a>
            <div class="banner-content position-absolute">
              <div class="banner-text"></div>
            </div>
          </div>
          <div class="item">
            <a href="#">
              <img src="{{ asset('assets/client') }}/img/SaleImage.png" alt="">
            </a>
            <div class="banner-content">
              <div class="banner-text"></div>
            </div>
          </div>
          <div class="item">
            <a href="#">
              <img src="{{ asset('assets/client') }}/img/SaleImage.png" alt="">
            </a>
            <div class="banner-content">
              <div class="banner-text"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- gift -->
  <section id="gift">
    <div class="gift-image">
      <a href="#"><img src="{{ asset('assets/client') }}/img/gift.png" alt=""></a>
      <h1 class="text-uppercase display-3">gifts</h1>
    </div>
  </section>
  <!-- mix & match -->
  <section id="mix-match" class="mb-4 d-none d-lg-block">
    <h1 class="text-center display-3 text-uppercase">{{ $products->name }}</h1>
    <div id="match" class="owl-carousel owl-theme">
      <div class="item">
        <div class="row" style="height: 578px">
          <div class="col-lg-3 full-set">
            <img src="/{{ env('UPLOAD_DIR_PRODUCT') }}/{{ $products->avatar }}" alt="">
          </div>
          <div class="col-lg-3">
            @foreach ($products->products->take(2) as $item)
            <div class="{{ $loop->iteration === 1?'clothe':'short' }}">
                <img src="/{{ env('UPLOAD_DIR_PRODUCT') }}/{{ $item->avatar }}" alt="">
                <div class="{{ $loop->iteration === 1?'clothe-name':'short-name' }}">
                  <p class="mb-0">{{ $item->name }}</p>
                  <a href="{{ route('client.products.detail', $item->id) }}" class="item-link">Xem sản phẩm</a>
                </div>
              </div>
            @endforeach

            {{-- <div class="short">
              <img src="{{ asset('assets/client') }}/img/short.png" alt="">
              <div class="short-name">
                <p class="mb-0">Quần Short</p>
                <a href="#" class="item-link">Xem sản phẩm</a>
              </div>
            </div> --}}
          </div>
          <div class="col-lg-3">
              @foreach ($products->products->skip(2)->take(3) as $item)
            <div class="earing">
              <img src="/{{ env('UPLOAD_DIR_PRODUCT') }}/{{ $item->avatar }}" alt="">
              <div class="earing-name">
                <p class="mb-0">{{ $item->name }}</p>
                <a href="{{ route('client.products.detail', $item->id) }}" class="item-link">Xem sản phẩm</a>
              </div>
            </div>
              @endforeach

          </div>

          <div class="col-lg-3">
              @foreach ($products->products->skip(5)->take(2) as $item)
            <div class="shoes">
              <img src="/{{ env('UPLOAD_DIR_PRODUCT') }}/{{ $item->avatar }}" alt="">
              <div class="shoes-name">
                <p class="mb-0">{{ $item->name }}</p>
                <a href="{{ route('client.products.detail', $item->id) }}" class="item-link">Xem sản phẩm</a>
              </div>
            </div>
              @endforeach
            {{-- <div class="bag">
              <img src="{{ asset('assets/client') }}/img/bag.png" alt="">
              <div class="bag-name">
                <p class="mb-0">Túi Orico</p>
                <a href="#" class="item-link">Xem sản phẩm</a>
              </div>
            </div> --}}
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
            <div>{!! $lookbook->articles[0]->detail !!}</div> 
            <div class="learn">
              <a href="" class="text-uppercase">learn more</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 p-0">
        <div class="lookbook-img">
          <img src="{{ asset('media/articles') }}/{{ $lookbook->articles[0]->avatar }}" alt="">
        </div>
      </div>

      <div class="col-md-6 p-0">
        <div class="lookbook-img">
          <img src="{{ asset('media/articles') }}/{{ $lookbook->articles[1]->avatar }}" alt="">
        </div>
      </div>
      <div class="col-lg-6 col-md-6 p-0">
        <div class="col-lg-9 mx-auto">
          <div class="lookbook-content">
            <h3 class="text-uppercase">{{ $lookbook->articles[1]->name }}</h3>
            <h2 class="text-uppercase display-4">{!! $lookbook->articles[1]->description !!}</h2>
            <div class="line"></div>
            <div class="">{!! $lookbook->articles[1]->detail !!}</div>
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
        <p class="text-center font-italic">{!! strip_tags($quote->detail) !!}</p>
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
        <div class="item">
          <div class="logo-list">
            <img src="{{ asset('assets/client') }}/img/color-company.png" alt="">
          </div>
        </div>
        <div class="item">
          <div class="logo-list">
            <img src="{{ asset('assets/client') }}/img/king.png" alt="">
          </div>
        </div>
        <div class="item">
          <div class="logo-list">
            <img src="{{ asset('assets/client') }}/img/trend.png" alt="">
          </div>
        </div>
        <div class="item">
          <div class="logo-list">
            <img src="{{ asset('assets/client') }}/img/brilliant-color.png" alt="">
          </div>
        </div>
        <div class="item">
          <div class="logo-list">
            <img src="{{ asset('assets/client') }}/img/inside.png" alt="">
          </div>
        </div>
        <div class="item">
          <div class="logo-list">
            <img src="{{ asset('assets/client') }}/img/fashion-color.png" alt="">
          </div>
        </div>
        <div class="item">
          <div class="logo-list">
            <img src="{{ asset('assets/client') }}/img/telenor.png" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="line"></div>
  </section>
  <!-- customer voice -->
  <section id="customer-voice">
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
  </section>
  <!-- news -->
  <section id="news">
    <div class="container">
      <div id="new-slide" class="owl-carousel owl-theme">
        @foreach ($articles as $item)
        <div class="card-news card-border-0 news-item">
          <img src="/{{ env('UPLOAD_DIR_ARTICLE') }}/{{ $item->avatar}}" alt="" class="card-img-top">
          <div class="card-body">
            <p class="card-title text-uppercase font-weight-bold pt-3">{{ $item->name }}</p>
            <div class="card-text more">{!! $item->description !!}</div>
            <a href="{{ route('client.news.detail', $item->id) }}" class="learn text-uppercase">Learn more</a>
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
