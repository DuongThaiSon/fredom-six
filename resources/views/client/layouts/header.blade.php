<div class="promo">
    <p>miễn phí vận chuyển với đơn hàng trên 1.000.000 vnđ</p>
</div>
<header id="header" class="header">
    <div class="site-navbar py-4">
        <div class="search-wrap">
            <div class="container">
                <a href="#" class="search-close js-search-close">
                    <i class="ti-close"></i>
                </a>
                <form action="/search">
                    <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm" />
                </form>
            </div>
        </div>
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <div class="logo">
                    <div class="site-logo">
                        <a href="/" class="js-logo-clone">
                            <img src="{{ asset('assets/client') }}/images/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="main-nav d-none d-lg-block">
                    <nav class="site-navigation text-right text-md-center">
                        <ul class="site-menu js-clone-nav">
                            <li class="active"><a href="/">Trang chủ</a></li>
                            <li><a href="/quan">Quần</a></li>
                            <li><a href="/ao">Áo</a></li>
                            <li><a href="/phu-kien">Phụ kiện</a></li>
                            <li><a href="/collections">Bộ sưu tập</a></li>
                            <li><a href="https://www.instagram.com/fredom.6ix/">Instashop</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="icons">
                    <a href="javascript:void(0)" class="icons-btn d-inline-block js-search-open" title="Tìm kiếm">
                        <span class="ti-search"></span>
                    </a>
                    <a href="" class="icons-btn d-inline-block" title="Tài khoản">
                        <span class="ti-user"></span>
                    </a>
                    <a href="cart" class="icons-btn d-inline-block bag" title="Giỏ hàng">
                        <span class="ti-shopping-cart"></span>
                        <span class="number">{{ $quantity }}</span>
                    </a>
                    <a href="javascript:void(0)" class="js-show--menu d-inline-block d-lg-none">
                        <span class="ti-menu"></span>
                    </a>
                </div>
                <div class="mobile-menu">
                    <div class="mobile-menu--head d-flex justify-content-between align-items-center">
                        <a href="" class="logo">
                            <img src="{{ asset('assets/client') }}/images/logo.png" alt="">
                        </a>
                        <a href="javascript:void(0)" class="js-close--menu">
                            <span class="ti-close"></span>
                        </a>
                    </div>
                    <div class="mobile-menu--content">
                        <ul class="p-0 m-0">
                            <li class="active">
                                <a href="/">Trang chủ</a>
                            </li>
                            <li>
                                <a href="/quan">Quần</a>
                            </li>
                            <li>
                                <a href="/ao">Áo</a>
                            </li>
                            <li>
                                <a href="/phu-kien">Phụ kiện</a>
                            </li>
                            <li>
                                <a href="/collections">Bộ sưu tập</a>
                            </li>
                            <li>
                                <a href="">Liên hệ</a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/fredom.6ix/">Instashop</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
