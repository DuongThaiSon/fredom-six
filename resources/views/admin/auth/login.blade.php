{{-- <form class="form-group" action="/admin/login" method="POST">
        @csrf
    @if ($errors->any())
        <div class="alert-danger">
            {{ $errors->first() }}
        </div>
    @endif
    <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="E-mail" required>
    <input class="form-control" type="password" name="password" value="" placeholder="Password" required>
    <button type="submit" class="btn">Login</button>
    
</form> --}}

@extends('admin.auth.layouts.main')
@section('content')
<div id="login">
            <img class="logo-icon-login" src="/assets/admin/img/icon/logo-login.png" alt="">
            <img class="leotive" src="/assets/admin/img/icon/leotive.png" alt="">
            <p class="title"> Admin Panel Login </p>
            <form role="form" action="/admin/login" method="POST">
            @csrf
             @if ($errors->any())
                <div class="alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif
                <div class="form-group" id="email">
                    <label for="exampleInputEmail1"><img src="/assets/admin/img/icon/mail_outline_24px_rounded.svg" value={{ old('email')}} alt=""> Email address</label>
                    <input id="mail" type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="email">
                    <img class="mail" src="/assets/admin/img/icon/highlight_off_24px.png" alt="">
                </div>
                <div class="form-group" id="pass">
                    <label for="exampleInputPassword1"><img src="/assets/admin/img/icon/lock_outline_24px_rounded.svg" alt=""> Password</label>
                    <input id="pw" type="password" name="password" class="form-control" placeholder="Password">
                    <img class="pw" src="/assets/admin/img/icon/hide-password.png" alt="">
                </div>
                    <button type="submit" class="float-right lg text-white font-weight-bold">Đăng Nhập</button>
                    <a class="forget float-right text-center text-white font-weight-bold" href="{{ route('password.request') }}">Quên mật khẩu</a>
            </form>
        </div>
 @endsection       