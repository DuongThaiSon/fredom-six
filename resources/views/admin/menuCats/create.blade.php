@extends('admin.layouts.main', ['activePage' => 'articleCats', 'title' => __('Detail Menu')])
@section('content')
        <div class="navbar-top fixed-top bg-white">
          <!-- Search Bar -->
          <div class="nav-search float-left align-middle">
            <form class="form-inline md-form form-sm">
              <i class="material-icons text-secondary">
                search
              </i>
              <input
                class="form-control form-control-sm bg-white"
                type="text"
                placeholder="Search"
                aria-label="Search"
              />
            </form>
          </div>

          <!-- Navbar-nav -->
          <div class="float-right right-top-bar">
            <span>Quản trị nội dung</span>
            <div class="btn-group dropdown">
              <button
                type="button"
                class="btn bg-white dropdown-toggle text-capitalize"
                id="dropdownMenuButton"
                data-toggle="dropdown"
              >
                Tiêng Việt
              </button>
              <div class="dropdown-menu">
                <a href="" class="dropdown-item">English</a>
                <a href="" class="dropdown-item">Tiếng Việt</a>
              </div>
            </div>

            <div class="btn-group dropdown">
              <button
                type="button"
                class="btn bg-white dropdown-toggle text-capitalize"
                id="dropdownMenuButton"
                data-toggle="dropdown"
              >
                Leotive
              </button>
              <div class="dropdown-menu">
                <a href="" class="dropdown-item">Thay đổi thông tin cá nhân</a>
                <a href="" class="dropdown-item">Đổi mật khẩu</a>
                <a href="signin.html" class="dropdown-item">Thoát</a>
              </div>

              <a href="signin.html" class="btn btn-sm" id="power-button">
                <i class="material-icons">
                  settings_power
                </i>
              </a>
            </div>
          </div>
        </div>

        <!-- Content -->
        <div id="main-content">
          <div class="container-fluid" style="background: #e5e5e5;">
            <div id="content">
            <form action="{{ route('admin.menu-categories.store') }}" method="POST" enctype="multipart/form-data" class="bg-white mb-0 p-4 pt-5">
                @csrf
              <h1 class="mt-3 pl-4">THÔNG TIN DANH MỤC MENU</h1>
              <div class="save-group-buttons">
                  <button name="submit" class="btn btn-sm btn-dark">
                    <i class="material-icons">
                      save
                    </i>
                  </button>
                  <a
                    class="btn btn-sm btn-dark"
                    href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc?usp=sharing"
                    target="_blank"
                  >
                    <i class="material-icons">
                      help_outline
                    </i>
                  </a>
                </div>
              
                
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label class="control-label">Tên danh mục menu</label>
                      <input type="text" id="name" name="name" class="form-control" placeholder="Tên danh mục" required />
                      <small class="form-text"
                        >Đặt tên cho danh mục menu</small
                      >
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
@endsection     