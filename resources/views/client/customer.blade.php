@extends('client.layouts.main', ['title'=> 'Customer'])
@include('client.layouts.header')
@section('content')
    <section id="breadcrumb">
        <div class="container">
            <p>
                <a href="Home.html" class="text-capitalize">home</a> &nbsp > &nbsp
                <a href="Customer.html" class="text-capitalize font-weight-bold">customer</a>
            </p>
        </div>
    </section>

    <section id="partner">
        <div class="container">
            <h1 class="text-capitalize">customers & partners</h1>
            <div class="customer-box">
                <ul>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/hestia-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/hestia.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/passion-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/passion.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/deep-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/deep.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/eti-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/eti.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/olumi-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/olumi.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/texo-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/texo.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/bli-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/bli.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/haminco-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/haminco.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/line-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/line.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/coninco-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/coninco.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/uhc-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/uhc.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/biofun-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/biofun.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/dtt-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/dtt.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/kei-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/kei.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/cpont-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/cpont.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/nyomo-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/nyomo.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/viet-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/viet.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/cinnamon-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/cinnamon.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/trixie-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/trixie.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/matkaline-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/matkaline.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/sparta-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/sparta.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/fpt-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/fpt.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/dev-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/dev.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/hung-viet-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/hung-viet.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/huyndai-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/huyndai.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/gim-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/gim.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/miriam-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/miriam.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/kap-color.png" style="top: 4px;" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/kap.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/hanoi-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/hanoi.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/bio-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/bio.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/eunsoo-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/eunsoo.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/purple-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/purple.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/tc-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/tc.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/detech-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/detech.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/live-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/live.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/eastern-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/eastern.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/quang-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/quang.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/friend-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/friend.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/s-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/s.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/gedicom-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/gedicom.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/love-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/love.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/n-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/n.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/global-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/global.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/le-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/le.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/g-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/g.png" alt="">
                    </li>
                    <li class="logo-list">
                        <img class="image-front" src="{{ asset('assets/client')}}/images/lie-color.png" alt="">
                        <img class="image-back" src="{{ asset('assets/client')}}/images/lie.png" alt="">
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section id="customer" data-aos="fade-up" data-aos-duration="1500">
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