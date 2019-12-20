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
                    <h4>Admin Reset Password</h4>
                </div>
            </div>
            <form action="{{ route('admin.password.update') }}" method="POST">
                <div class="row">
                    @csrf
                    @if ($errors->any())
                    <div class="col-12">
                        <div class="alert alert-danger rounded p-2">
                            {{ $errors->first() }}
                        </div>
                    </div>
                    @endif
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="col-12 form-group mb-3">
                        <label for="input-email" class="mb-2">
                            <img src="/assets/admin/img/icon/mail_outline_24px_rounded.svg" alt="">&nbsp;<span class="text-dark font-weight-bold">Email</span>
                        </label>
                        <input id="input-email" type="email" name="email" class="form-control" aria-describedby="emailHelp" value="{{ old('email')}}" autofocus required>
                    </div>
                    <div class="col-12 form-group mb-3">
                        <label for="input-password" class="mb-2">
                            <img src="/assets/admin/img/icon/lock_outline_24px_rounded.svg" alt="">&nbsp;<span class="text-dark font-weight-bold">Password</span>
                        </label>
                        <div class="input-group">
                            <input id="input-password" type="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-12 form-group mb-3">
                        <label for="input-password-confirmation" class="mb-2">
                            <img src="/assets/admin/img/icon/lock_outline_24px_rounded.svg" alt="">&nbsp;<span class="text-dark font-weight-bold">Password Confirmation</span>
                        </label>
                        <div class="input-group">
                            <input id="input-password-confirmation" type="password" name="password_confirmation" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-12 form-group my-3 text-right">
                        <a class="font-weight-bold btn btn btn-secondary rounded mr-2" href="{{ route('admin.password.request') }}">Đăng Nhập</a>
                        <button type="submit" class="text-white font-weight-bold btn btn-primary rounded">Cập nhật</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
