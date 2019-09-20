<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- bootstrap -->
    <link rel="stylesheet" href="/assets/admin/css/bootstrap.min.css">
    <!-- style -->
    <link rel="stylesheet" href="/assets/admin/css/login.css">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
    {{-- form --}}
        @yield('content');
    {{-- end form--}}
    </div>
     <!-- js -->
    <script src="/assets/admin/js/jquery-3.4.1.min.js"></script>
    <script src="/assets/admin/js/bootstrap.min.js"></script>
    <script src="/assets/admin/js/popper.min.js"></script>
    <script>
        $(Document).ready(function() {
          $('.pw').click(function() {
            var x = document.getElementById("pw");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
          });
        });
    </script>

</body>
</html>