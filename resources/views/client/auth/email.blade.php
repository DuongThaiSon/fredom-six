@extends('client.layouts.main', ['title' => __('Forgot Password')])
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
            <h2 class="text-center mt-4 mb-3">Lấy lại mật khẩu</h2>
            <p>Vui lòng điền vào email để lấy lại mật khẩu</p>
            <!-- Form -->
            <form class="mt-4 mb-0" action="{{ route('client.password.email')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Email *</label>
                    <input id="email-field" type="email" class="form-control border-secondary" required name="email" />
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                </div>
                <button type="submit" class="btn btn-dark mb-3">Lấy lại mật khẩu</button>
                <div class="clear"></div>
            </form>
            <!-- End Form -->
        </div>
    </div>
</div>
@endsection