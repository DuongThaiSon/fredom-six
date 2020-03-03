<header>
    <section id="head">
        <div class="container">
            <div class="navigation">
                <div class="col-lg-2 text-left logo-head">
                    <a href="{{ route('client.home')}}">
                        <img src="{{ asset('assets/client')}}/images/logo-header.png" alt="">
                    </a>
                </div>
                <div class="col-lg-10">
                    <div id="menu">
                        <ul class="nav navbar-nav navbar-right menu-news">
                            <li class="nav-link"><a href="{{ route('client.home')}}">Home</a></li>
                            <li class="nav-link"><a href="{{ route('client.service')}}">services</a></li>
                            <li class="nav-link"><a href="{{ route('client.product')}}">portfolio</a></li>
                            <li class="nav-link"><a href="{{ route('client.about')}}">about</a></li>
                            <li class="nav-link"><a href="{{ route('client.customer')}}">customer</a></li>
                            <li class="nav-link"><a href="{{ route('client.home')}}" class="js-menu">let's talk</a></li>
                        </ul>
                    </div>
                    <div class="navT nav-head">
                        <div class="icon"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</header>