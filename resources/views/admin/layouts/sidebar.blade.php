<div class="wrapper">
    <!-- Sidebar -->
    <section id="sidebar" class="d-flex flex-column">
        <div class="sidebar-header">
        <a href="admin.html">
            <img src="{{ asset('assets/admin') }}/img/logo.webp" alt="" />
        </a>
        </div>

        <div class="left-menu">
        <ul class="nav flex-column">
            <!-- Dashboard -->
            <li class="nav-item">
            <a href="admin.html" class="nav-link active" id="menu-dashboard">
                <i class="material-icons align-middle">dashboard</i><span>Tổng quan
                hệ thống</span>
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
                    <a href="productDetail.html" class="nav-link">Tạo mới sản phẩm</a>
                    </li>
                    <li class="nav-item">
                    <a href="product.html" class="nav-link">Quản lý sản phẩm</a>
                    </li>
                    <li class="nav-item">
                    <a href="productcatDetail.html" class="nav-link">Thêm mới danh mục sản phẩm</a>
                    </li>
                    <li class="nav-item">
                    <a href="productcat.html" class="nav-link">Quản lý danh mục sản phẩm</a>
                    </li>
                </ul>
                </div>
            </li>
            <!-- News -->

            <li class="nav-item has-child">
            <a href="#submenu2" data-toggle="collapse" data-target="#submenu2" class="nav-link collapsed">
                <i class="material-icons align-middle">dvr</i>
                <span>Tin bài</span>
            </a>
            <div class="sub collapse" id="submenu2">
                <ul class="flex-column nav">
                <li class="nav-item">
                    <a href="{{Route('admin.articles.create')}}" class="nav-link">Tạo bài mới</a>
                </li>
                <li class="nav-item">
                    <a href="{{Route('admin.articles.index')}}" class="nav-link">Quản lý tin bài</a>
                </li>
                <li class="nav-item">
                    <a href="{{Route('admin.article-cats.create')}}" class="nav-link">Thêm mới danh mục tin bài</a>
                </li>
                <li class="nav-item">
                    <a href="{{Route('admin.article-cats.index')}}" class="nav-link">Quản lý danh mục tin bài</a>
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
                    <a href="galleryDetail.html" class="nav-link"> Tạo album ảnh mới</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{Route('admin.gallery.index')}}" class="nav-link"> Quản lý album ảnh</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{Route('admin.gallery-cats.create')}}" class="nav-link">
                        Thêm mới danh mục album ảnh</a
                    >
                    </li>
                    <li class="nav-item">
                    <a href="{{Route('admin.gallery-cats.index')}}" class="nav-link"> Quản lý danh mục album ảnh</a>
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
                    <a href="{{Route('admin.videos.create')}}" class="nav-link">Tạo video mới</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{Route('admin.videos.index')}}" class="nav-link">Quản lý video</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{Route('admin.video-cats.create')}}" class="nav-link">Thêm mới danh mục video</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{Route('admin.video-cats.index')}}" class="nav-link">Quản lý danh mục video</a>
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
            <a href="{{ route('contact')}}" class="nav-link" id="menu-contact">
                <i class="material-icons align-middle">chat_bubble_outline</i><span>Liên hệ</span>
            </a>
            </li>

            <!-- Component -->
            <li class="nav-item">
            <a href="{{ route('admin.component.index')}}" class="nav-link" id="menu-component">
                <i class="material-icons align-middle">picture_in_picture</i><span>Thành phần tĩnh</span>
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
                    <a href="menucatDetail.html" class="nav-link">Tạo menu mới</a>
                </li>
                <li class="nav-item">
                    <a href="menucat.html" class="nav-link">Quản lý menu</a>
                </li>
                </ul>
            </div>
            </li>

            <!-- Admin -->
            <li class="nav-item has-child">
            <a data-toggle="collapse" data-target="#menu-admin-user" href="#menu-admin-user" class="nav-link collapsed">
                <i class="material-icons align-middle">face</i>
                <span>Quản trị viên và người dùng</span>
            </a>
            <div class="sub collapse" id="menu-admin-user">
                <ul class="flex-column nav">
                <li class="nav-item">
                    <a href="{{ route('user.add')}}" class="nav-link">Thêm mới quản trị viên & người dùng</a>
                </li>
                <li>
                    <a href="{{ route('user.admin')}}" class="nav-link">Danh sách quản trị viên</a>
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
                class="nav-link collapsed"
                ><i class="material-icons">settings</i><span>Thiết lập hệ thống</span></a
                >
                <div class="sub collapse" id="setting-sub-menu">
                <ul class="flex-column nav">
                    <li class="nav-item">
                    <a href="{{ route('admin.setting.infoSetting') }}" class="nav-link">Thông tin</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('admin.setting.seo') }}" class="nav-link">Tối ưu SEO trang chủ</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('admin.setting.sendMail') }}" class="nav-link">Tài khoản gửi email</a>
                    </li>
                    <li class="nav-item">
                    <a href="#" class="nav-link">Sao lưu & Phục hồi dữ liệu</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('admin.setting.emailContent') }}" class="nav-link">Nội dung email gửi đi</a>
                    </li>
                </ul>
                </div>
            </li>
        </ul>
        </div>

        <div class="toggle-button" id="sidebarCollapse">
        <a href="#"> <img src="{{ asset('assets/admin')}}/img/Subtract.png" class="mr-2" alt=""> Toggle sidebar</a>
        </div>
    </section>
</div>
