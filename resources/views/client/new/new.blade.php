
@extends('client.layouts.main', ['title' => __('Tin tức')])
@section('content')
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
            style="background:url('/{{ env('UPLOAD_DIR_GALLERY') }}/{{ $image->name }}'); background-size: cover; height: 600px;">
            <div class="container">
              <div class="row">
                <div class="col-6"></div>
                <div class="col-md-6 d-none d-md-block" style="padding-left: 70px;">
                
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
      @forelse ($category->articles as $new)
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
            <a href="{{ route('client.news.detail', ['slug_view' => $new->slug, 'slug_cat' => $category->slug]) }}" class="news-detail-link">Đọc tiếp <i class="fas fa-chevron-circle-right"></i></a>
          </div>
        </div>
      </div>

      @empty
          Không có tin tức nào.
      @endforelse

      <!-- pagination -->
      <div class="row mb-0 justify-content-end">

        {{-- {{ $news->links() }} --}}
      </div>
    </div>
    </div>
  </section>
@endsection
