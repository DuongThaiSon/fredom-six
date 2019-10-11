@extends('admin.layouts.main', ['activePage' => 'dashboard', 'title' => __('Dashboard')])
@section('content')
<!-- Content -->
<div id="main-content">
  <div class="container-fluid" style="background: #e5e5e5;">
      <form method="POST" action="{{ route('admin.setting.postSendMail')}}">
        @csrf
    <div id="content">
      <h1 class="mt-3 pl-4">
        THIẾT LẬP GỬI EMAIL
      </h1>
      <div class="save-group-buttons">
        <button class="btn btn-sm btn-dark"  data-toggle="tooltip" title="Lưu">
          <i class="material-icons">
            save
          </i>
        </button>
        <a
          class="btn btn-sm btn-dark"
          href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc?usp=sharing"
          target="_blank"
        >
          <i class="material-icons">
            help_outline
          </i>
        </a>
      </div>
      <!-- Form input -->
        @if($errors->any())
          <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif
        @if(Session::has('success'))
          <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
      <div class="bg-white mb-0 p-4 pt-5">
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label>SMTP server address</label>
              <input
                type="text"
                name="email_smtp_server"
                class="form-control"
                placeholder="smtp.gmail.com"
                value="{{ $setting->email_smtp_server }}"
              />
              <small class="form-text"
                >Địa chỉ STMP server là địa chỉ của host để gửi email.
                Với email là tài khoản của GOOGLE, chỉ cần nhập địa chỉ
                là "smtp.gmail.com". Đối với những tài khoản email khác,
                có thể nhập là: "mail.tenmien.com"</small
              >
            </div>
            <div class="form-group">
              <label>SMTP Port</label>
              <input
                type="text"
                name="email_smtp_port"
                required
                class="form-control"
                placeholder=""
                value="{{ $setting->email_smtp_port }}"
              />
              <small class="form-text"
                >Cổng SMTP để gửi email. Với tài khoản google thì nhập
                cổng 465, với email server khác thì để là 25 hoặc 465
                tùy theo cấu hình của email server</small
              >
            </div>
            <div class="form-group">
              <label>Username</label>
              <input
                type="text"
                name="email_smtp_user"
                required
                class="form-control"
                placeholder="Địa chỉ"
                value="{{ $setting->email_smtp_user }}"
              />
              <small class="form-text">Username đăng nhập email</small>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input
                type="password"
                name="email_smtp_pass"
                required
                class="form-control"
                placeholder=""
                value="{{ $setting->email_smtp_pass }}"
              />
              <small class="form-text"
                >Mật khẩu của tài khoản gửi email</small
              >
            </div>
            <div class="form-group">
              <label>Tên tài khoản gửi đi</label>
              <input
                type="text"
                name="email_smtp_name"
                required
                class="form-control"
                placeholder="LEOTIVE"
                value="{{ $setting->email_smtp_name }}"
              />
              <small class="form-text"
                >Khi một email được gửi đi, tên này sẽ được hiển thị như
                tên người gửi</small
              >
            </div>
            <div class="form-group">
              <label>Địa chỉ email gửi đi</label>
              <input
                type="text"
                name="email_smtp_email_address"
                required
                class="form-control"
                placeholder="no-reply@leotive.com"
                value="{{ $setting->email_smtp_email_address}}"
              />
              <small class="form-text"
                >Có thể thay đổi địa chỉ email gửi đi, thiết lập này chỉ
                có tác dụng với các server email thông thường, không áp
                dụng cho server của Google</small
              >
            </div>
          </div>
        </div>
      </div>
      </form>
      <!-- End form-input -->
    </div>
  </div>
@endsection