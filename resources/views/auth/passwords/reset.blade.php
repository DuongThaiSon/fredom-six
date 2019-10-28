@extends('admin.auth.layouts.main')
@section('content')
        <div id="confirm-email">
            <img class="logo-icon-login" src="/assets/admin/img/icon/logo-login.png" alt="">
            <img class="leotive" src="/assets/admin/img/icon/leotive.png" alt="">
            <p class="title"> Admin Change Password </p>
            <form method="POST" action="{{ route('admin.password.request')}}">
            {{-- {{ csrf_field() }} --}}
            @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="row form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                    <label for="exampleInputPassword1"><img src="img/icon/lock_outline_24px_rounded.svg" alt=""> Email</label>
                    <input id="mail" type="email" class="form-control" name="email" value="{{ $email or old('email')}}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <img class="pw" src="img/icon/hide-password.png" alt="">
                </div>
                 <div class="row form-group{{ $errors->has('password') ? ' has-error' : '' }}" id="reset-pass">
                    <label for="exampleInputPassword1"><img src="img/icon/lock_outline_24px_rounded.svg" alt=""> New-Password</label>
                    <input id="pw" type="password" class="form-control" name="password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <img class="pw" src="img/icon/hide-password.png" alt="">
                </div>

                <div class="row form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}" id="reset-repass">
                    <label for="exampleInputPassword1"><img src="img/icon/lock_outline_24px_rounded.svg" alt=""> Re-Password</label>
                    <input id="pw" type="password" class="form-control" name="password_confirmation" required>
                     @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                    <img class="pw" src="img/icon/hide-password.png" alt="">
                </div>
                    <button type="submit" class="change-pass text-center text-white font-weight-bold">Đổi mật khẩu</button>
            </form>
        </div>
@endsection
