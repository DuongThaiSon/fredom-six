<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="title" content="{{ $settings->seo_page_title ?? ''}}" />
    <meta name="keywords" content="{{ $settings->seo_meta_keywords ?? ''}}">
    <meta name="description" content="{{ $settings->seo_meta_des ?? '' }}">
    <meta name="author" content="{{ $settings->seo_meta_author ?? '' }}">
    <meta name="copyright" content="{{ $settings->seo_meta_copyright ?? '' }}"/>
    <meta http-equiv="content-language" content="vi" />
    <title>{{ $title }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/client') }}/favicon.ico">
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/aos.css" />
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/animate.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/client') }}/css/slick.css" />
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/style.css" />
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/pages.css" />
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/responsive.css" />
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/star-rating.css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    @stack('css')
</head>

<body>
    <!-- header -->

    @include('client.layouts.header.header')

    <!-- contact -->
    @yield('content')

    @include('client.layouts.footer.footer')
    
    <script src="{{ asset('assets/client') }}/js/jquery.min.js"></script>
    <script src="{{ asset('assets/client') }}/js/popper.min.js"></script>
    <script src="{{ asset('assets/client') }}/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/client') }}/js/slick.min.js"></script>
    <script src="https://kit.fontawesome.com/969fc0c091.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/client') }}/js/aos.js"></script>
    <script src="{{ asset('assets/client') }}/js/owl.carousel.js"></script>
    <script src="{{ asset('assets/client') }}/js/script.js"></script>
    
    @stack('js')

    @forelse ($scripts as $script)
    {!! $script->script !!}
    @empty
    @endforelse
</body>

</html>
