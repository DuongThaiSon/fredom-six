<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
     <!-- Fonts and icons -->
     <link rel="shortcut icon" href="{{ asset('assets/admin') }}/favicon.ico">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
     <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"/>
     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
     <!-- CSS Files -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/lux/bootstrap.min.css" integrity="sha256-2AE13SXoJY6p0WSPAlYEZpalYyQ1NiipAwSt3s60n8M=" crossorigin="anonymous"/>
     <link rel="stylesheet" href="/assets/admin/css/filepond.min.css" />
     <link rel="stylesheet" href="/assets/admin/css/filepond-plugin-image-preview.min.css" />
     <link rel="stylesheet" href="/assets/admin/css/bootstrap-select.min.css" />
     <link rel="stylesheet" href="/assets/admin/css/jasny-bootstrap.min.css" />
     <link rel="stylesheet" href="/assets/admin/css/flatpickr.min.css" />
     <link rel="stylesheet" href="/assets/admin/css/croppie.css" />
     <link rel="stylesheet" href="/assets/admin/css/dataTables.bootstrap4.min.css" />
     <link rel="stylesheet" href="/assets/admin/vendor/fontawesome/css/all.min.css" />
     <link rel="stylesheet" href="/assets/admin/css/style.css" />
     <link rel="stylesheet" href="/assets/admin/css/main.css" />
     @stack('css')
</head>
<body>
    @auth('admin')
    {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form> --}}
    @include('admin.layouts.templates.auth')
    @endauth
    @guest('admin')
    @include('admin.layouts.templates.guest')
    @endguest

    <!-- SCRIPT -->
    <!-- Jquery -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script> --}}
    <script src="https://cdn.ckeditor.com/4.12.1/full-all/ckeditor.js"></script>
    {{-- <script src="/assets/admin/js/jquery-3.4.1.min.js"></script>
    <script src="/assets/admin/js/jquery-ui.js"></script> --}}
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"
    ></script>
    @include('ckfinder::setup')
    <script type="text/javascript" src="/assets/admin/js/main.js"></script>
    {{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script> --}}

    @stack('js')
</body>
</html>
