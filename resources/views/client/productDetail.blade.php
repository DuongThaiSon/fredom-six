@extends('client.layouts.main', ['title'=> 'Product Detail'])
@include('client.layouts.header')
@section('content')
    <section id="breadcrumb">
        <div class="container">
            <p>
                <a href="{{ route('client.home')}}" class="text-capitalize">home</a> &nbsp > &nbsp
                <a href="{{ route('client.product')}}" class="text-capitalize">portfolio</a> &nbsp > &nbsp
                <a href="{{ route('client.product')}}#product-{{ $category->slug??''}}" class="text-capitalize">{{ $category->name??''}}</a> &nbsp > &nbsp
                <a href="{{ route('client.product.detail', ['slug' => $product->slug??''])}}" class="text-capitalize font-weight-bold">{{ $product->name??''}}</a>
            </p>
        </div>
    </section>

    <section id="products-detail">
        <div class="container">
            <div class="project-wrap" data-aos="fade-right">
                <div id="products-detail-slide" class="owl-carousel owl-theme">
                    <div class="item project-slide_item--fix">
                        <div class="project-slide">
                            <div class="project-slide_bg"></div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <p class="project-slide_name">{{ $product->name??""}}</p>
                                    <div class="project-slide-name_line"></div>
                                </div>
                                <div class="col-lg-7">
                                    <img src="/media/images/articles/{{ $product->avatar??""}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="item project-slide_item--fix">
                        <div class="project-slide">
                            <div class="project-slide_bg-2"></div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <p class="project-slide_name">Hestia Finance</p>
                                    <div class="project-slide-name_line project-slide-name_line2"></div>
                                </div>
                                <div class="col-lg-7">
                                    <img src="{{ asset('assets/client')}}/images/macbook.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item project-slide_item--fix">
                        <div class="project-slide">
                            <div class="project-slide_bg-2"></div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <p class="project-slide_name">Hestia Finance</p>
                                    <div class="project-slide-name_line project-slide-name_line2"></div>
                                </div>
                                <div class="col-lg-7">
                                    <img src="{{ asset('assets/client')}}/images/macbook.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                {!! $product->detail??'' !!}
                <div id="customer-content-slide" class="owl-carousel owl-theme">
                        @forelse ($reports as $item)
                        <div class="customer-content position-relative" data-aos="fade-up" data-aos-duration="1500">
                            <div class="customer-info">
                                <div class="customer-info_detail">
                                    <p class="customer-name">{{ $item->name??''}}</p>
                                    <p class="customer-job">{!! $item->description??"" !!}</p>
                                </div>
                                <div class="customer-avatar">
                                    <img src="/media/images/articles/{{ $item->avatar??""}}" alt="">
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
    </section>
@endsection