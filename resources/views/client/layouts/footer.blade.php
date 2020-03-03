<footer>
    <section id="talk" data-aos="fade-up" data-aos-duration="1500">
        <div class="col-lg-2 col-md-12 m0-auto">
            <h3 class="text-center ">Lets <span class="font-weight-bold">get started</span> your project</h3>
            <a href="#comunicate">
                <button type="submit" class="btn main-bg_color text-uppercase btn-talk">Let's talk</button>
            </a>
            <div class="load-icon">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <div id="comunicate" class="comunicate main-bg_color">
            <div class="container">
                <div class="col-lg-10 col-md-12 m0-auto ">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 m0-auto text-center comunicate-wrap">
                            <a href="tel:{{ $hotline??''}}">
                                <div class="comunicate-icon p-0">
                                    <img src="{{ asset('assets/client')}}/images/phone.png" alt="">
                                </div>
                                <p class="comunicate-name">Call Us</p>
                            </a>
                            <div class="comunicate-info">
                                <a href="tel:{{ $hotline??''}}"><p>Hotline: {{ $hotline??''}}</p></a>
                                <a href="tel:{{ $sale??''}}"><p>Sale: {{ $sale??''}}</p></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 m0-auto text-center comunicate-wrap">
                            <a href="mailto:{{ $company_email??''}}">
                                <div class="comunicate-icon">
                                    <img src="{{ asset('assets/client')}}/images/mail.png" alt="">
                                </div>
                                <p class="comunicate-name">Write Us</p>
                            </a>
                            <div class="comunicate-info">
                                <a href="mailto:{{ $company_email??''}}"><p>{{ $company_email??''}}</p></a>
                                <a href="mailto:{{ $contact??''}}"><p>{{ $contact ??''}}</p></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 m0-auto text-center comunicate-wrap">
                            <button type="submit" class="btn-visit" data-toggle="modal" data-target="#map">
                                <div class="comunicate-icon">
                                    <img src="{{ asset('assets/client')}}/images/visit-us.png" alt="">
                                </div>
                                <p class="comunicate-name">Visit Us</p>
                            </button>
                            <div class="modal fade" id="map" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <iframe
                                                src="{{ $position??''}}"
                                                width="100%" height="350" frameborder="0" style="border:0"
                                                allowfullscreen>
                                            </iframe>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn main-bg_color "
                                                data-dismiss="modal">Close</i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comunicate-info">
                                {{ $address??''}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="logo-footer">
                        <a href="Home.html">
                            <img src="{{ asset('assets/client')}}/images/logo-menu.png" alt="">
                        </a>
                    </div>
                    <p class="footer-describe">{{ $description??''}}
                    </p>
                    <div class="footer-line"></div>
                    <div class="footer-address">
                        <div class="row">
                            <div class="col-lg-2 pr-0">
                                <img src="{{ asset('assets/client')}}/images/locate.png" alt="">
                            </div>
                            <div class="col-lg-10">
                                {{ $address??''}}
                            </div>
                        </div>
                    </div>
                    <div class="footer-mail">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="mailto:{{ $company_email??''}}">
                                    <img class="float-left" src="{{ asset('assets/client')}}/images/mail-footer.png" alt="">
                                    <p class="float-left">{{ $company_email??''}}</p>
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <a href="tel:{{ $hotline ??'' }}">
                                    <img class="float-left" src="{{ asset('assets/client')}}/images/phone-footer.png" alt="">
                                    <p class="float-left">{{ $hotline ??"" }}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="site">
                        <p class="m-0">Site Navigation</p>
                    </div>
                    <div class="footer-service">
                        <div class="row">
                            <div class="col-lg-6">
                                <p><a href="Home.html">Home</a></p>
                                <p><a href="Service.html">Our Services</a></p>
                                <p><a href="About.html">About Us</a></p>
                                <p><a href="Product List.html">Our Portfolio</a></p>
                            </div>
                            <div class="col-lg-6">
                                <p><a href="About.html">Vision & Mission</a></p>
                                <p><a href="About.html">Working Style</a></p>
                                <p><a href="#customer">Customers & Partners</a></p>
                                <p class="m-0"><a href="#talk">Contact Us</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="footer-line"></div>
                    <div class="footer-follow">
                        <p>Follow Us</p>
                        <ul class="pagination">
                            <li><a href="{{ $facebook??'' }}"><i
                                        class="fab fa-facebook-square"></i></a></li>
                            {{-- <li><a href=""><i class="fab fa-pinterest"></i></a></li>
                            <li><a href="https://www.behance.net/lanka"><i class="fab fa-behance"></i></a></li>
                            <li><a href="https://www.facebook.com/leotivepage"><i class="fab fa-google-plus-g"></i></a>
                            </li>
                            <li><a href="https://www.instagram.com/leotive.design"><i class="fab fa-instagram"></i></a> --}}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="contact">
                        <p class="quick-contact">Quick Contact</p>
                        <form action="{{ route('client.contact') }}" method="POST" class="form-contact-footer">
                            @csrf
                            <input type="text" name="name" class="form-control" placeholder="Your Name">
                            <input type="email" name="email" class="form-control" placeholder="Your Email">
                            <textarea name="content" class="form-control" placeholder="Message"></textarea>
                            <button type="submit" class="btn text-uppercase float-right main-bg_color btn-contact">Send
                                Us</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="copy-right">
        <div class="container">
            <p class="float-left">{{ $copyright??'' }}</p>
            <p class="float-right">{{ $working_time??'' }}</p>
            <div class="clear-fix"></div>
        </div>
    </section>
</footer>