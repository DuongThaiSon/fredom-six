@extends('client.layouts.main', ['title' => __('Đăng ký')])
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
            <h2 class="text-center mt-4 mb-3">Đăng ký</h2>
            <!-- Form -->
            <form class="mt-4 mb-0" action="{{ route('client.register.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($errors->any())
                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                @endif
                <div class="form-group">
                    <label for="name">Họ và tên *:</label>
                    <input type="name" class="form-control border-secondary" required name="name"  />
                </div>
                <div class="form-group">
                    <label for="gender">Giới tính:</label>
                    <input type="radio" class="border-secondary ml-3" name="gender" value="1"/>Nam                    
                    <input type="radio" class="border-secondary ml-3" name="gender" value="0" />Nữ
                </div>
                <div class="form-group">
                    <label for="email">Email *:</label>
                    <input id="email-field" type="email" class="form-control border-secondary" required name="email" />
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu *:</label>
                    <input id="password-field" type="password" class="form-control border-secondary" required name="password" />
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại *:</label>
                    <input id="phone-field" type="number" class="form-control border-secondary" required name="phone" />
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ:</label>
                    <input id="address-field" type="text" class="form-control border-secondary"  name="address" />
                </div>
                
                <div class="form-group">
                    <label for="birthday">Ngày sinh:</label>
                    <input id="birthday-field" type="date" class="form-control border-secondary"  name="birthday" />
                </div>

                
                {{-- <div>
                <label for="" class="mt-2">
                    <input type="checkbox" class="" value=""> Nhận thông tin mới qua email
                </label>
                </div> --}}
                
                <button type="submit" class="btn btn-dark mb-3">Đăng ký</button>
                <div class="clear"></div>
            </form>
            <!-- End Form -->
        </div>
    </div>
</div>
@endsection