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
            style="background:url('{{ $image->name }}'); background-size: cover; height: 900px;">
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
                    <a href="#" class="btn text-uppercase">news arrivals</a>
                  </div>
                </div>
              </div>
            </div>
          </div>            
        @empty
        @endforelse
        {{-- <div class="carousel-item "
          style="background:url('/assets/client/img/banner.png'); background-size: cover; height: 900px;">
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
                  <p>
                    Use this text to share information about your brand with your
                    customers. Describe a product, share annoucement, or welcome
                    customers to your store
                  </p>
                  <a href="#" class="btn text-uppercase">news arrivals</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item "
          style="background:url('/assets/client/img/banner.png'); background-size: cover; height: 900px;">
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
                  <p>
                    Use this text to share information about your brand with your
                    customers. Describe a product, share annoucement, or welcome
                    customers to your store
                  </p>
                  <a href="#" class="btn text-uppercase">news arrivals</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item "
          style="background:url('/assets/client/img/banner.png'); background-size: cover; height: 900px;">
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
                  <p>
                    Use this text to share information about your brand with your
                    customers. Describe a product, share annoucement, or welcome
                    customers to your store
                  </p>
                  <a href="#" class="btn text-uppercase">news arrivals</a>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
        
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
            <img src="{{ $new->avatar }}" alt="{!! $new->name !!}">
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="news-title">
            <h6 class="font-weight-bold">{!! $new->name !!}</h6>
            <div class="time">
              <i class="fas fa-clock"></i>
              <span>{{ $new->updated_at}}</span>
            </div>
            <p class="title-detail">{!! $new->description !!}​</p>
            <a href="{{ route('client.news.detail', $new->id) }}" class="news-detail-link">Đọc tiếp <i class="fas fa-chevron-circle-right"></i></a>
          </div>
        </div>
      </div>
          
      @empty
          Không có tin tức nào.
      @endforelse
      <!-- news-2 -->
      {{-- <div class="row">
        <div class="col-12 col-lg-6">
          <div class="news-img">
            <img src="/assets/client/img/news/news-2.png" alt="">
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="news-title">
            <h6 class="font-weight-bold">Đẹp đa dụng đầy phong cách cùng bộ office bag từ Moolez</h6>
            <div class="time">
              <i class="fas fa-clock"></i>
              <span>Thứ tư, tháng 9, 2019</span>
            </div>
            <p class="title-detail">Lấy cảm hứng từ hình ảnh những phụ nữ văn phòng độc lập và hiện đại, Tháng 7 này
              Moolez đặc biệt gửi tặng đến các nữ khách hàng yêu quý của mình một chiếc Office bag vô cùng thời trang và
              đa dụng. Office bag tập trung vào những đường nét tối giản mà tinh tế, không khoa trương, không cầu kì mà
              vẫn khiến người mang nó nổi bật theo một cách rất riêng.
            </p>
            <a href="#" class="news-detail-link">Đọc tiếp <i class="fas fa-chevron-circle-right"></i></a>
          </div>
        </div>
      </div>
      <!-- news-3 -->
      <div class="row">
        <div class="col-12 col-md-6">
          <div class="news-img">
            <img src="/assets/client/img/news/news-3.png" alt="">
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="news-title">
            <h6 class="font-weight-bold">Biệt đãi ngọt ngào 699.000đ dành riêng cho quý ông</h6>
            <div class="time">
              <i class="fas fa-clock"></i>
              <span>Thứ tư, tháng 9, 2019</span>
            </div>
            <p class="title-detail">Với mong muốn ngày càng nhiều quý ông Việt được sở hữu những sản phẩm đồ da được làm
              từ DA THẬT mang tinh thần Australia, MOOLEZ dành tặng ƯU ĐÃI NGỌT NGÀO duy nhất cho Phái Mạnh. Với mong
              muốn ngày càng nhiều quý ông Việt được sở hữu những sản phẩm đồ da được làm từ DA THẬT mang tinh thần
              Australia, MOOLEZ dành tặng ƯU ĐÃI NGỌT NGÀO duy nhất cho Phái Mạnh.
              Với mong muốn ngày càng nhiều quý ông Việt được sở hữu những sản phẩm đồ da được làm từ DA THẬT mang tinh
              thần Australia, MOOLEZ dành tặng ƯU ĐÃI NGỌT NGÀO duy nhất cho Phái Mạnh​</p>
            <a href="#" class="news-detail-link">Đọc tiếp <i class="fas fa-chevron-circle-right"></i></a>
          </div>
        </div>
      </div> --}}
      <!-- pagination -->
      <div class="row mb-0 justify-content-end">
        {{-- <nav>
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link shadow-none" href="#" aria-label="Previous">
                <span aria-hidden="true"><i class="fas fa-chevron-left mr-2"></i> Previous</span>
              </a>
            </li>
            <li class="page-item active"><a class="page-link shadow-none" href="#">1</a></li>
            <li class="page-item"><a class="page-link shadow-none" href="#">2</a></li>
            <li class="page-item"><a class="page-link shadow-none" href="#">3</a></li>
            <li class="page-item"><a class="page-link shadow-none" href="#">...</a></li>
            <li class="page-item"><a class="page-link shadow-none" href="#">9</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">Next <i class="fas fa-chevron-right ml-2"></i></span>
              </a>
            </li>
          </ul>
        </nav> --}}
        {{ $news->links() }}
      </div>
    </div>
    </div>
  </section>
@endsection