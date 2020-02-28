@extends('client.layouts.main', ['title'=> 'Service'])
@include('client.layouts.header')
@section('content')
    <section id="breadcrumb">
        <div class="container">
            <p>
                <a href="Home.html" class="text-capitalize">home</a> &nbsp > &nbsp 
                <a href="Service.html" class="text-capitalize font-weight-bold">services</a>
            </p>
        </div>
    </section>

    <section id="service">
        <div class="container">
            <h1>Our Services</h1>
            <p>We work closely with our clients to research, build on expertise and experience to provide solutions to
                increase potential customers, successful sales rates based on technology and useful tools that the
                Internet bring. Especially we are always aiming at the market share of mobile phones which is now the
                market leader in the number of devices used in the world.
            </p>
            <div class="row">
                <div class="col-lg-2 col-md-4">
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
                <div class="col-lg-2 col-md-4">
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
                <div class="col-lg-2 col-md-4">
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
                <div class="col-lg-2 col-md-4">
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
                <div class="col-lg-2 col-md-4">
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
                <div class="col-lg-2 col-md-4">
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
    </section>

    <section id="slide-portfolio">
        <div class="slide-branding" data-aos="fade-right" data-aos-duration="1500">
            <div class="slide-branding_bg"></div>
            <div class="project-slide_bg slide-portfolio_bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="portfolio-img">
                            <img src="{{ asset('assets/client')}}/images/macbook.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="portfolio-text">
                            <div class="portfolio-left">
                                <div class="box-design_name text-uppercase">Logo & Branding</div>
                                <div class="box-design_title">Design</div>
                            </div>
                            <div class="portfolio-right">
                                <a href="Service Detail.html">
                                    <button type="submit" class="btn btn-use">use now</button>
                                </a>
                            </div>
                            <div class="clear-fix"></div>
                            <p>We work closely with our clients to research, build on expertise and experience to
                                provide solutions to increase potential customers, successful sales rates based on
                                technology and useful tools that the Internet bring. Especially we are always aiming at
                                the market share of mobile phones which is now the market leader in the number of
                                devices used in the world. We work closely with our clients to research, build on
                                expertise and experience to provide solutions to increase potential customers,
                                successful sales rates based on technology and useful tools that the Internet bring.
                                Especially we are always aiming at the market share of mobile phones which is now the
                                market leader in the number of devices used in the world.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide-branding slide-website" data-aos="fade-left" data-aos-duration="1500">
            <div class="slide-branding_bg slide-website_bg"></div>
            <div class="project-slide_bg slide-portfolio_bg slide-portfolio-website_bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="portfolio-text">
                            <div class="portfolio-left">
                                <div class="box-design_name text-uppercase">website</div>
                                <div class="box-design_title">Design</div>
                            </div>
                            <div class="portfolio-right">
                                <a href="Service Detail.html">
                                    <button type="submit" class="btn btn-use">use now</button>
                                </a>
                            </div>
                            <div class="clear-fix"></div>
                            <p>We work closely with our clients to research, build on expertise and experience to
                                provide solutions to increase potential customers, successful sales rates based on
                                technology and useful tools that the Internet bring. Especially we are always aiming at
                                the market share of mobile phones which is now the market leader in the number of
                                devices used in the world. We work closely with our clients to research, build on
                                expertise and experience to provide solutions to increase potential customers,
                                successful sales rates based on technology and useful tools that the Internet bring.
                                Especially we are always aiming at the market share of mobile phones which is now the
                                market leader in the number of devices used in the world.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="portfolio-img">
                            <img src="{{ asset('assets/client')}}/images/macbook.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide-branding" data-aos="fade-right" data-aos-duration="1500">
            <div class="slide-branding_bg"></div>
            <div class="project-slide_bg slide-portfolio_bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="portfolio-img">
                            <img src="{{ asset('assets/client')}}/images/macbook.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="portfolio-text">
                            <div class="portfolio-left">
                                <div class="box-design_name text-uppercase">ux & ui</div>
                                <div class="box-design_title">Design</div>
                            </div>
                            <div class="portfolio-right">
                                <a href="Service Detail.html">
                                    <button type="submit" class="btn btn-use">use now</button>
                                </a>
                            </div>
                            <div class="clear-fix"></div>
                            <p>We work closely with our clients to research, build on expertise and experience to
                                provide solutions to increase potential customers, successful sales rates based on
                                technology and useful tools that the Internet bring. Especially we are always aiming at
                                the market share of mobile phones which is now the market leader in the number of
                                devices used in the world. We work closely with our clients to research, build on
                                expertise and experience to provide solutions to increase potential customers,
                                successful sales rates based on technology and useful tools that the Internet bring.
                                Especially we are always aiming at the market share of mobile phones which is now the
                                market leader in the number of devices used in the world.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide-branding slide-website" data-aos="fade-left" data-aos-duration="1500">
            <div class="slide-branding_bg slide-website_bg"></div>
            <div class="project-slide_bg slide-portfolio_bg slide-portfolio-website_bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="portfolio-text">
                            <div class="portfolio-left">
                                <div class="box-design_name text-uppercase">software</div>
                                <div class="box-design_title">Development</div>
                            </div>
                            <div class="portfolio-right">
                                <a href="Service Detail.html">
                                    <button type="submit" class="btn btn-use">use now</button>
                                </a>
                            </div>
                            <div class="clear-fix"></div>
                            <p>We work closely with our clients to research, build on expertise and experience to
                                provide solutions to increase potential customers, successful sales rates based on
                                technology and useful tools that the Internet bring. Especially we are always aiming at
                                the market share of mobile phones which is now the market leader in the number of
                                devices used in the world. We work closely with our clients to research, build on
                                expertise and experience to provide solutions to increase potential customers,
                                successful sales rates based on technology and useful tools that the Internet bring.
                                Especially we are always aiming at the market share of mobile phones which is now the
                                market leader in the number of devices used in the world.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="portfolio-img">
                            <img src="{{ asset('assets/client')}}/images/macbook.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide-branding" data-aos="fade-right" data-aos-duration="1500">
            <div class="slide-branding_bg"></div>
            <div class="project-slide_bg slide-portfolio_bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="portfolio-img">
                            <img src="{{ asset('assets/client')}}/images/macbook.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="portfolio-text">
                            <div class="portfolio-left">
                                <div class="box-design_name text-uppercase">graphic</div>
                                <div class="box-design_title">Design</div>
                            </div>
                            <div class="portfolio-right">
                                <button type="submit" class="btn btn-use">use now</button>
                            </div>
                            <div class="clear-fix"></div>
                            <p>We work closely with our clients to research, build on expertise and experience to
                                provide solutions to increase potential customers, successful sales rates based on
                                technology and useful tools that the Internet bring. Especially we are always aiming at
                                the market share of mobile phones which is now the market leader in the number of
                                devices used in the world. We work closely with our clients to research, build on
                                expertise and experience to provide solutions to increase potential customers,
                                successful sales rates based on technology and useful tools that the Internet bring.
                                Especially we are always aiming at the market share of mobile phones which is now the
                                market leader in the number of devices used in the world.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide-branding slide-website" data-aos="fade-left" data-aos-duration="1500">
            <div class="slide-branding_bg slide-website_bg"></div>
            <div class="project-slide_bg slide-portfolio_bg slide-portfolio-website_bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="portfolio-text">
                            <div class="portfolio-left">
                                <div class="box-design_name text-uppercase">product</div>
                                <div class="box-design_title">Printing</div>
                            </div>
                            <div class="portfolio-right">
                                <button type="submit" class="btn btn-use">use now</button>
                            </div>
                            <div class="clear-fix"></div>
                            <p>We work closely with our clients to research, build on expertise and experience to
                                provide solutions to increase potential customers, successful sales rates based on
                                technology and useful tools that the Internet bring. Especially we are always aiming at
                                the market share of mobile phones which is now the market leader in the number of
                                devices used in the world. We work closely with our clients to research, build on
                                expertise and experience to provide solutions to increase potential customers,
                                successful sales rates based on technology and useful tools that the Internet bring.
                                Especially we are always aiming at the market share of mobile phones which is now the
                                market leader in the number of devices used in the world.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="portfolio-img">
                            <img src="{{ asset('assets/client')}}/images/macbook.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection