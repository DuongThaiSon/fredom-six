<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/aos.css">
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/style.css">
    
    <title>{{ $title??'' }}</title>
</head>
<body>
    

    @yield('content')

    @include('client.layouts.footer')

    <script src="{{ asset('assets/client') }}/js/jquery.min.js"></script>
    <script src="{{ asset('assets/client') }}/js/popper.min.js"></script>
    <script src="{{ asset('assets/client') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/client') }}/js/three.min.js"></script>
    <script src="{{ asset('assets/client') }}/js/owl.carousel.js"></script>
    <script src="{{ asset('assets/client') }}/js/aos.js"></script>
    <script src="{{ asset('assets/client') }}/js/script.js"></script>
    @stack('js')
</body>