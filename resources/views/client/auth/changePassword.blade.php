@extends('client.layouts.main', ['title' => __('Change Password')])
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
            <h2 class="text-center mt-4 mb-3">Thay đổi mật khẩu</h2>
            <!-- Form -->
            <form class="mt-4 mb-0" action="{{ route('client.password.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($errors->any())
                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                @endif
                @if(Session::has('fail'))
                  <div class="alert alert-danger">{{ Session::get('fail')}}</div>
                @endif
                <div class="form-group">
                    <label for="">Mật khẩu cũ *</label>
                    <input type="password" name="oldpass" class="form-control border-secondary" required   />
                </div>
                <div class="form-group">
                    <label for="">Mật khẩu mới *</label>
                    <input type="password" name="newpass" class="form-control border-secondary" required>
                </div>
                <div class="form-group mt-4 mb-3">
                    <label for="">Nhập lại mật khẩu *</label>
                    <input type="password" name="re-newpass" class="form-control border-secondary" required>
                </div>
                {{-- <div>
                <label for="" class="mt-2">
                    <input type="checkbox" class="" value=""> Nhận thông tin mới qua email
                </label>
                </div> --}}
                
                <button type="submit" class="btn btn-dark mb-3">Thay đổi mật khẩu</button>
                <div class="clear"></div>
            </form>
            <h5 style="text-decoration: underline; font-style: italic">Chú ý:</h5>
            <p style="font-style: italic">Sau khi thay đổi mật khẩu thành công, bạn phải đăng nhập lại hệ thống</p>
            <!-- End Form -->
        </div>
    </div>
</div>
@endsection