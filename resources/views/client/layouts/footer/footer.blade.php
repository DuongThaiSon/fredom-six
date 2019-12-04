<!-- showroom -->
{{-- @include('client.layouts.footer.subscribe') --}}
<section id="showroom">
  <div class="container-fluid">
      <div class="row">
      <div class="col-md-6 showroom">
          <div class="col-lg-7 float-right">
          <h2 class="showroom-title text-uppercase">{{ $showroom->name }}</h2>
          <p>{!! $showroom->detail !!}</p>
          <a href="{{ route('client.showrooms.index') }}" class="learn text-uppercase"><b>learn more</b></a>
          </div>
      </div>

      <div class="col-md-6 letter"
          style="background: url('{{ asset('assets/client') }}/img/banner.png') no-repeat center; background-size: cover;">
          <div class="col-lg-10 showroom-content">
          <h2 class="letter-title text-uppercase">sign up for newsletter</h2>
          <div class="position-relative">
            <form action="{{ route('client.subscribe') }}" method="POST" enctype="multipart/form-data" >
              @csrf
              <input type="email" name="email" id="" required placeholder="Your email address">
              <button type="submit" class="btn-sub text-uppercase">subscribe</button>
              <button class="btn-sub1 d-lg-none text-uppercase">subscribe</button>
            </form>
          </div>
          </div>
      </div>
      </div>
  </div>
</section>
      <!-- Footer -->
<section id="main-footer">
  {{-- <div class="chart1 col-3 mb-5 d-lg-none">
      <a href=""><img src="{{ asset('assets/client') }}/img/chart.png" alt="chart.png"></a>
    </div> --}}
  
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-md-12 pt-5 mb-3">
        <div class="footer-logo">
          {{-- <img class="mb-5" src="{{ asset('assets/client') }}/img/head-logo.png" alt="head-logo.png" /> --}}
          {!! $logo->detail ?? '' !!}
        </div>
        {!! $office->detail ?? '' !!}
      {{-- <p class="mt-5">
            {!! $copyright->detail !!}
        </p>  --}}
      </div>
      <div class="col-lg-4 col-md-12 policy pl-5">
        @foreach ($menuOne as $item)
          <a href="#">{{ $item->name }}</a>
        @endforeach
      </div>
      <div class="col-lg-3 col-md-12 mt-3 pl-lg-5" style="line-height: 2;">
        <div class="footer-icon d-flex mt-5 mb-5">
          <a class="mr-2" target="_blank" href="{{ $setting->company_youtube_url ?? ''}}"><i class="fab fa-youtube-square fa-2x"></i></a>
          <a class="mr-2" target="_blank" href="{{ $setting->company_instagram_url ?? ''}}"><i class="fab fa-instagram fa-2x"></i></a>
          <a target="_blank" href="{{ $setting->company_facebook_url ?? ''}}"><i class="fab fa-facebook fa-2x"></i></a>
        </div>
        @foreach ($menuTwo as $item)
        <a href="{{ $item->link }}">{{ $item->name }}</a>
        @endforeach
        <div class="certification">
          {{-- <img class="mt-5" src="{{ asset('assets/client') }}/img/bo-cong-thuong.png" alt="bo-cong-thuong" /> --}}
          {!! ($bct->detail) ?? '' !!}
        </div>
      </div>
    </div>
    <div class="row  mt-4" style="color: #a3a3a3; font-size: 13px;">
      <div class="col-lg-4 col-12 pt-3">{!! strip_tags($customer->detail) ?? '' !!}</div>
      <div class="col-lg-5 col-12 pt-3">{!! strip_tags($workTime->detail) ?? '' !!}</div>
      {{-- <div class="chart col-lg-3 mb-5">
        <a href=""><img src="{{ asset('assets/client') }}/img/chart.png" alt=""></a>
      </div> --}}
    </div>
  </div>
</section>
