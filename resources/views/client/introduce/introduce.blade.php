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
          @forelse ($slideAbout as $image)
          <div class="item">
            <a href="#">
              <img src="/media/uploadImg/{{ $image->name??'' }}" alt="Slide">
            </a>
            <div class="banner-content position-absolute">
              <div class="banner-text"></div>
            </div>
          </div>
          @empty
              
          @endforelse                    
        </div>
        <div class="about-content">
          <h3 class="text-center">{!! $about->name??'' !!}</h3>
          <div class="under-line"></div>
          {!! $about->detail??'' !!}
          <div class="share mt-5">
            <span>Share: </span>
            <a class="mx-2" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=moolez.vn"><i class="fab fa-facebook-square fa-2x" style="color: #3b5998;"></i></a>
            <a class="mx-2" target="_blank" href="https://twitter.com/intent/tweet?url=https://moolez.vn/"><i class="fab fa-twitter fa-2x" style="color: #55acee;"></i></a>
            <a class="mx-2" target="_blank" href="https://www.pinterest.com/pin/create/button/?url=moolez.vn&media=https://www.inithtml.com/wp-content/themes/init-html-theme/screenshot.jpg&description="><i class="fab fa-pinterest fa-2x" style="color: #c71806;"></i></a>
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
            <img src="/media/uploadImg/{{ $ceo->name??'' }}" class="img-fluid" alt="CEO">
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
          </div>
        </div>
      </div>
    </div>
  </section>
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
