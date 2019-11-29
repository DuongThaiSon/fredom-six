
@extends('client.layouts.main', ['title' => __('News')])
@section('content')
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
            style="background:url('/{{ env('UPLOAD_DIR_GALLERY') }}/{{ $image->name }}'); background-size: cover; height: 900px;">
            <div class="container">
              <div class="row">
                <div class="col-6"></div>
                <div class="col-md-6 d-none d-md-block" style="padding-left: 70px;">
                  {{--<div class="showcase-title">
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
                  </div>--}}
                </div>
              </div>
            </div>
          </div>
        @empty
        @endforelse

      </div>
    </div>
  </div>
  <!-- news -->
  <section id="news">
    <div class="news-container">
      <!-- news-1 -->
      @forelse ($news as $new)
      <div class="row">
        <div class="col-12 col-lg-6">
          <div class="news-img">
            <img src="/{{ env('UPLOAD_DIR_ARTICLE') }}/{{ $new->avatar }}" alt="{!! $new->name !!}">
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="news-title">
            <h6 class="font-weight-bold">{!! $new->name !!}</h6>
            <div class="time">
              <i class="fas fa-clock"></i>
              <span>{{ $new->updated_at}}</span>
            </div>
            <div class="title-detail text-justify">{!! $new->description !!}​</div>
            <a href="{{ route('client.news.detail', $new->slug) }}" class="news-detail-link">Đọc tiếp <i class="fas fa-chevron-circle-right"></i></a>
          </div>
        </div>
      </div>

      @empty
          Không có tin tức nào.
      @endforelse

      <!-- pagination -->
      <div class="row mb-0 justify-content-end">

        {{ $news->links() }}
      </div>
    </div>
    </div>
  </section>
@endsection
