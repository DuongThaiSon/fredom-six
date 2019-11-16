<div id="navbar">
        <nav class="navbar navbar-expand-md">
        <div class="container">
            <a href="/home" class="navbar-brand">
            <img src="{{ asset('assets/client') }}/img/head-logo.png" alt="" />
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <i class="fas fa-bars text-white fa-2x pr-2"></i>
            </button>
            <div class="collapse navbar-collapse pt-lg-4 mt-sm-1" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                @foreach ($menuTop as $item)
                    <li class="nav-item pl-lg-5">
                        <a href="{{ $item->link }}" class="nav-link text-uppercase">{{ $item->name }}</a>
                    </li>
                @endforeach
                
                {{-- <li class="nav-item pl-lg-5">
                <a href="{{ route('client.news.index')}}" class="nav-link text-uppercase">tin tức</a>
                </li>
                <li class="nav-item pl-lg-5">
                <a href="{{ route('client.products.category') }}/san-pham-nu" class="nav-link text-uppercase">nữ</a>
                </li>
                <li class="nav-item pl-lg-5">
                <a href="{{ route('client.products.category') }}/san-pham-nam" class="nav-link text-uppercase">nam</a>
                </li>
                {{-- <li class="nav-item pl-lg-5">
                <a href="#" class="nav-link text-uppercase">monoco</a>
                </li> --}}
                {{-- <li class="nav-item pl-lg-5">
                <a href="#" class="nav-link text-uppercase">gifts</a>
                </li>
                <li class="nav-item pl-lg-5">
                <a href="{{ route('client.showrooms.index') }}" class="nav-link text-uppercase">showroom</a>
                </li>  --}}
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