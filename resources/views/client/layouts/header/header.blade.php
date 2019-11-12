<section id="header">
    <!-- top -->
    <div class="head-hotline">
        <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-5">
            <p class="hotline text-uppercase m-0">
                hotline: 1900292976
            </p>
            </div>
            <div class="col-lg-6 col-md-7">
            <ul class="nav nav-head float-right">
                <li class="nav-item p-0">
                <select name="" id="" class="head-select">
                    <option value="">VNĐ</option>
                    <option value="">$</option>
                    <option value="">£</option>
                </select>
                </li>
                <li class="nav-item">
                <select name="" id="" class="head-select">
                    <option value="">Vietnamese</option>
                    <option value="">United States</option>
                    <option value="">England</option>
                </select>
                @guest('web')
                    </li>
                    <li class="nav-item">
                    <a href="">Đăng ký</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('client.loginform')}}">Đăng nhập</a>
                    </li>
                @endguest 
                @auth('web')
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('client.logout')}}" method="POST" >
                        @csrf
                    <button type="submit">Đăng xuất</button>
                </form>
                    </li>
                @endauth
                
            
                <li class="nav-item p-0">
                <button type="button" class="btn-search">
                    <i class="fas fa-search"></i>
                </button>
                <div class="search-header">
                    <input type="text" />
                </div>
                </li>
            </ul>
            </div>
        </div>
        </div>
    </div>
    <!-- navbar -->
    @include('client.layouts.header.nav')
</section>