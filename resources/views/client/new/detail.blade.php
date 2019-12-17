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
              <a href="{{ route('client.news.category', ['slug_cat' => $category->slug])}}"><span class="font-italic" style="margin-left: 25px; font-size: 18px;">Quay lại</span></a>
            </div>
            <div class="time">
              <i class="fas fa-clock"></i>
              <span>{{ $article->updated_at ?? ''}}</span>
            </div>
          </div>
          <div class="detail-content">
            <h2 class="detail-title font-weight-bold">{{ $article->name??'' }}</h2>
            <div class="text-justify">{!! $article->detail ??'' !!}</div>
          </div>
          <div class="detail-bottom d-flex justify-content-between">
            <div class="tag">
              {{-- <span class="text-uppercase font-weight-bold">tags: </span>
              <a href="#">new, </a>
              <a href="#">bag, </a>
              <a href="#">high fashion</a> --}}
            </div>
            <div class="share">
              <span class="share-link text-uppercase font-weight-bold">share this: </span>
              <a target="_blank" href="https://twitter.com/intent/tweet?text={{ route('client.news.detail',['slug_view' => $article->slug, 'slug_cat' => $category->slug] )}}"><i class="fab fa-twitter"></i></a>
              <a target="_blank" href="https://www.pinterest.com/pin/create/button/?url={{ route('client.news.detail',['slug_view' => $article->slug, 'slug_cat' => $category->slug] )}}&media=moolez.vn/{{ $article->avatar??''}}&description="><i class="fab fa-pinterest"></i></a>
              <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('client.news.detail',['slug_view' => $article->slug, 'slug_cat' => $category->slug] )}}"><i class="fab fa-facebook-square"></i></a>
            </div>
          </div>
          <hr>
        </div>
        <div class="col-lg-4 col-12">
          <h3 class="text-uppercase">mới nhất</h3>
          <!-- single news -->
          @forelse ($articles as $item)
          <div class="more-news">
            <a href="{{ route('client.news.detail', ['slug_view' => $item->slug, 'slug_cat' => $category->slug])}}">
              <div class="news-img">
                <img src="/{{ env('UPLOAD_DIR_ARTICLE') }}/{{ $item->avatar }}" alt="{{ $item->avatar }}">
              </div>
              <p class="news-title font-weight-bold">{{ $item->name }}</p>
            </a>
          </div>
          @empty

          @endforelse
        </div>
      </div>
    </div>
  </section>
@endsection
