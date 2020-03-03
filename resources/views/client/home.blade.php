@extends('client.layouts.main', ['title' => 'Home'])
@section('content')
    <section id="first-page">
        <div class="full-screen_bg position-relative">
            <div class="main-bg">
                <div class="container">
                    <div class="navigation">
                        <div id="menu">
                            <ul class="nav navbar-nav navbar-right menu-news">
                                <li class="nav-link"><a href="">Home</a></li>
                                <li class="nav-link"><a href="Service.html">services</a></li>
                                <li class="nav-link"><a href="Product List.html">portfolio</a></li>
                                <li class="nav-link"><a href="About.html">about</a></li>
                                <li class="nav-link"><a href="Customer.html">customer</a></li>
                                <li class="nav-link"><a href="#talk" class="js-menu">let's talk</a></li>
                            </ul>
                        </div>
                        <div class="navT">
                            <div class="icon"></div>
                        </div>
                    </div>
                    <div class="col-lg-2 text-left logo">
                        <a href="Home.html">
                            <img src="{{ asset('assets/client')}}/images/logo-menu.png" alt="">
                        </a>
                        <div class="quote-left position-absolute">
                            <i class="fas fa-quote-left"></i>
                        </div>
                        <div class="quote-right position-absolute">
                            <i class="fas fa-quote-right"></i>
                        </div>
                        <div class="main-bg_text">
                            <p>
                                <span class="text-white">Transforming</span>
                                <span class="font-weight-bold main-color">your ideas</span>
                                <span class="text-white">into</span>
                                <span class="font-weight-bold main-color">everlasting brands</span>
                            </p>
                        </div>
                        <a href="Service Detail.html">
                            <button type="submit" class="btn main-bg_color text-uppercase btn-work">work
                                with us</button>
                        </a>
                    </div>
                </div>
                <div class="left-bg">

                </div>
                <div class="right-bg">
                    <canvas id="canvas"></canvas>
                </div>
            </div>
        </div>
    </section>

    <section id="work-with-us" data-aos="fade-up" data-aos-duration="1500">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 work-with-us_text">
                    <div class="row">
                        <div class="col-lg-7">
                            <h1 class="">Work with us</h1>
                        </div>
                    </div>
                    <p>Credibly reintermediate backend ideas for cross-platform models. Continually reintermediate
                        integrated processes through technically sound intellectual capital.</p>
                    <a href="Service Detail.html">
                        <button type="submit" class="btn text-uppercase main-bg_color btn-start ">get
                            started</button>
                    </a>
                </div>
                <div class="col-lg-7 work-with-us_icon">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="box-design">
                                <a href="Service Detail.html">
                                    <div class="box-design_img">
                                        <img src="{{ asset('assets/client')}}/images/leave.png" alt="">
                                    </div>
                                    <p class="box-design_name text-uppercase text-center">logo & branding</p>
                                    <p class="box-design_title text-center">Design</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="box-design">
                                <a href="Service Detail.html">
                                    <div class="box-design_img box-design_img--fix">
                                        <img src="{{ asset('assets/client')}}/images/screen.png" alt="">
                                    </div>
                                    <div class="text">
                                        <p class="box-design_name text-uppercase text-center">website</p>
                                        <p class="box-design_title text-center">Design</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="box-design">
                                <a href="Service Detail.html">
                                    <div class="box-design_img box-design_img--fix">
                                        <img src="{{ asset('assets/client')}}/images/screen-triangle.png" alt="">
                                    </div>
                                    <p class="box-design_name text-uppercase text-center">ux & ui</p>
                                    <p class="box-design_title text-center">Design</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="box-design">
                                <a href="Service Detail.html">
                                    <div class="box-design_img">
                                        <img src="{{ asset('assets/client')}}/images/rocket.png" alt="">
                                    </div>
                                    <p class="box-design_name text-uppercase text-center">software</p>
                                    <p class="box-design_title text-center">Development</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="box-design">
                                <a href="Service Detail.html">
                                    <div class="box-design_img">
                                        <img src="{{ asset('assets/client')}}/images/linking.png" alt="">
                                    </div>
                                    <p class="box-design_name text-uppercase text-center">graphic</p>
                                    <p class="box-design_title text-center">Design</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="box-design">
                                <a href="Service Detail.html">
                                    <div class="box-design_img">
                                        <img src="{{ asset('assets/client')}}/images/print.png" alt="">
                                    </div>
                                    <p class="box-design_name text-uppercase text-center">product</p>
                                    <p class="box-design_title text-center">Printing</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="why-choose-us" data-aos="fade-right" data-aos-duration="1500">
        <canvas id="why-choose-us_canvas"></canvas>
        <div class="row">
            <div class="col-lg-3 col-md-3"></div>
            <div class="col-lg-4 col-md-7 why-choose-us_text order-md-5">
                <h2>Why Choose Us</h2>
                <p>High-quality Workforce</p>
                <p>Flexible Engagement Models</p>
                <p>Minimize Operational Cost and Time-saving</p>
                <p>Competitive Pricing and On-time Delivery</p>
                <a href="About.html">
                    <button type="submit" class="btn text-uppercase main-bg_color btn_learn-more">learn
                        more</button>
                </a>
            </div>
            <div class="col-lg-5 col-md-5 why-choose-us_pic order-md-4">
                <img src="{{ asset('assets/client')}}/images/why-choose-us.png" alt="">
            </div>
        </div>
    </section>

    <section id="project" data-aos="fade-up" data-aos-duration="1500">
        <div class="col-lg-6 text-center m0-auto">
            <h1 class="text-center">So you can have <span class="font-weight-bold">the best project</span> like what we
                did from customers all over the world.</h1>
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
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <ul class="view-all nav">
            <li class="js-changebg nav-item">
                <a class="text-uppercase nav-link" data-toggle="tab" href="#branding">branding</a>
            </li>
            <li class="js-changebg nav-item">
                <a class="text-uppercase nav-link" data-toggle="tab" href="#website">website</a>
            </li>
            <li class="js-changebg nav-item main-bg_color">
                <a class="text-uppercase nav-link" data-toggle="tab" href="#view-all">view all</a>
            </li>
            <li class="js-changebg nav-item">
                <a class="text-uppercase nav-link" data-toggle="tab" href="#mobile">mobile app</a>
            </li>
            <li class="js-changebg nav-item">
                <a class="text-uppercase nav-link" data-toggle="tab" href="#software">software</a>
            </li>
        </ul>
        <div class="project-wrap" data-aos="fade-right" data-aos-duration="1500">
            <div class="tab-content">
                <div id="branding" class="tab-pane fade">
                    <div id="slide-branding" class="owl-carousel owl-theme">
                        <div class="item">
                            <a href="Products Detail.html">
                                <div class="project-slide">
                                    <div class="project-slide_bg" style="background-color: yellow"></div>
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <p class="project-slide_name">Happy Mokeyz Spa</p>
                                            <div class="project-slide-name_line"></div>
                                        </div>
                                        <div class="col-lg-7">
                                            <img src="{{ asset('assets/client')}}/images/tripazia.gif" alt="">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="Products Detail.html">
                                <div class="project-slide">
                                    <div class="project-slide_bg-2"></div>
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <p class="project-slide_name">Hestia Finance</p>
                                            <div class="project-slide-name_line project-slide-name_line2"></div>
                                        </div>
                                        <div class="col-lg-7">
                                            <img src="{{ asset('assets/client')}}/images/batdongsan2.gif" alt="">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="Products Detail.html">
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
                            </a>
                        </div>
                    </div>
                </div>
                <div id="website" class="tab-pane fade">
                    <div id="slide-website" class="owl-carousel owl-theme">
                        <div class="item">
                            <a href="Products Detail.html">
                                <div class="project-slide">
                                    <div class="project-slide_bg" style="background-color: yellow"></div>
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
                            </a>
                        </div>
                        <div class="item">
                            <a href="Products Detail.html">
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
                            </a>
                        </div>
                        <div class="item">
                            <a href="Products Detail.html">
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
                            </a>
                        </div>
                    </div>
                </div>
                <div id="view-all" class="tab-pane fade show active">
                    <div id="slide-view" class="owl-carousel owl-theme">
                        <div class="item">
                            <a href="Products Detail.html">
                                <div class="project-slide">
                                    <div class="project-slide_bg"></div>
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <p class="project-slide_name">Happy Mokeyz Spa</p>
                                            <div class="project-slide-name_line"></div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div style="background: url('images/bg-macbook.png') no-repeat center center; background-size: cover;">
                                                <img src="{{ asset('assets/client')}}/images/batdongsan_n.gif" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="Products Detail.html">
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
                            </a>
                        </div>
                        <div class="item">
                            <a href="Products Detail.html">
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
                            </a>
                        </div>
                    </div>
                </div>
                <div id="mobile" class="tab-pane fade">
                    <div id="slide-mobile" class="owl-carousel owl-theme">
                        <div class="item">
                            <a href="Products Detail.html">
                                <div class="project-slide">
                                    <div class="project-slide_bg" style="background-color: blue"></div>
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
                            </a>
                        </div>
                        <div class="item">
                            <a href="Products Detail.html">
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
                            </a>
                        </div>
                        <div class="item">
                            <a href="Products Detail.html">
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
                            </a>
                        </div>
                    </div>
                </div>
                <div id="software" class="tab-pane fade">
                    <div id="slide-software" class="owl-carousel owl-theme">
                        <div class="item">
                            <a href="Products Detail.html">
                                <div class="project-slide">
                                    <div class="project-slide_bg" style="background-color: red"></div>
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
                            </a>
                        </div>
                        <div class="item">
                            <a href="Products Detail.html">
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
                            </a>
                        </div>
                        <div class="item">
                            <a href="Products Detail.html">
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
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="because" data-aos="fade-up" data-aos-duration="1500">
        <h3 class="title-section">because</h3>
        <div class="col-lg-4 m0-auto text-center">
            <h3>We are the <span class="font-weight-bold">one of the most </span>effective Design & Development
                Companies</h3>
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
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="because-content position-relative">
            <div class="because-bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="because-text" data-aos="fade-right" data-aos-duration="1500">
                            <div class="because-text_1">
                                <p class="text-uppercase">Vision</p>
                                <p class="m-0">We work closely with our clients to research, build on expertise and
                                    experience to
                                    provide
                                    solutions to increase potential customers, successful sales rates based on
                                    technology and
                                    useful tools that the Internet bring.
                                    <br>Especially we are always aiming at the market share of mobile phones which is
                                    now the market leader in the number of devices used in the world.
                                </p>
                            </div>
                            <div class="because-text_2">
                                <p class="text-uppercase">mision</p>
                                <p>
                                    New technology has changed people's lives and organizations also need to change to
                                    achieve successful We work closely with our clients to research, build on expertise
                                    and experience to provide solutions to increase potential customers, successful
                                    sales rates based on technology and useful tools that the Internet bring.
                                    <br>Especially we are always aiming at the market share of mobile phones which is
                                    now the market leader in the number of devices used in the world.
                                    <br>New technology has changed people's lives and organizations also need to change
                                    to achieve successful..
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <img data-aos="fade-left" data-aos-duration="1800" class="float-right"
                            src="{{ asset('assets/client')}}/images/because-working.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="with" data-aos="fade-up" data-aos-duration="1500">
        <h1 class="title-section">with</h1>
        <h3 class="text-center"><span class="font-weight-bold">Professional</span> working style</h3>
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
        </div>
        <div class="with-content">
            <div class="with-bg"></div>
            <div class="with-main_content">
                <div class="container position-relative">
                    <div class="row row1">
                        <div class="col-lg-4 col-md-4">
                            <div class="with-main_step float-right">
                                <p class="with-main_step--number">01.</p>
                                <p class="with-main_step--name">We plan property</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <img class="with-circle" src="{{ asset('assets/client')}}/images/green-circle.png" alt="">
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <p class="with-main_step--title float-right">We define your competition and target audience.
                                Discover what is working in your online industry, then design your website accordingly.
                            </p>
                        </div>
                    </div>
                    <div class="with-arrow1" data-aos="fade-down" data-aos-duration="1700">
                        <img src="{{ asset('assets/client')}}/images/left-arrow.png" alt="">
                    </div>
                    <div class="row row2">
                        <div class="col-lg-4 col-md-4">
                            <p class="with-main_step--title float-left">We define your competition and target audience.
                                Discover what is working in your online industry, then design your website accordingly.
                            </p>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <img class="with-circle" src="{{ asset('assets/client')}}/images/green-circle.png" alt="">
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="with-main_step float-left">
                                <p class="with-main_step--number">02.</p>
                                <p class="with-main_step--name">We start property</p>
                            </div>
                        </div>
                    </div>
                    <div class="with-arrow2" data-aos="fade-down" data-aos-duration="1700">
                        <img src="{{ asset('assets/client')}}/images/right-arrow.png" alt="">
                    </div>
                    <div class="row row1">
                        <div class="col-lg-4 col-md-4">
                            <div class="with-main_step float-right">
                                <p class="with-main_step--number">03.</p>
                                <p class="with-main_step--name">We show casework</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <img class="with-circle" src="{{ asset('assets/client')}}/images/green-circle.png" alt="">
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <p class="with-main_step--title float-right">We define your competition and target audience.
                                Discover what is working in your online industry, then design your website accordingly.
                            </p>
                        </div>
                    </div>
                    <div class="with-arrow3" data-aos="fade-down" data-aos-duration="1700">
                        <img src="{{ asset('assets/client')}}/images/left-arrow.png" alt="">
                    </div>
                    <div class="row row2 m-0">
                        <div class="col-lg-4 col-md-4">
                            <p class="with-main_step--title float-right">We define your competition and target audience.
                                Discover what is working in your online industry, then design your website accordingly.
                            </p>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <img class="with-circle" src="{{ asset('assets/client')}}/images/green-circle.png" alt="">
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="with-main_step float-left">
                                <p class="with-main_step--number">04.</p>
                                <p class="with-main_step--name">You wil be happy</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="customer" data-aos="fade-up" data-aos-duration="1500">
        <h1 class="title-section">and</h1>
        <h3 class="text-center">We have <span class="font-weight-bold">many customers</span> over the world</h3>
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
                    <div class="item">
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
                            <p>I received support from the social media site and soon WP Service also have an agreement
                                with them for the preparation of the web site. They delivered the job at the time we set
                                and I found answers to every question in my mind. I would definitely recommend it.
                            </p>
                        </div>
                    </div>
                    <div class="item">
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
                            <p>I received support from the social media site and soon WP Service also have an agreement
                                with them for the preparation of the web site. They delivered the job at the time we set
                                and I found answers to every question in my mind. I would definitely recommend it.
                            </p>
                        </div>
                    </div>
                    <div class="item">
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
                            <p>I received support from the social media site and soon WP Service also have an agreement
                                with them for the preparation of the web site. They delivered the job at the time we set
                                and I found answers to every question in my mind. I would definitely recommend it.
                            </p>
                        </div>
                    </div>
                    <div class="item">
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
                            <p>I received support from the social media site and soon WP Service also have an agreement
                                with them for the preparation of the web site. They delivered the job at the time we set
                                and I found answers to every question in my mind. I would definitely recommend it.
                            </p>
                        </div>
                    </div>
                    <div class="item">
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
                            <p>I received support from the social media site and soon WP Service also have an agreement
                                with them for the preparation of the web site. They delivered the job at the time we set
                                and I found answers to every question in my mind. I would definitely recommend it.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="slide-logo" >
        <div class="container">
            <div id="slide-logo-content" class="owl-carousel">
                <div class="item">
                    <div class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/sparta-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/sparta.png" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/sparta-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/sparta.png" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/sparta-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/sparta.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script type="text/javascript">
        $(document).ready(function () {

            // WHY CHOOSE US CANVAS
            var canvas = document.getElementById("why-choose-us_canvas"),
                ctx = canvas.getContext('2d');

            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;

            var stars = [], // Array that contains the stars
                FPS = 60, // Frames per second
                x = 100, // Number of stars
                mouse = {
                    x: 0,
                    y: 0
                }; // mouse location

            // Push stars to array

            for (var i = 0; i < x; i++) {
                stars.push({
                    x: Math.random() * canvas.width,
                    y: Math.random() * canvas.height,
                    radius: Math.random() * 1 + 1,
                    vx: Math.floor(Math.random() * 50) - 25,
                    vy: Math.floor(Math.random() * 50) - 25
                });
            }

            // Draw the scene

            function draw() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);

                ctx.globalCompositeOperation = "lighter";

                for (var i = 0, x = stars.length; i < x; i++) {
                    var s = stars[i];

                    ctx.fillStyle = "#2222227d";
                    ctx.beginPath();
                    ctx.arc(s.x, s.y, s.radius, 0, 2 * Math.PI);
                    ctx.fill();
                    ctx.fillStyle = 'black';
                    ctx.stroke();
                }

                ctx.beginPath();
                for (var i = 0, x = stars.length; i < x; i++) {
                    var starI = stars[i];
                    ctx.moveTo(starI.x, starI.y);
                    if (distance(mouse, starI) < 150) ctx.lineTo(mouse.x, mouse.y);
                    for (var j = 0, x = stars.length; j < x; j++) {
                        var starII = stars[j];
                        if (distance(starI, starII) < 150) {
                            ctx.lineTo(starII.x, starII.y);
                        }
                    }
                }
                ctx.lineWidth = 0.05;
                ctx.strokeStyle = '#2222227d';
                ctx.stroke();
            }

            function distance(point1, point2) {
                var xs = 0;
                var ys = 0;

                xs = point2.x - point1.x;
                xs = xs * xs;

                ys = point2.y - point1.y;
                ys = ys * ys;

                return Math.sqrt(xs + ys);
            }

            // Update star locations

            function update() {
                for (var i = 0, x = stars.length; i < x; i++) {
                    var s = stars[i];

                    s.x += s.vx / FPS;
                    s.y += s.vy / FPS;

                    if (s.x < 0 || s.x > canvas.width) s.vx = -s.vx;
                    if (s.y < 0 || s.y > canvas.height) s.vy = -s.vy;
                }
            }

            canvas.addEventListener('mousemove', function (e) {
                mouse.x = e.clientX;
                mouse.y = e.clientY;
            });

            // Update and draw

            function tick() {
                draw();
                update();
                requestAnimationFrame(tick);
            }

            tick();
            // END WHY CHOOSE US CANVAS
        });
    </script>
@endpush