@extends('admin.layouts.main', ['title' => __('Forgot Password')])
@section('content')
<div class="container">
    <div class="row">
        <div class="bg-white mx-auto border rounded-lg col-6 shadow p-4">
            <div class="row mb-3">
                <div class="col-4">
                    <img class="w-25" src="/assets/admin/img/logo_with_text_bottom.png" alt="">
                </div>
                <div class="col-8 d-flex align-items-center">
                    <h4>Admin Forgot Password</h4>
                </div>
            </div>
            <form action="{{ route('admin.password.email') }}" method="POST">
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
                        <label for="input-email" class="mb-2">
                            <img src="/assets/admin/img/icon/mail_outline_24px_rounded.svg" alt="">&nbsp;<span class="text-dark font-weight-bold">Email</span>
                        </label>
                        <input id="input-email" type="email" name="email" class="form-control" aria-describedby="emailHelp" value="{{ old('email')}}" autofocus>
                    </div>
                    <div class="col-12 form-group my-3 text-right">
                        <a class="font-weight-bold btn btn btn-secondary rounded mr-2" href="{{ route('admin.login.showLoginForm') }}">Đăng Nhập</a>
                        <button type="submit" class="text-white font-weight-bold btn btn-primary rounded">Đặt lại mật khẩu</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
