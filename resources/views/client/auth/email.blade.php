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
    <!-- Login -->
    <div id="login-form" >
        <div class="form form-login" >
            <h2 class="text-center mt-4 mb-3">Lấy lại mật khẩu</h2>
            <p>Vui lòng điền vào email để lấy lại mật khẩu</p>
            <!-- Form -->
            <form class="mt-4 mb-0" action="{{ route('client.password.email')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if ($errors->has('email'))
                <div class="alert alert-danger">Email của bạn không đúng</div>
                </span>
                @endif
                @if(Session::has('status'))
                <div class="alert alert-success text-center">Vui lòng kiểm tra email của bạn</div>
                @endif
                <div class="form-group">
                    <label for="">Email *</label>
                    <input id="email-field" type="email" class="form-control border-secondary" required name="email" />
                </div>
                <button type="submit" class="btn btn-dark mb-3">Lấy lại mật khẩu</button>
                <div class="clear"></div>
            </form>
            <!-- End Form -->
        </div>
    </div>
</div>
@endsection