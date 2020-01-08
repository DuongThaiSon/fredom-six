<div class="wrapper">
    <!-- Sidebar -->
    <section id="sidebar" class="d-flex flex-column">
        <div class="sidebar-header">
            <a href="">
                <img src="{{ asset('assets/admin') }}/img/logo.webp" alt="logo" />
            </a>
        </div>

        <div class="left-menu">
            <ul class="nav flex-column">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard.index') }}" class="nav-link menu-dashboard" id="menu-dashboard">
                        <i class="material-icons align-middle">dashboard</i>
                        <span>Tổng quan hệ thống</span>
                    </a>
                </li>

                <!-- Product -->
                <li class="nav-item has-child">
                    <a href="#submenu1" data-toggle="collapse" data-target="#submenu1" class="nav-link collapsed">
                        <i class="material-icons align-middle">group_work</i><span>Sản phẩm</span>
                    </a>
                    <div class="sub collapse" id="submenu1">
                        <ul class="flex-column nav">
                            <li class="nav-item">
                                <a href="{{ route('admin.products.create') }}" class="nav-link menu-products-create">
                                    Tạo mới sản phẩm
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.products.index') }}" class="nav-link menu-products-index">
                                    Quản lý sản phẩm
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.product-attributes.index') }}"
                                    class="nav-link menu-product-attributes-index">
                                    Quản lý thuộc tính
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.product-categories.create') }}"
                                    class="nav-link menu-product-categories-create">
                                    Thêm mới danh mục sản phẩm
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.product-categories.index') }}"
                                    class="nav-link menu-product-categories-index">
                                    Quản lý danh mục sản phẩm
                                </a>
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
                                <a href="{{route('admin.articles.create')}}" class="nav-link menu-articles-create">
                                    Tạo bài mới
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.articles.index')}}" class="nav-link menu-articles">
                                    Quản lý tin bài
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.article-categories.create')}}"
                                    class="nav-link menu-articleCats-create">
                                    Thêm mới danh mục tin bài
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.article-categories.index')}}" class="nav-link menu-articleCats">
                                    Quản lý danh mục tin bài
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Slide & Album -->
                <li class="nav-item has-child">
                    <a href="#gallerysubmenu" data-toggle="collapse" data-target="#gallerysubmenu"
                        class="nav-link collapsed">
                        <i class="material-icons align-middle">collections</i>
                        <span>Slide & Album ảnh</span>
                    </a>
                    <div class="sub collapse" id="gallerysubmenu">
                        <ul class="flex-column nav">
                            <li class="nav-item">
                                <a href="{{ route('admin.galleries.create') }}" class="nav-link menu-galleries">
                                    Tạo album ảnh mới
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.galleries.index')}}" class="nav-link menu-galleries-manage">
                                    Quản lý album ảnh
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.gallery-categories.create')}}"
                                    class="nav-link menu-galleriesCat">
                                    Thêm mới danh mục album ảnh
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.gallery-categories.index')}}"
                                    class="nav-link menu-galleriesCat-manage">
                                    Quản lý danh mục album ảnh
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Video -->
                <li class="nav-item has-child">
                    <a href="#videosubmenu" data-toggle="collapse" data-target="#videosubmenu"
                        class="nav-link collapsed">
                        <i class="material-icons align-middle">video_library</i>
                        <span>Video</span>
                    </a>
                    <div class="sub collapse" id="videosubmenu">
                        <ul class="flex-column nav">
                            <li class="nav-item">
                                <a href="{{route('admin.videos.create')}}" class="nav-link">
                                    Tạo video mới
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.videos.index')}}" class="nav-link">
                                    Quản lý video
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.video-categories.create')}}" class="nav-link">
                                    Thêm mới danh mục video
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.video-categories.index')}}" class="nav-link">
                                    Quản lý danh mục video
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Order -->
                <li class="nav-item">
                    <a href="{{ route('admin.orders.index') }}" class="nav-link menu-cart" id="menu-order">
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
                    <a href="{{ route('admin.contacts.index')}}" class="nav-link" id="menu-contact">
                        <i class="material-icons align-middle">chat_bubble_outline</i><span>Liên hệ</span>
                    </a>
                </li>

                <!-- Component -->
                <li class="nav-item">
                    <a href="{{ route('admin.components.index')}}" class="nav-link" id="menu-component">
                        <i class="material-icons align-middle">picture_in_picture</i><span>Thành phần tĩnh</span>
                    </a>
                </li>

                <!-- Showroom -->
                <li class="nav-item">
                    <a href="{{ route('admin.showrooms.index')}}" class="nav-link" id="menu-showroom">
                        <i class="material-icons align-middle">ballot</i><span>Quản lý Showroom</span>
                    </a>
                </li>

                <!-- Menu -->
                <li class="nav-item has-child">
                    <a data-toggle="collapse" data-target="#menusubmenu" href="" class="nav-link collapsed"><i
                            class="material-icons align-middle">menu</i><span>Menu</span></a>
                    <div class="sub collapse" id="menusubmenu">
                        <ul class="flex-column nav">
                            <li class="nav-item">
                                <a href="{{ route('admin.menu-categories.create') }}"
                                    class="nav-link menu-menus-create">
                                    Tạo menu mới
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.menu-categories.index') }}"
                                    class="nav-link menu-menus-categories">
                                    Quản lý menu
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- User -->
                <li class="nav-item has-child">
                    <a data-toggle="collapse" data-target="#menu-admin-user" href="#menu-admin-user"
                        class="nav-link collapsed">
                        <i class="material-icons align-middle">face</i>
                        <span>Người dùng</span>
                    </a>
                    <div class="sub collapse" id="menu-admin-user">
                        <ul class="flex-column nav">
                            <li class="nav-item">
                                <a href="{{ route('admin.users.add')}}" class="nav-link">Thêm mới người dùng</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.users.admin')}}" class="nav-link">Danh sách thành viên</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- File -->
                <li class="nav-item">
                    <a href="{{ route('admin.files') }}" class="nav-link menu-files" id="menu-files">
                        <i class="material-icons align-middle">settings_system_daydream</i><span>Quản lý file</span>
                    </a>
                </li>

                <!-- Setting -->
                <li class="nav-item has-child">
                    <a data-toggle="collapse" data-target="#setting-sub-menu" href="#setting-sub-menu"
                        class="nav-link collapsed">
                        <i class="material-icons">settings</i>
                        <span>Cài đặt</span>
                    </a>
                    <div class="sub collapse" id="setting-sub-menu">
                        <ul class="flex-column nav">
                            <li class="nav-item">
                                <a href="{{ route('admin.settings.index') }}" class="nav-link menu-setting">
                                    Thiết lập hệ thống
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.seo-tools.index') }}" class="nav-link menu-seo-tools">
                                    Quản lý công cụ SEO
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.backups.index') }}" class="nav-link menu-backup">
                                    Sao lưu dữ liệu
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.email-contents.index') }}" class="nav-link menu-emailContent">
                                    Nội dung email gửi đi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.sitemap.index') }}" class="nav-link menu-sitemap">Sitemap</a>
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

<input type="hidden" id="page-id" value="{{ $activePage }}">
