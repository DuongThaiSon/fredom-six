@extends('client.layouts.main', ['title'=> 'Customer'])
@include('client.layouts.header')
@section('content')
    <section id="breadcrumb">
        <div class="container">
            <p>
                <a href="{{ route('client.home')}}" class="text-capitalize">home</a> &nbsp > &nbsp
                <a href="{{ route('client.customer')}}" class="text-capitalize font-weight-bold">customer</a>
            </p>
        </div>
    </section>

    <section id="partner">
        <div class="container">
            <h1 class="text-capitalize">{{ $gallery->name ??''}}</h1>
            <div class="customer-box">
                <ul>
                    @forelse ($gallery->images->sortByDesc('order') as $item)
                        <li class="logo-list">
                            <img class="image-back" src="/media/images/galleries/{{ $item->name??''}}" alt="">
                        </li>
                    @empty
                        
                    @endforelse
                    
                </ul>
            </div>
        </div>
    </section>

    <section id="customer" data-aos="fade-up" data-aos-duration="1500">
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
    </section>
@endsection