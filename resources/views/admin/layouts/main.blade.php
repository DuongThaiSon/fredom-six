<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
     <!-- Fonts and icons -->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
     <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"/>
     <!-- CSS Files -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/lux/bootstrap.min.css" integrity="sha256-2AE13SXoJY6p0WSPAlYEZpalYyQ1NiipAwSt3s60n8M=" crossorigin="anonymous"/>
     <link rel="stylesheet" href="{{ asset('assets/admin') }}/css/style.css" />
     @stack('css')
</head>
<body>
    @auth
    {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form> --}}
    @include('admin.layouts.templates.auth')
    @endauth
    @guest
    @include('admin.layouts.templates.guest')
    @endguest

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
    <script type="text/javascript" src="{{ asset('assets/admin') }}/js/main.js"></script>
    @stack('js')
</body>
</html>