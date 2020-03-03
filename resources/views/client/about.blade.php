@extends('client.layouts.main', ['title'=> 'About'])
@section('content')
@include('client.layouts.header')
    <section id="breadcrumb">
        <div class="container">
            <p>
                <a href="{{ route('client.home')}}" class="text-capitalize">home</a> &nbsp > &nbsp
                <a href="{{ route('client.about')}}" class="text-capitalize font-weight-bold">about us</a>
            </p>
        </div>
    </section>

    <section id="about-us" data-aos="fade-up" data-aos-duration="1500">
        <div class="about-us_bg"></div>
        <div class="container">
            <div class="about-pic">
                <img src="/media/images/articles/{{ $about->avatar??'' }}" alt="">
            </div>
            <div class="about-text">
                <p>{{ $about->name??''}}</p>
                {!! $about->detail??'' !!}
            </div>
        </div>
    </section>

    <section id="vision" data-aos="fade-up" data-aos-duration="1500">
        <h3 class="title-section">{{ $visionMissionCat->name??''}}</h3>
        <div class="col-lg-3 col-md-8 m0-auto text-center">
            {!! $visionMissionCat->description??''!!}
        </div>
        <div class="load-icon">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="vision-bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="vision-pic" data-aos="fade-right" data-aos-duration="1500">
                        <img src="/media/images/articles/{{ $visionMissionCat->avatar??''}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="vision-text" data-aos="fade-left" data-aos-duration="1500">
                        @forelse ($visionMissions as $item)
                            <h1 class="text-uppercase">{{$item->name??""}}</h1>
                            {!! $item->detail??''!!}
                        @empty
                            
                        @endforelse
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="core" data-aos="fade-up" data-aos-duration="1500">
        <h3 class="title-section text-capitalize">{{ $coreValueCat->name??''}}</h3>
        <div class="col-lg-3 m0-auto text-center">
            <span class="font-weight-bold">{!! $coreValueCat->description??""!!}</span>
        </div>
        <div class="load-icon">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="core-bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="core-text" data-aos="fade-right" data-aos-duration="1500">
                        {!! $coreValue->detail??''!!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="core-pic" data-aos="fade-left" data-aos-duration="1500">
                        <img src="/media/images/articles/{{ $coreValue->avatar??''}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="customer" data-aos="fade-up" data-aos-duration="1500">
        <h1 class="title-section">{!! $reportCat->detail??''!!}</h1>
        <span class="text-center">{!! $reportCat->description??""!!}</span>
        <div class="load-icon">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="customer-content position-relative" data-aos="fade-right" data-aos-duration="1500">
            <div class="container">
                <div class="owl-carousel owl-theme customer-slide">
                    @forelse ($reports as $item)
                        <div class="item">
                            <div class="customer-info">
                                <div class="customer-info_detail">
                                    <p class="customer-name">{{ $item->name??''}}</p>
                                    <span class="customer-job">{!! $item->description??"" !!}</span>
                                </div>
                                <div class="customer-avatar">
                                    <img src="/media/images/articles/{{ $item->avatar??''}}" alt="">
                                </div>
                                <div class="customer-quote">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                            <div class="customer-text customer-job">
                                {!! $item->detail??'' !!}
                            </div>
                        </div>
                    @empty
                        
                    @endforelse
                    
                </div>
            </div>
        </div>
    </section>
@endsection