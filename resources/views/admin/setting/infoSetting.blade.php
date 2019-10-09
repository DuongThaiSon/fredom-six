<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- MATERIAL ICON -->
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <!-- BOOTSWATCH -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/lux/bootstrap.min.css"
      integrity="sha256-2AE13SXoJY6p0WSPAlYEZpalYyQ1NiipAwSt3s60n8M="
      crossorigin="anonymous"
    />
    <!-- FONT -->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto&display=swap"
      rel="stylesheet"
    />
    <!-- STYLE -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/css/style.css" />
    <title>Document</title>
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <section id="sidebar" class="d-flex flex-column">
        <div class="sidebar-header">
          <a href="admin.html">
            <img src="img/logo.webp" alt="" />
          </a>
        </div>

        <div class="left-menu">
          <ul class="nav flex-column">
            <!-- Dashboard -->
            <li class="nav-item">
              <a href="admin.html" class="nav-link" id="menu-dashboard">
                <i class="material-icons align-middle">dashboard</i><span>Tổng quan hệ
                  thống</span>
              </a>
            </li>

            <!-- Product -->
            <li class="nav-item has-child">
              <a
                href="#submenu1"
                data-toggle="collapse"
                data-target="#submenu1"
                class="nav-link collapsed"
              >
                <i class="material-icons align-middle">group_work</i><span>Sản phẩm</span>
              </a>
              <div class="sub collapse" id="submenu1">
                <ul class="flex-column nav">
                  <li class="nav-item">
                    <a href="productDetail.html" class="nav-link"
                      >Tạo mới sản phẩm</a
                    >
                  </li>
                  <li class="nav-item">
                    <a href="product.html" class="nav-link">Quản lý sản phẩm</a>
                  </li>
                  <li class="nav-item">
                    <a href="productcatDetail.html" class="nav-link"
                      >Thêm mới danh mục sản phẩm</a
                    >
                  </li>
                  <li class="nav-item">
                    <a href="productcat.html" class="nav-link"
                      >Quản lý danh mục sản phẩm</a
                    >
                  </li>
                </ul>
              </div>
            </li>
            <!-- News -->

            <li class="nav-item has-child">
              <a
                href="#submenu2"
                data-toggle="collapse"
                data-target="#submenu2"
                class="nav-link collapsed"
              >
                <i class="material-icons align-middle">dvr</i><span>Tin bài</span>
              </a>
              <div class="sub collapse" id="submenu2">
                <ul class="flex-column nav">
                  <li class="nav-item">
                    <a href="detail.html" class="nav-link">Tạo bài mới</a>
                  </li>
                  <li class="nav-item">
                    <a href="article.html" class="nav-link">Quản lý tin bài</a>
                  </li>
                  <li class="nav-item">
                    <a href="articlecatDetail.html" class="nav-link"
                      >Thêm mới danh mục tin bài</a
                    >
                  </li>
                  <li class="nav-item">
                    <a href="articlecat.html" class="nav-link"
                      >Quản lý danh mục tin bài</a
                    >
                  </li>
                </ul>
              </div>
            </li>

            <!-- ALBUM -->
            <li class="nav-item has-child">
              <a
                href="#gallerysubmenu"
                data-toggle="collapse"
                data-target="#gallerysubmenu"
                class="nav-link collapsed"
              >
                <i class="material-icons align-middle">collections</i><span>Slide &
                  Album ảnh</span>
              </a>
              <div class="sub collapse" id="gallerysubmenu">
                <ul class="flex-column nav">
                  <li class="nav-item">
                    <a href="galleryDetail.html" class="nav-link">
                      Tạo album ảnh mới</a
                    >
                  </li>
                  <li class="nav-item">
                    <a href="gallery.html" class="nav-link">
                      Quản lý album ảnh</a
                    >
                  </li>
                  <li class="nav-item">
                    <a href="gallerycatDetail.html" class="nav-link">
                      Thêm mới danh mục album ảnh</a
                    >
                  </li>
                  <li class="nav-item">
                    <a href="gallerycat.html" class="nav-link">
                      Quản lý danh mục album ảnh</a
                    >
                  </li>
                </ul>
              </div>
            </li>
            <!-- Video -->
            <li class="nav-item has-child">
              <a
                href="#videosubmenu"
                data-toggle="collapse"
                data-target="#videosubmenu"
                class="nav-link collapsed"
              >
                <i class="material-icons align-middle">video_library</i><span>Video</span>
              </a>
              <div class="sub collapse" id="videosubmenu">
                <ul class="flex-column nav">
                  <li class="nav-item">
                    <a href="videoDetail.html" class="nav-link"
                      >Tạo video mới</a
                    >
                  </li>
                  <li class="nav-item">
                    <a href="video.html" class="nav-link">Quản lý video</a>
                  </li>
                  <li class="nav-item">
                    <a href="videocatDetail.html" class="nav-link"
                      >Thêm mới danh mục video</a
                    >
                  </li>
                  <li class="nav-item">
                    <a href="videocat.html" class="nav-link"
                      >Quản lý danh mục video</a
                    >
                  </li>
                </ul>
              </div>
            </li>
            <!-- Order -->
            <li class="nav-item">
              <a href="order.html" class="nav-link" id="menu-order">
                <i class="material-icons align-middle">shopping_cart</i><span>Đặt hàng</span>
              </a>
            </li>
            <!-- Language -->
            <li class="nav-item">
              <a href="language.html" class="nav-link" id="menu-language">
                <i class="material-icons align-middle">language</i><span>Ngôn ngữ</span>
              </a>
            </li>

            <!--Contact-->
            <li class="nav-item">
              <a href="contact.html" class="nav-link" id="menu-contact">
                <i class="material-icons align-middle">chat_bubble_outline</i
                ><span>Liên hệ</span>
              </a>
            </li>

            <!-- Component -->
            <li class="nav-item">
              <a href="component.html" class="nav-link" id="menu-component">
                <i class="material-icons align-middle">picture_in_picture</i
                ><span>Thành phần tĩnh</span>
              </a>
            </li>

            <!-- Menu -->
            <li class="nav-item has-child">
              <a
                data-toggle="collapse"
                data-target="#menusubmenu"
                href="#menusubmenu"
                class="nav-link collapsed"
                ><i class="material-icons align-middle">menu</i><span>Menu</span></a
              >
              <div class="sub collapse" id="menusubmenu">
                <ul class="flex-column nav">
                  <li class="nav-item">
                    <a href="menucatDetail.html" class="nav-link"
                      >Tạo menu mới</a
                    >
                  </li>
                  <li class="nav-item">
                    <a href="menucat.html" class="nav-link">Quản lý menu</a>
                  </li>
                </ul>
              </div>
            </li>

            <!-- Admin -->
            <li class="nav-item has-child">
              <a
                data-toggle="collapse"
                data-target="#menu-admin-user"
                href="#menu-admin-user"
                class="nav-link collapsed"
                ><i class="material-icons align-middle">face</i><span>Quản trị viên và
                  người dùng</span></a
              >
              <div class="sub collapse" id="menu-admin-user">
                <ul class="flex-column nav">
                  <li class="nav-item">
                    <a href="info.html" class="nav-link"
                      >Thêm mới quản trị viên & người dùng</a
                    >
                  </li>
                  <li>
                    <a href="user.html" class="nav-link"
                      >Danh sách quản trị viên</a
                    >
                  </li>
                  <li>
                    <a href="#" class="nav-link">Danh sách người dùng</a>
                  </li>
                </ul>
              </div>
            </li>

            <!-- File -->
            <li class="nav-item">
              <a href="file.html" class="nav-link" id="menu-dashboard">
                <i class="material-icons align-middle"
                  >settings_system_daydream</i
                ><span>Quản lý file</span>
              </a>
            </li>

            <!-- Setting -->
            <li class="nav-item has-child">
              <a
                data-toggle="collapse"
                data-target="#setting-sub-menu"
                href="#setting-sub-menu"
                class="nav-link collapsed active"
                ><i class="material-icons">
                  settings </i
                ><span>Thiết lập hệ thống</span></a
              >
              <div class="sub collapse" id="setting-sub-menu">
                <ul class="flex-column nav">
                  <li class="nav-item active">
                    <a href="infoSetting.html" class="nav-link">Thông tin</a>
                  </li>
                  <li class="nav-item">
                    <a href="seo.html" class="nav-link">Tối ưu SEO trang chủ</a>
                  </li>
                  <li class="nav-item">
                    <a href="sendmail.html" class="nav-link"
                      >Tài khoản gửi email</a
                    >
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">Sao lưu & Phục hồi dữ liệu</a>
                  </li>
                  <li class="nav-item">
                    <a href="emailcontent.html" class="nav-link"
                      >Nội dung email gửi đi</a
                    >
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>

        <!-- Toggle Sidebar -->
        <div class="toggle-button" id="sidebarCollapse">
          <a href="#">
            <img src="img/Subtract.png" class="mr-2" alt="" />
            Toggle sidebar</a
          >
        </div>
      </section>

      <!-- PAGE CONTENT -->
      <section id="page-content">
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
            <form method="POST" action="{{ route('admin.setting.postInfoSetting')}}">
                @csrf
            <div id="content">
              <h1 class="mt-3 pl-4">THIẾT LẬP THÔNG TIN</h1>
              <div class="save-group-buttons">
                <button
                  class="btn btn-sm btn-dark"
                  data-toggle="tooltip"
                  title="Lưu"
                >
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
              <!-- Form input -->
                @if($errors->any())
                  <div class="alert alert-danger">{{ $errors->first() }}</div>
                @endif
                @if(Session::has('success'))
                  <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
              <div class="bg-white mb-0 p-4 pt-5">
                <div class="row">
                    
                  <div class="col">
                    <div class="form-group">
                      <label>Tên miền</label>
                      <input
                        type="text"
                        name="company_website_url"
                        class="form-control"
                        placeholder="leotive.com"
                        value="{{ $setting->company_website_url }}"
                      />
                      <small class="form-text"
                        >Tên miền chính của website đang thực chạy</small
                      >
                    </div>
                    <div class="form-group">
                      <label>Tên công ty</label>
                      <input
                        type="text"
                        name="company_name"
                        required
                        class="form-control"
                        placeholder="The cat in the hat"
                        value="{{ $setting->company_name }}"

                      />
                      <small class="form-text"
                        >Tên công ty sở hữu website. Thông tin sẽ hiển thị trên
                        website</small
                      >
                    </div>
                    <div class="form-group">
                      <label>Địa chỉ</label>
                      <input
                        type="text"
                        name="company_address"
                        required
                        class="form-control"
                        placeholder="Địa chỉ"
                        value="{{ $setting->company_address }}"
                      />
                      <small class="form-text"
                        >Địa chỉ của công ty. Thông tin sẽ hiển thị trên
                        website</small
                      >
                    </div>
                    <div class="form-group">
                      <label>Điện thoại</label>
                      <input
                        type="text"
                        name="company_tel"
                        required
                        class="form-control"
                        placeholder="The cat in the hat"
                        value="{{ $setting->company_tel }}"
                      />
                      <small class="form-text"
                        >Điện thoại liên hệ tới công ty (Số máy bàn). Thông tin
                        sẽ hiển thị trên website</small
                      >
                    </div>
                    <div class="form-group">
                      <label>Hotline</label>
                      <input
                        type="text"
                        name="company_hotline"
                        required
                        class="form-control"
                        placeholder=""
                        value="{{ $setting->company_hotline }}"
                      />
                      <small class="form-text"
                        >Số điện thoại hotline. Thông tin sẽ hiển thị trên
                        website, có thể hiển thị đính kèm website và chạy theo
                        dọc trang web để khách hàng luôn nhìn thấy số
                        HOTLINE</small
                      >
                    </div>
                    <div class="form-group">
                      <label>Điện thoại di động</label>
                      <input
                        type="text"
                        name="company_mobile"
                        required
                        class="form-control"
                        placeholder="The cat in the hat"
                        value="{{ $setting->company_mobile }}"
                      />
                      <small class="form-text"
                        >Điện thoại liên hệ tới công ty (Số di động). Thông tin
                        sẽ hiển thị trên website</small
                      >
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input
                        type="text"
                        name="company_email"
                        required
                        class="form-control"
                        placeholder="hi@leotive.com"
                        value="{{ $setting->company_email }}"
                      />
                      <small class="form-text"
                        >Địa chỉ email chính của công ty. Thông tin sẽ hiển thị
                        trên website</small
                      >
                    </div>
                    <div class="form-group">
                      <label>Facebook</label>
                      <input
                        type="text"
                        name="company_facebook_url"
                        required
                        class="form-control"
                        placeholder="http://facebook.com/leotive"
                        value="{{ $setting->company_facebook_url }}"
                      />
                      <small class="form-text"
                        >Địa chỉ trang facebook của công ty. Thông tin sẽ hiển
                        thị trên website là một đường dẫn tới trang Facebook
                        Fanpage, thông tin này có thể sử dụng để thiết lập
                        Facebook Fanpage Likebox</small
                      >
                    </div>
                  </div>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- SCRIPT -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
    <!-- Jquery -->
    <script src="{{ asset('assets/admin') }}/js/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('assets/admin') }}/js/jquery-ui.js"></script>
    <script src="{{ asset('assets/admin') }}/js/main.js"></script>
    <script>
      $("#setting-sub-menu").addClass("show");
    </script>
  </body>
</html>
