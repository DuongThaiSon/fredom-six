@extends('client.layouts.main', ['title'=> 'Product'])
@include('client.layouts.header')
@section('content')
    <section id="breadcrumb">
        <div class="container">
            <p>
                <a href="Home.html" class="text-capitalize">home</a> &nbsp > &nbsp
                <a href="Service.html" class="text-capitalize">services</a> &nbsp > &nbsp
                <a href="Product List.html" class="text-capitalize font-weight-bold">branding</a>
            </p>
        </div>
    </section>

    <section id="products-list">
        <div class="container">
            <div class="view-all_pc">
                <ul class="view-all nav">
                    <li class="js-changebg nav-item">
                        <a class="text-uppercase nav-link" data-toggle="tab" href="#product-branding">branding</a>
                    </li>
                    <li class="js-changebg nav-item">
                        <a class="text-uppercase nav-link" data-toggle="tab" href="#product-website">website</a>
                    </li>
                    <li class="js-changebg nav-item main-bg_color">
                        <a class="text-uppercase active" data-toggle="tab" href="#product-view-all">view all</a>
                    </li>
                    <li class="js-changebg nav-item">
                        <a class="text-uppercase nav-link" data-toggle="tab" href="#product-mobile">mobile app</a>
                    </li>
                    <li class="js-changebg nav-item">
                        <a class="text-uppercase nav-link" data-toggle="tab" href="#product-software">software</a>
                    </li>
                </ul>
            </div>
            <div class="view-all_mobile d-none">
                <nav class="navbar">
                    <ul class="view-all nav navbar-nav">
                        <li class="js-changebg-2 nav-item main-bg_color">
                            <a class="text-uppercase nav-link" data-toggle="tab" href="#product-view-all">view all</a>
                        </li>
                    </ul>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#collapsibleNavbar">
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="view-all nav navbar-nav">
                            <li class="js-changebg-2 nav-item">
                                <a class="text-uppercase nav-link" data-toggle="tab"
                                    href="#product-branding">branding</a>
                            </li>
                            <li class="js-changebg-2 nav-item">
                                <a class="text-uppercase nav-link" data-toggle="tab" href="#product-website">website</a>
                            </li>
                            <li class="js-changebg nav-item">
                                <a class="text-uppercase nav-link" data-toggle="tab" href="#product-mobile">mobile
                                    app</a>
                            </li>
                            <li class="js-changebg-2 nav-item">
                                <a class="text-uppercase nav-link" data-toggle="tab"
                                    href="#product-software">software</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="tab-content">
                <div id="product-branding" class="tab-pane fade">
                    <h1 class="text-capitalize">branding</h1>
                    <p class="m-0">We work closely with our clients to research, build on expertise and experience
                        to
                        provide
                        solutions to
                        increase potential customers, successful sales rates based on technology and useful tools
                        that
                        the
                        Internet bring. Especially we are always aiming at the market share of mobile phones which
                        is
                        now the
                        market leader in the number of devices used in the world.
                    </p>
                    <ul class="pagination">
                        <li><a href="">Prev</a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href="">5</a></li>
                        <li><a href="">Next</a></li>
                    </ul>
                    <div class="clear-fix"></div>
                    <div class="products">
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <ul class="pagination m-0">
                        <li><a href="">Prev</a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href="">5</a></li>
                        <li><a href="">Next</a></li>
                    </ul>
                </div>

                <div id="product-website" class="tab-pane fade">
                    <h1 class="text-capitalize">website</h1>
                    <p class="m-0">We work closely with our clients to research, build on expertise and experience
                        to
                        provide
                        solutions to
                        increase potential customers, successful sales rates based on technology and useful tools
                        that
                        the
                        Internet bring. Especially we are always aiming at the market share of mobile phones which
                        is
                        now the
                        market leader in the number of devices used in the world.
                    </p>
                    <ul class="pagination">
                        <li><a href="">Prev</a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href="">5</a></li>
                        <li><a href="">Next</a></li>
                    </ul>
                    <div class="clear-fix"></div>
                    <div class="products">
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <ul class="pagination m-0">
                        <li><a href="">Prev</a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href="">5</a></li>
                        <li><a href="">Next</a></li>
                    </ul>
                </div>

                <div id="product-view-all" class="tab-pane fade active show">
                    <h1 class="text-capitalize">view all</h1>
                    <p class="m-0">We work closely with our clients to research, build on expertise and experience
                        to
                        provide
                        solutions to
                        increase potential customers, successful sales rates based on technology and useful tools
                        that
                        the
                        Internet bring. Especially we are always aiming at the market share of mobile phones which
                        is
                        now the
                        market leader in the number of devices used in the world.
                    </p>
                    <ul class="pagination">
                        <li><a href="">Prev</a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href="">5</a></li>
                        <li><a href="">Next</a></li>
                    </ul>
                    <div class="clear-fix"></div>
                    <div class="products">
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <ul class="pagination m-0">
                        <li><a href="">Prev</a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href="">5</a></li>
                        <li><a href="">Next</a></li>
                    </ul>
                </div>

                <div id="product-mobile" class="tab-pane fade">
                    <h1 class="text-capitalize">mobile app</h1>
                    <p class="m-0">We work closely with our clients to research, build on expertise and experience
                        to
                        provide
                        solutions to
                        increase potential customers, successful sales rates based on technology and useful tools
                        that
                        the
                        Internet bring. Especially we are always aiming at the market share of mobile phones which
                        is
                        now the
                        market leader in the number of devices used in the world.
                    </p>
                    <ul class="pagination">
                        <li><a href="">Prev</a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href="">5</a></li>
                        <li><a href="">Next</a></li>
                    </ul>
                    <div class="clear-fix"></div>
                    <div class="products">
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <ul class="pagination m-0">
                        <li><a href="">Prev</a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href="">5</a></li>
                        <li><a href="">Next</a></li>
                    </ul>
                </div>

                <div id="product-software" class="tab-pane fade">
                    <h1 class="text-capitalize">software</h1>
                    <p class="m-0">We work closely with our clients to research, build on expertise and experience
                        to
                        provide
                        solutions to
                        increase potential customers, successful sales rates based on technology and useful tools
                        that
                        the
                        Internet bring. Especially we are always aiming at the market share of mobile phones which
                        is
                        now the
                        market leader in the number of devices used in the world.
                    </p>
                    <ul class="pagination">
                        <li><a href="">Prev</a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href="">5</a></li>
                        <li><a href="">Next</a></li>
                    </ul>
                    <div class="clear-fix"></div>
                    <div class="products">
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <a href="Products Detail.html">
                                    <img src="{{ asset('assets/client')}}/images/work-in-coffee.png" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <ul class="pagination m-0">
                        <li><a href="">Prev</a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href="">5</a></li>
                        <li><a href="">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection