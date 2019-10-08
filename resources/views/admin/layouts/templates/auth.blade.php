
@include('admin.layouts.sidebar')
<section id="page-content">
    @include('admin.layouts.nav') 
    @yield('content')
    @include('admin.layouts.footers.auth')
</section>
