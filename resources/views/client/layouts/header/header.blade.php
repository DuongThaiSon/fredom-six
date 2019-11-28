<section id="header">
    <!-- top -->
    <div class="head-hotline">
        <div class="container">
        <div class="row">
            <div class="col-lg-6 col-4 pr-0">
            <p class="hotline text-uppercase m-0">
                <i class="fas fa-phone d-lg-none"></i><span class="phone">hotline:</span> {{ $hotline->company_hotline }}
            </p>
            </div>
            <div class="col-lg-6 col-8 pl-0">
            <ul class="nav nav-head float-right">
                {{-- <li class="nav-item p-0">VNĐ
                <select name="" id="" class="head-select">
                    <option value="">VNĐ</option>
                    <option value="">$</option>
                    <option value="">£</option>
                </select>
                </li> --}}
                {{-- <li class="nav-item">
                <select name="" id="" class="head-select">
                    <option value="">Vietnamese</option>
                    <option value="">United States</option>
                    <option value="">England</option>
                </select>
                </li> --}}
                @guest('web')
                    <li class="nav-item">
                    <a href="{{ route('client.register') }}"><i class="fas fa-user d-lg-none"></i><span class="register">Đăng ký</span></a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('client.loginform')}}">Đăng nhập</a>
                    </li>
                @endguest
                @auth('web')
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name}}</a>
                            <div class="dropdown-menu"
                                style="z-index: 999999; padding: 0 !important; border-radius: unset !important; font-size: 13px;">
                                {{--  <a class="dropdown-item" href="#">Thông tin cá nhân</a>  --}}
                                <a class="dropdown-item" href="{{ route('client.password.change') }}">Đổi mật khẩu</a>
                                <form action="{{ route('client.logout')}}" method="POST" >
                                @csrf
                                    <button style="cursor: pointer;" class="dropdown-item" type="submit"><a>Đăng xuất</a></button>
                                </form>
                            </div>
                        </div>
                    </li>
                @endauth
                <li class="nav-item d-lg-none">
                    <div class="cart">
                        <div class="cart-icon">
                            <a href="/cart"> <i class="fas fa-shopping-basket"></i></a>
                            <span class="cart-quantity">{{ \Cart::getTotalQuantity()>5?"5+":\Cart::getTotalQuantity() }}</span>
                        </div>
                    </div>
                </li>

                {{-- <li class="nav-item p-0">
                <button type="button" class="btn-search">
                    <i class="fas fa-search"></i>
                </button>
                <div class="search-header">
                    <input type="text" />
                </div>
                </li> --}}
            </ul>
            </div>
        </div>
        </div>
    </div>
    <!-- navbar -->
    {{-- @include('client.layouts.header.nav') --}}
    <div id="navbar">
        <nav class="navbar navbar-expand-md">
        <div class="container">
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <i class="fas fa-bars text-white pr-2"></i>
            </button>
            <a href="/home" class="navbar-brand">
            <img src="{{ asset('assets/client') }}/img/head-logo.png" alt="" />
            </a>
            <div class="collapse navbar-collapse pt-lg-4 mt-sm-1" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                @foreach ($menuTop as $item)
                    <li class="nav-item pl-lg-5">
                        <a href="{{ $item->type == 5 || $item->type == 8 ? route('client.products.category', ['slug_cat' => $item->link]) : ($item->type == 4 ? route('client.news.detail', ['slug_view' => $item->link]) : $item->link) }}" class="nav-link text-uppercase">{{ $item->name }}
                            @if ($item->sub->count())
                            <i class="fas fa-chevron-down"></i>
                            @endif
                        </a>
                        @if ($item->sub->count())
                        <div class="submenu">
                            <div style="background: #000000; width: 200px; height:17px;"></div>
                            @foreach ($item->sub as $subitem)
                            <div class="submenu-parent">
                                <a href="{{ $subitem->type == 8 || $subitem->type == 5 ? route('client.products.category', ['slug_cat' => $subitem->link]) : ($subitem->type == 4 ? route('client.news.detail', ['slug_view' => $subitem->link]) : $subitem->link) }}" class="submenu-item">
                                    <p class="m-0">{{ $subitem->name }}</p>
                                </a>
                                @if ($subitem->sub->count())
                                <div class="second-submenu">
                                    @foreach ($subitem->sub as $secondsub)
                                        <a href="{{ $secondsub->type == 8 || $secondsub->type == 5 ? route('client.products.category', ['slug_cat' => $secondsub->link]) : ($secondsub->type == 4 ? route('client.news.detail', ['slug_view' => $secondsub->link]) : $secondsub->link) }}" class="second-submenu-item">
                                            <p class="m-0">{{ $secondsub->name }}</p>
                                        </a>
                                    @endforeach

                                </div>
                                @endif
                            </div>
                            @endforeach

                        </div>
                        @endif
                    </li>
                @endforeach

            </ul>
            <div class="cart">
                <div class="cart-icon">
                <a href="/cart"> <i class="fas fa-shopping-basket"></i></a>
                <div class="cart-items">{{ \Cart::getTotalQuantity()>5?"5+":\Cart::getTotalQuantity() }}</div>
                </div>
            </div>
            </div>
        </div>
        </nav>
    </div>
</section>
