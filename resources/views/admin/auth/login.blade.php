@extends('admin.layouts.main', ['title' => __('Login')])
@section('content')
<div id="login">
            <img class="logo-icon-login" src="/assets/admin/img/icon/logo-login.png" alt="">
            <img class="leotive" src="/assets/admin/img/icon/leotive.png" alt="">
            <p class="title"> Admin Panel Login </p>
            @if(Session::has('win'))
                <div class="alert alert-success">{{ Session::get('win')}}</div>
            @endif
            <form role="form" action="/admin/login" method="POST">
            @csrf
             @if ($errors->any())
                <div class="alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif
                <div class="form-group" id="email">
                    <label for="exampleInputEmail1"><img src="/assets/admin/img/icon/mail_outline_24px_rounded.svg" value={{ old('email')}} alt=""> Email address</label>
                    <input id="mail" type="email" name="email" class="form-control" aria-describedby="emailHelp">
                    <img class="mail" src="/assets/admin/img/icon/highlight_off_24px.png" alt="">
                </div>
                <div class="form-group" id="pass">
                    <label for="exampleInputPassword1"><img src="/assets/admin/img/icon/lock_outline_24px_rounded.svg" alt=""> Password</label>
                    <input id="pw" type="password" name="password" class="form-control">
                    <img class="pw" src="/assets/admin/img/icon/hide-password.png" alt="">
                </div>
                    <button type="submit" class="float-right lg text-white font-weight-bold">Đăng Nhập</button>
                    <a class="forget float-right text-center text-white font-weight-bold" href="{{ route('password.request') }}">Quên mật khẩu</a>
            </form>
        </div>
 @endsection

 @push('css')
 <link rel="stylesheet" href="/assets/admin/css/login.css">
 @endpush

 @push('js')
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
 @endpush
