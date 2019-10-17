@extends('admin.layouts.main', ['activePage' => 'contact', 'title' => __('Change Password')])
@section('content')
        <!-- Content -->
        <div id="main-content">
          <div class="container-fluid" style="background: #e5e5e5;">
            <div class="row justify-content-center">
             <div class="col-6">
              <form id="change-password-form" method="POST" action="{{ route('password.change') }}">
                @csrf

                <h1>ĐỔI MẬT KHẨU</h1>
                @if($errors->any())
                  <div class="alert alert-danger">{{ $errors->first() }}</div>
                @endif
                @if(Session::has('fail'))
                  <div class="alert alert-danger">{{ Session::get('fail')}}</div>
                @endif
                
                <div class="form-group">
                 <label for="">Mật khẩu cũ</label>
                 <input type="password" name="oldpass" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="">Mật khẩu mới</label>
                  <input type="password" name="newpass" class="form-control" required>
                 </div>
                 <div class="form-group">
                   <label for="">Nhập lại mật khẩu mới</label>
                   <input type="password" name="re-newpass" class="form-control" required>
                  </div>
                 <div class="form-group d-flex">
                   <button type="submit" href="#" class="btn ml-auto btn-primary float-right">Save</button>
                 </div>
              </form>
              <h5>Chú ý:</h5>
              <p>Sau khi thay đổi mật khẩu thành công, bạn phải đăng nhập lại hệ thống</p>
             </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    @endsection