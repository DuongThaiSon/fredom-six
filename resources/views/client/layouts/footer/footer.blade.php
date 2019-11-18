<!-- showroom -->
{{-- @include('client.layouts.footer.subscribe') --}}
<section id="showroom">
  <div class="container-fluid">
      <div class="row">
      <div class="col-md-6 showroom">
          <div class="col-lg-7 float-right">
          <h2 class="showroom-title text-uppercase">{{ $showroom->name }}</h2>
          <p>{!! $showroom->detail !!}</p>
          <a href="{{ route('client.showrooms.index') }}" class="learn text-uppercase">learn more</a>
          </div>
      </div>

      <div class="col-md-6 letter"
          style="background: url('{{ asset('assets/client') }}/img/banner.png') no-repeat center; background-size: cover;">
          <div class="col-lg-10">
          <h2 class="letter-title text-uppercase">sign up for newsletter</h2>
          <div class="position-relative">
            <form action="" method="POST" enctype="multipart/form-data" >
              <input type="email" name="" id="" placeholder="Your email address">
              <button type="submit" class="btn-sub text-uppercase">subscribe</button>
            </form>
          </div>
          </div>
      </div>
      </div>
  </div>
</section>
      <!-- Footer -->
<section id="main-footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-md-12 pt-5 mb-3">
        <img class="mb-5" src="{{ asset('assets/client') }}/img/head-logo.png" alt="" />
        {!! $office->detail !!}
      {{-- <p class="mt-5">
            {!! $copyright->detail !!}
        </p>  --}}
      </div>
      <div class="col-lg-4 col-md-12 policy pl-5">
        @foreach ($menuOne as $item)
          <a href="#">{{ $item->name }}</a>
        @endforeach
      </div>
      <div class="col-lg-3 col-md-12 mt-3 pl-5" style="line-height: 2;">
        <div class="footer-icon d-flex mt-5 mb-5">
          <a class="mr-2" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-2x"></i></a>
          <a class="mr-2" target="_blank" href="https://www.instagram.com/moolezvn/"><i class="fab fa-pinterest fa-2x"></i></a>
          <a target="_blank" href="https://www.facebook.com/moolezvietnam/"><i class="fab fa-facebook fa-2x"></i></a>
        </div>
        @foreach ($menuTwo as $item)
        <a href="{{ $item->link }}">{{ $item->name }}</a>
        @endforeach
        <img class="mt-5" src="{{ asset('assets/client') }}/img/bo-cong-thuong.png" alt="" />
      </div>
    </div>
    <div class="row  mt-4" style="color: #a3a3a3; font-size: 13px;">
      <div class="col-4 pt-3">{!! $customer->detail !!}</div>
      <div class="col-5 pt-3">{!! $workTime->detail !!}</div>
      <div class="col-3 mb-5">
        <a href=""><img src="{{ asset('assets/client') }}/img/chart.png" alt=""></a>
      </div>
    </div>
  </div>
</section>