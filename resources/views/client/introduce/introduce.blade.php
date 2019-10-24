@extends('client.layouts.main', ['title' => __('Intro')])
@section('content')
  <div class="bread-crumb">
    <div class="row" style="background: #ebebeb;">
      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a class="active" href="#">Giới thiệu</a></li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- about-detail -->
  <section id="about-detail">
    <div class="container">
      <div class="about-slide">
        <div id="about-slide" class="owl-carousel owl-theme">
          <div class="item">
            <a href="#">
              <img src="/assets/client/img/datran.png" alt="">
            </a>
            <div class="banner-content position-absolute">
              <div class="banner-text"></div>
            </div>
          </div>
          <div class="item">
            <a href="#">
              <img src="/assets/client/img/datran.png" alt="">
            </a>
            <div class="banner-content">
              <div class="banner-text"></div>
            </div>
          </div>
          <div class="item">
            <a href="#">
              <img src="/assets/client/img/datran.png" alt="">
            </a>
            <div class="banner-content">
              <div class="banner-text"></div>
            </div>
          </div>
        </div>
        <div class="about-content">
          <h3 class="text-center">{!! $about->name !!}</h3>
          <div class="under-line"></div>
          {!! $about->detail !!}
          <div class="share mt-5">
            <span>Share: </span>
            <a class="mx-2" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=moolez.vn"><i class="fab fa-facebook-square fa-2x" style="color: #3b5998;"></i></a>
            <a class="mx-2" target="_blank" href="https://twitter.com/intent/tweet?url=https://moolez.vn/"><i class="fab fa-twitter fa-2x" style="color: #55acee;"></i></a>
            <a class="mx-2" target="_blank" href="https://www.pinterest.com/pin/create/button/?url=moolez.vn&media=https://www.inithtml.com/wp-content/themes/init-html-theme/screenshot.jpg&description=Init%20HTML%20%E2%80%93%20Kh%E1%BB%9Fi%20%C4%91%E1%BA%A7u%20d%E1%BB%B1%20%C3%A1n%20Web"><i class="fab fa-pinterest fa-2x" style="color: #c71806;"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </section>
  <!-- about-2 -->
  <section id="about-2">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-12">
          <div class="about-img">
            <img src="/assets/client/img/ceo.png" class="img-fluid" alt="">
            <div class="about-text">
              <p class="ceo-name text-center m-0">Mrs. Thái Hương Lan</p>
              <p class="text-center m-0 font-weight-bold text-dark" style="font-size: 13px;">CEO & Founder Moolez</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-12 ours-work">
          <h4 class="text-uppercase" style="font-size: 36px; color: #ffffff">our work</h4>
          <div class="under-line-white"></div>
          <div class="ours-work-detail">
            <!-- detail-1 -->
            {{-- @forelse ($ourworks as $ourwork)
            <div class="detail-{{ $ourwork->id}} mb-3">
              <a href="#detail-{{ $ourwork->id}}" class="collapsed text-uppercase active" data-target="#detail-{{ $ourwork->id }}"
                data-toggle="collapse">
                {!! $ourwork->name !!}
              </a>
              <div class="collapse mt-3" id="detail-{{ $ourwork->id}}">
                {!! $ourwork->detail !!}
              </div>
            </div>
            @empty
                
            @endforelse --}}
            <div id="accordion">
                @forelse ($ourworks as $ourwork)
                <div class="button font-weight-bold {{ $ourwork->id == 1? 'active' :''}}" role="button"
                style="cursor: pointer; margin-top: 20px;">
                {!! $ourwork->name !!}
              </div>
              <div class="slide mt-3">
                  {!! $ourwork->detail !!}
                </div>
                @empty
                    
                @endforelse
                  
            <!-- detail-2 -->
            {{-- <div class="detail-2 mb-3">
              <a href="#detail-2" class="collapsed text-uppercase" data-target="#detail-2" data-toggle="collapse">
                sứ mệnh
              </a>
              <div class="collapse mt-3" id="detail-2">
              </div>
            </div>
            <!-- detail-3 -->
            <div class="detail-3 mb-3">
              <a href="#detail-3" class="collapsed text-uppercase" data-target="#detail-3" data-toggle="collapse">
                tầm nhìn
              </a>
              <div class="collapse mt-3" id="detail-3">
              </div>
            </div>
            <!-- detail-4 -->
            <div class="detail-4 mb-3">
              <a href="#detail-4" class="collapsed text-uppercase" data-target="#detail-4" data-toggle="collapse">
                Giá trị cốt lõi: Văn hóa doanh nghiệp + năng lực
              </a>
              <div class="collapse mt-3" id="detail-4">
                <p>Đối với sản phẩm mang thương hiệu Moolez, khách hàng luôn được sở hữu những sản phẩm chất lượng
                  đẳng
                  cấp nhất, từ nguyên liệu da nhập khẩu của các nước nổi tiếng như Italia đến linh kiện,
                  phụ kiện đạt tiêu chuẩn châu Âu với kiểu dáng thời thượng, dẫn đầu xu hướng.</p>
                <p>
                  Bên cạnh đó, khách hàng còn được hưởng nhiều giá trị gia tăng,và dịch vụ khác biệt mà các hãng khác
                  chưa hoặc không có.
                </p>
              </div>
            </div>
            <!-- detail-5 -->
            <div class="detail-5">
              <a href="#detail-5" class="collapsed text-uppercase" data-target="#detail-5" data-toggle="collapse">
                Thông điệp từ người đứng đầu
              </a>
              <div class="collapse  mt-3" id="detail-5">
                <p>Đối với sản phẩm mang thương hiệu Moolez, khách hàng luôn được sở hữu những sản phẩm chất lượng
                  đẳng
                  cấp nhất, từ nguyên liệu da nhập khẩu của các nước nổi tiếng như Italia đến linh kiện,
                  phụ kiện đạt tiêu chuẩn châu Âu với kiểu dáng thời thượng, dẫn đầu xu hướng.</p>
                <p>
                  Bên cạnh đó, khách hàng còn được hưởng nhiều giá trị gia tăng,và dịch vụ khác biệt mà các hãng khác
                  chưa hoặc không có.
                </p>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- showroom -->
  

@endsection
  <script src="/assets/client/js/jquery.min.js"></script>
  <script src="/assets/client/js/owl.carousel.js"></script>
  <script>
    ///----- Auto-Close Accordion
    $(document).ready(function () {
      //--- initial state of elements
      $('.slide:not(:first)').hide()
      //----- click function
      $("#accordion").find("div[role|='button']").click(function () { //---- tabs or buttons
        //---- active class
        $("#accordion").find("div[role|='button']").removeClass('active');
        $('.slide').slideUp('fast');
        var selected = $(this).next('.slide');
        if (selected.is(":hidden")) {
          $(this).next('.slide').slideDown('fast');
          $(this).toggleClass('active');
        }
      });
    });
  </script>
  <script src="/assets/client/js/script.js"></script>
