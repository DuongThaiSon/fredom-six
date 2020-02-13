<!-- Page Content -->

<div class="navbar-top fixed-top bg-white">
    <div class="nav-search float-left align-middle">
        <form action="#" method="GET" class="form-inline md-form form-sm">
            <a href="#" class="material-icons text-secondary">
                search
            </a>
            <input class="form-control form-control-sm bg-white" name="search" type="text" placeholder="Search" aria-label="Search" />
            <span class="input-group-append">
                <button class="btn btn-white pt-1" data-toggle="collapse" type="button" href="#advancesearch">
                    <i class="material-icons text-secondary" title="Tìm kiếm nâng cao" data-toggle="tooltip">expand_more</i>
                </button>
            </span>

        </form>
    </div>

    <!-- Navbar-nav -->
    <div class="float-right right-top-bar">
        <span>Quản trị nội dung</span>
            <div class="btn-group dropdown">
                <button type="button" class="btn bg-white dropdown-toggle text-capitalize" id="dropdownMenuButton"
                    data-toggle="dropdown">
                    Tiêng Việt
                </i>
                <div class="dropdown-menu">
                    <a href="" class="dropdown-item">English</a>
                    <a href="" class="dropdown-item">Tiếng Việt</a>
                </div>
            </div>

        <div class="btn-group dropdown">
            <button type="button" class="btn bg-white dropdown-toggle text-capitalize" id="dropdownMenuButton"
                data-toggle="dropdown">
                {{ Auth::user()->name}}
            </button>
            <div class="dropdown-menu">
                <a href="{{ route('admin.users.profile.index') }}" class="dropdown-item">Thông tin cá nhân</a>
                <a href="{{ route('admin.users.profile.showChangePasswordForm') }}" class="dropdown-item">Đổi mật khẩu</a>
                <a href="signin.html" class="btn btn-sm dropdown-item" id="power-button"  onclick="event.preventDefault();document.getElementById('logout').submit();">Thoát</a>
            </div>
            <a href="signin.html" class="btn-sm mx-4"   onclick="event.preventDefault();document.getElementById('logout').submit();">
                <i class="material-icons">
                settings_power
                </i>
            </a>
            <form id="logout" method="POST" action="/admin/logout">
                @csrf
            </form>
        </div>
    </div>
</div>
