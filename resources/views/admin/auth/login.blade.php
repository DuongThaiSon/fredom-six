@extends('admin.layouts.main', ['title' => __('Login')])
@section('content')
<div class="container">
    <div class="row">
        <div class="bg-white mx-auto border rounded-lg col-6 shadow p-4">
            <div class="row mb-3">
                <div class="col-4">
                    <img class="w-25" src="/assets/admin/img/logo_with_text_bottom.png" alt="">
                </div>
                <div class="col-8 d-flex align-items-center">
                    <h4>Admin Panel Login</h4>
                </div>
            </div>
            <form action="{{ route('admin.login.showLoginForm') }}" method="POST">
                <div class="row">
                    @csrf
                    @if ($errors->any())
                    <div class="col-12">
                        <div class="alert alert-danger rounded p-2">
                            {{ $errors->first() }}
                        </div>
                    </div>
                    @endif
                    <div class="col-12 form-group mb-3">
                        <label for="input-email" class="mb-2 d-flex align-items-center">
                            <i class="far fa-envelope" style="font-size: 1.3rem;"></i>&nbsp;<span class="text-dark font-weight-bold">Email</span>
                        </label>
                        <input id="input-email" type="email" name="email" class="form-control" aria-describedby="emailHelp" value="{{ old('email')}}" autofocus required tabindex="1">
                    </div>
                    <div class="col-12 form-group mb-3">
                        <label for="input-email" class="mb-2 d-flex align-items-center">
                            <i class="fas fa-lock" style="font-size: 1.3rem;"></i>&nbsp;<span class="text-dark font-weight-bold">Password</span>
                        </label>
                        <div class="input-group">
                            <input id="input-password" type="password" name="password" class="form-control" required tabindex="2">
                            <div class="input-group-append">
                                <a class="input-group-text" id="toggle-reveal-password" tabindex="5">
                                    <i class="material-icons">remove_red_eye</i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 form-group my-3 text-right">
                        <a class="font-weight-bold btn btn btn-secondary rounded mr-2" href="{{ route('admin.password.request') }}" tabindex="4">Quên mật khẩu</a>
                        <button type="submit" class="text-white font-weight-bold btn btn-primary rounded" tabindex="3">Đăng Nhập</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('css')
<link rel="stylesheet" href="/assets/admin/css/login.css">
@endpush

@push('js')
<script>
$(document).ready(function() {
    $('#toggle-reveal-password').click(function(e) {
        e.preventDefault();
        var x = document.getElementById("input-password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    });
});
</script>
@endpush
