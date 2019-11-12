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
            <h2 class="text-center mt-4 mb-3">Lấy lại mật khẩu</h2>
            <p>Vui lòng điền vào email để lấy lại mật khẩu</p>
            <!-- Form -->
            <form class="mt-4 mb-0" action="" method="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Email *</label>
                    <input id="email-field" type="email" class="form-control border-secondary" required name="email" />
                </div>
                <button type="submit" class="btn btn-dark mb-3">Đăng Nhập</button>
                <div class="clear"></div>
            </form>
            <!-- End Form -->
        </div>
    </div>
</div>
@endsection