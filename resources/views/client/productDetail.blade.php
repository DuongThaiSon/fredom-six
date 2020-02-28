@extends('client.layouts.main', ['title'=> 'Product Detail'])
@include('client.layouts.header')
@section('content')
    <section id="breadcrumb">
        <div class="container">
            <p>
                <a href="Home.html" class="text-capitalize">home</a> &nbsp > &nbsp
                <a href="Product List.html" class="text-capitalize">portfolio</a> &nbsp > &nbsp
                <a href="" class="text-capitalize">branding</a> &nbsp > &nbsp
                <a href="Products Detail.html" class="text-capitalize font-weight-bold">Passion Investment</a>
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
                                    <p class="project-slide_name">Happy Mokeyz Spa</p>
                                    <div class="project-slide-name_line"></div>
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
                    </div>
                </div>
                <p class="m-0">
                    We work closely with our clients to research, build on expertise and experience to provide solutions
                    to
                    increase potential customers, successful sales rates based on technology and useful tools that the
                    Internet bring. Especially we are always aiming at the market share of mobile phones which is now
                    the
                    market leader in the number of devices used in the world. We work closely with our clients to
                    research,
                    build on expertise and experience to provide solutions to increase potential customers, successful
                    sales
                    rates based on technology and useful tools that the Internet bring. Especially we are always aiming
                    at
                    the market share of mobile phones which is now the market leader in the number of devices used in
                    the
                    world.
                </p>
                <div class="products">
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <a href="">
                                <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <a href="">
                                <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <a href="">
                                <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <a href="">
                                <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <a href="">
                                <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <a href="">
                                <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <p>We work closely with our clients to research, build on expertise and experience to provide solutions
                    to
                    increase potential customers, successful sales rates based on technology and useful tools that the
                    Internet bring. Especially we are always aiming at the market share of mobile phones which is now
                    the
                    market leader in the number of devices used in the world. We work closely with our clients to
                    research,
                    build on expertise and experience to provide solutions to increase potential customers, successful
                    sales
                    rates based on technology and useful tools that the Internet bring. Especially we are always aiming
                    at
                    the market share of mobile phones which is now the market leader in the number of devices used in
                    the
                    world.We work closely with our clients to research, build on expertise and experience to provide
                    solutions to increase potential customers, successful sales rates based on technology and useful
                    tools
                    that the Internet bring. Especially we are always aiming at the market share of mobile phones which
                    is
                    now the market leader in the number of devices used in the world. We work closely with our clients
                    to
                    research, build on expertise and experience to provide solutions to increase potential customers,
                    successful sales rates based on technology and useful tools that the Internet bring. Especially we
                    are
                    always aiming at the market share of mobile phones which is now the market leader in the number of
                    devices used in the world.
                </p>
                <div class="customer-content position-relative" data-aos="fade-up" data-aos-duration="1500">
                    <div class="customer-info">
                        <div class="customer-info_detail">
                            <p class="customer-name">Mr Peter Pan</p>
                            <p class="customer-job">Hutong, CEO</p>
                        </div>
                        <div class="customer-avatar">
                            <img src="{{ asset('assets/client')}}/images/user.jpg" alt="">
                        </div>
                        <div class="customer-quote">
                            <i class="fas fa-quote-right"></i>
                        </div>
                    </div>
                    <div class="customer-text customer-job">
                        <p>I received support from the social media site and soon WP Service also have an
                            agreement
                            with them for the preparation of the web site. They delivered the job at the time we
                            set
                            and I found answers to every question in my mind. I would definitely recommend it.
                        </p>
                    </div>
                </div>
            </div>
    </section>
@endsection