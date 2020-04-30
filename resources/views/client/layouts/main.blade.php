<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/themify-icons.css">
    <script src="https://kit.fontawesome.com/540cf737fa.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/aos.css">
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/slick.css">
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/style.css">
</head>

<body>
    <div class="site-wrap">
        @include('client.layouts.header')
        @yield('content')
        @include('client.layouts.footer')
    </div>
    <script src="{{ asset('assets/client') }}/js/jquery.min.js"></script>
    <script src="{{ asset('assets/client') }}/js/popper.min.js"></script>
    <script src="{{ asset('assets/client') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/client') }}/js/slick.min.js"></script>
    <script src="{{ asset('assets/client') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('assets/client') }}/js/aos.js"></script>
    <script src="{{ asset('assets/client') }}/js/accounting.min.js"></script>
    <script src="{{ asset('assets/client') }}/js/jquery.lazyload-any.js"></script>
    <script src="{{ asset('assets/client') }}/js/script.js"></script>
    @stack('js')
</body>

</html>
