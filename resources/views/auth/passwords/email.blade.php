@extends('admin.auth.layouts.main')
@section('content')
        <div id="login">
            <img class="logo-icon-login" src="/assets/admin/img/icon/logo-login.png" alt="">
            <img class="leotive" src="/assets/admin/img/icon/leotive.png" alt="">
            <p class="title"> Admin Forgot Password </p>
            @if (session('status'))
                <div class="aler alert-success">
                    {{ session('status')}}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email')}}">
            @csrf
                <div class="form-group {{$errors->has('email') ? ' has-error' : ''}}" id="email">
                    <label for="exampleInputEmail1"><img src="img/icon/mail_outline_24px_rounded.svg" alt=""> Email address</label>
                    <input id="mail" type="email" class="form-control" name="email"  value="{{ old('email') }}" required>
                    <img class="mail" src="img/icon/highlight_off_24px.png" alt="">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                    <a href="{{route('admin.login.showLoginForm')}}" class=" float-right fg-lg">Đăng Nhập</a>
                    <button type="submit" class="send-mail text-center text-white font-weight-bold">Yêu Cầu Khôi Phục mật khẩu</button>
            </form>
        </div>
   @endsection
