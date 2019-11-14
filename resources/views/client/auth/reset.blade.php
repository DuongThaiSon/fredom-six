@extends('client.layouts.main', ['title' => __('Thay đổi mật khẩu')])
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
            <h2 class="text-center mt-4 mb-3">Đăng ký</h2>
            <!-- Form -->
            <form class="mt-4 mb-0" action="{{ route('client.password.request')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                @if($errors->any())
                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                @endif
                <div class="form-group">
                    <label for="">Email *</label>
                    <input id="email-field" type="email" class="form-control border-secondary" required name="email"  />
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Mật khẩu *</label>
                    <input type="password" class="form-control border-secondary" required name="password" />
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group mt-4 mb-3">
                    <label for="">Nhập lại mật khẩu *</label>
                    <input type="password" class="form-control border-secondary" required name="password_confirmation" />
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                
                <button type="submit" class="btn btn-dark mb-3">Thay đổi mật khẩu</button>
                <div class="clear"></div>
            </form>
            <!-- End Form -->
        </div>
    </div>
</div>
@endsection