@extends('client.layouts.main', ['title' => __('Login')])
@section('content')
<style>
    #login-form{
        margin: 100px auto 0 auto;
    }
    .form-login{
        width: 400px;
    }
</style>
<div class="d-flex">
    <!-- Logo -->
    <div id="logo">
        <img src="img/Group.png" alt="" />
    </div>

    <!-- Login -->
    <div id="login-form" >
        <div class="form form-login" >
            <h2 class="text-center mt-4 mb-3">Đăng nhập</h2>
            <!-- Form -->
            <form class="mt-4 mb-0" action="{{ route('client.login.login') }}" method="POST">
                @csrf
                @if ($errors->any())
                <div class="alert-danger">
                    {{ $errors->first() }}
                </div>
                @endif
                <div class="form-group">
                    <label for="">Email *</label>
                    <input id="email-field" type="email" class="form-control border-secondary" required name="email" />
                </div>
                <div class="form-group mt-4 mb-3">
                    <label for="">Mật khẩu *</label>
                    <input id="password-field" type="password" class="form-control border-secondary" required name="password" />
                </div>
                <div>
                    <label for="" class="mt-2">
                        <input type="checkbox" class="" value="">  Ghi nhớ
                    </label>
                    <a href="reset-password.html" class="btn mb-3 float-right">Quên mật khẩu?</a>
                </div>
                
                <button type="submit" class="btn btn-dark mb-3">Đăng Nhập</button>
                <div class="clear"></div>
            </form>
            <!-- End Form -->
        </div>
    </div>
</div>
@endsection