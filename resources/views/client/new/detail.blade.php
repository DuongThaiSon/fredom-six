@extends('client.layouts.main', ['title' => __('Detail')])
@section('content')
  <!-- showcase -->
  <div id="showcase">
    <div class="showcase-image">
      <img src="/assets/client/img/SaleImage.png" class="w-100" alt="">
    </div>
  </div>
  <!-- news detail -->
  <section id="news-detail">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-12">
          <div class="header-detail d-flex justify-content-between">
            <div class="back">
              <a href="#"><i class="fas fa-chevron-circle-left"></i></a>
              <a href="{{ route('client.news.index')}}"><span class="font-italic" style="margin-left: 25px; font-size: 18px;">Quay lại</span></a>
            </div>
            <div class="time">
              <i class="fas fa-clock"></i>
              <span>{{ $detail->updated_at ?? ''}}</span>
            </div>
          </div>
          <div class="detail-content">
            <h2 class="detail-title font-weight-bold">{{ $detail->name??'' }}</h2>
            {!! $detail->detail ??'' !!}
          </div>
          <div class="detail-bottom d-flex justify-content-between">
            <div class="tag">
              <span class="text-uppercase font-weight-bold">tags: </span>
              <a href="#">new, </a>
              <a href="#">bag, </a>
              <a href="#">high fashion</a>
            </div>
            <div class="share">
              <span class="share-link text-uppercase font-weight-bold">share this: </span>
              <a target="_blank" href="https://twitter.com/intent/tweet?text={{ route('client.news.detail', $detail->id??'' )}}"><i class="fab fa-twitter"></i></a>
              <a target="_blank" href="https://www.pinterest.com/pin/create/button/?url={{ route('client.news.detail', $detail->id??'' )}}&media=moolez.vn/{{ $detail->avatar??''}}&description="><i class="fab fa-pinterest"></i></a>
              <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('client.news.detail', $detail->id??'' )}}"><i class="fab fa-facebook-square"></i></a>
            </div>
          </div>
          <hr>
        </div>
        <div class="col-lg-4 col-12">
          <h3 class="text-uppercase">mới nhất</h3>
          <!-- single news -->
          @forelse ($newests as $newest)
          <div class="more-news">
            <a href="{{ route('client.news.detail', $newest->id )}}">
              <div class="news-img">
                <img src="/{{ env('UPLOAD_DIR_ARTICLE') }}/{{ $newest->avatar }}" alt="">
              </div>
              <p class="news-title font-weight-bold">{{ $newest->name }}</p>
            </a>
          </div>
          @empty

          @endforelse
          <!-- single news -->
          {{-- <div class="more-news">
            <a href="#">
              <div class="news-img">
                <img src="/assets/client/img/news/news-2.png" alt="">
              </div>
              <p class="news-title font-weight-bold">Đẹp đa dụng đầy phong cách cùng bộ office bag từ Moolez</p>
            </a>
          </div>
          <!-- single news -->
          <div class="more-news">
            <a href="#">
              <div class="news-img">
                <img src="/assets/client/img/news/news-3.png" alt="">
              </div>
              <p class="news-title font-weight-bold">Biệt đãi ngọt ngào 699.000đ dành riêng cho quý ông</p>
            </a>
          </div> --}}
        </div>
      </div>
    </div>
  </section>
@endsection
