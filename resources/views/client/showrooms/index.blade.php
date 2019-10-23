@extends('client.layouts.main', ['title' => __('Showroom')])
@section('content')
  <!-- contact -->
  <section id="contact">
    <div class="container">
      <div class="showrooms">
        <div class="row">
          <div class="line-bold col-lg-5 col-md-3 col-2"></div>
          <div class="col-lg-2 col-md-6 col-8 align-self-center font-weight-bold">
            <p class="text-uppercase m-0 text-center" style="font-size: 24px;">miền bắc</p>
          </div>
          <div class="line-bold col-lg-5 col-md-3 col-2"></div>
        </div>
        <div class="row mt-5">
          <!-- showroom -->
          @foreach ($showroommb as $showmb)
           <div class="col-12 col-lg-4">
            <div class="showroom">
              <p class="showroom-title">{{ $showmb->name }}</p>
              <div class="showroom-img">
                <img src="{{ asset('/media/showroom') }}/{{ $showmb->avatar }}" alt="">
              </div>
              <div class="showroom-detail">
                <p class="showroom-detail-address"><i class="fas fa-map-marker-alt"></i> {{ $showmb->address }}</p>
                <p><i class="fas fa-phone-alt"></i> {{ $showmb->email }}</p>
                <p><i class="fas fa-envelope"></i> {{ $showmb->phone }}</p>
              </div>
              <div class="group-button d-flex justify-content-end">
                <a href="#" class="btn">Liên hệ</a>
                <a href="#" class="btn">Chỉ đường</a>
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </div>
      <div class="showrooms">
        <div class="row">
          <div class="line-bold col-lg-5 col-md-3 col-2"></div>
          <div class="col-lg-2 col-md-6 col-8 align-self-center font-weight-bold">
            <p class="text-uppercase m-0 text-center" style="font-size: 24px;">miền trung</p>
          </div>
          <div class="line-bold col-lg-5 col-md-3 col-2"></div>
        </div>
        <div class="row mt-5">
          <!-- showroom -->
          @foreach ($showroommt as $showmt)
          <div class="col-12 col-lg-4">
            <div class="showroom">
              <p class="showroom-title">{{ $showmt->name }}</p>
              <div class="showroom-img">
                <img src="{{ asset('/media/showroom') }}/{{ $showmt->avatar }}" alt="">
              </div>
              <div class="showroom-detail">
                <p><i class="fas fa-map-marker-alt"></i> {{ $showmt->address }}</p>
                <p><i class="fas fa-phone-alt"></i> {{ $showmt->email }}</p>
                <p><i class="fas fa-envelope"></i> {{ $showmt->phone }}</p>
              </div>
              <div class="group-button d-flex justify-content-end">
                <a href="#" class="btn">Liên hệ</a>
                <a href="#" class="btn">Chỉ đường</a>
              </div>
            </div>
          </div>
          @endforeach
      
        </div>
      </div>
      <div class="showrooms">
        <div class="row">
          <div class="line-bold col-lg-5 col-md-3 col-2"></div>
          <div class="col-lg-2 col-md-6 col-8 align-self-center font-weight-bold">
            <p class="text-uppercase m-0 text-center" style="font-size: 24px;">miền nam</p>
          </div>
          <div class="line-bold col-lg-5 col-md-3 col-2"></div>
        </div>
        <div class="row mt-5">
          <!-- showroom -->
          @foreach ($showroommn as $showmn)
          <div class="col-12 col-lg-4">
            <div class="showroom">
              <p class="showroom-title">{{ $showmn->name }}</p>
              <div class="showroom-img">
                <img src="{{ asset('/media/showroom') }}/{{ $showmn->avatar }}" alt="">
              </div>
              <div class="showroom-detail">
                <p><i class="fas fa-map-marker-alt"></i> {{ $showmn->address }}</p>
                <p><i class="fas fa-phone-alt"></i> {{ $showmn->email }}</p>
                <p><i class="fas fa-envelope"></i> {{ $showmn->phone }}</p>
              </div>
              <div class="group-button d-flex justify-content-end">
                <a href="#" class="btn">Liên hệ</a>
                <a href="#" class="btn">Chỉ đường</a>
              </div>
            </div>
          </div>
          @endforeach
          
          
        </div>
      </div>
    </div>
  </section>
@endsection