@extends('admin.layouts.main', ['activePage' => 'dashboard', 'title' => __('Dashboard')])
@section('content')
<!-- Content -->
<div id="main-content">
  <div class="container-fluid" style="background: #e5e5e5;">
    <form method="POST" action="{{ route('admin.setting.postInfoSetting')}}">
        @csrf
    <div id="content">
      <h1 class="mt-3 pl-4">THIẾT LẬP THÔNG TIN</h1>
      <div class="save-group-buttons">
        <button
          class="btn btn-sm btn-dark"
          data-toggle="tooltip"
          title="Lưu"
        >
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
              <label>Tên miền</label>
              <input
                type="text"
                name="company_website_url"
                class="form-control"
                placeholder="http://www.leotive.com"
                required
                value="{{ $setting->company_website_url }}"
              />
              <small class="form-text"
                >Tên miền chính của website đang thực chạy</small
              >
            </div>
            <div class="form-group">
              <label>Tên công ty</label>
              <input
                type="text"
                name="company_name"
                required
                class="form-control"
                placeholder="The cat in the hat"
                value="{{ $setting->company_name }}"

              />
              <small class="form-text"
                >Tên công ty sở hữu website. Thông tin sẽ hiển thị trên
                website</small
              >
            </div>
            <div class="form-group">
              <label>Địa chỉ</label>
              <input
                type="text"
                name="company_address"
                required
                class="form-control"
                placeholder="Địa chỉ"
                value="{{ $setting->company_address }}"
              />
              <small class="form-text"
                >Địa chỉ của công ty. Thông tin sẽ hiển thị trên
                website</small
              >
            </div>
            <div class="form-group">
              <label>Điện thoại</label>
              <input
                type="text"
                name="company_tel"
                class="form-control"
                placeholder="The cat in the hat"
                value="{{ $setting->company_tel }}"
              />
              <small class="form-text"
                >Điện thoại liên hệ tới công ty (Số máy bàn). Thông tin
                sẽ hiển thị trên website</small
              >
            </div>
            <div class="form-group">
              <label>Hotline</label>
              <input
                type="text"
                name="company_hotline"
                class="form-control"
                placeholder=""
                value="{{ $setting->company_hotline }}"
              />
              <small class="form-text"
                >Số điện thoại hotline. Thông tin sẽ hiển thị trên
                website, có thể hiển thị đính kèm website và chạy theo
                dọc trang web để khách hàng luôn nhìn thấy số
                HOTLINE</small
              >
            </div>
            <div class="form-group">
              <label>Điện thoại di động</label>
              <input
                type="text"
                name="company_mobile"
                class="form-control"
                placeholder="The cat in the hat"
                value="{{ $setting->company_mobile }}"
              />
              <small class="form-text"
                >Điện thoại liên hệ tới công ty (Số di động). Thông tin
                sẽ hiển thị trên website</small
              >
            </div>
            <div class="form-group">
              <label>Email</label>
              <input
                type="text"
                name="company_email"
                class="form-control"
                placeholder="hi@leotive.com"
                value="{{ $setting->company_email }}"
              />
              <small class="form-text"
                >Địa chỉ email chính của công ty. Thông tin sẽ hiển thị
                trên website</small
              >
            </div>
            <div class="form-group">
              <label>Facebook</label>
              <input
                type="text"
                name="company_facebook_url"
                class="form-control"
                placeholder="http://facebook.com/leotive"
                value="{{ $setting->company_facebook_url }}"
              />
              <small class="form-text"
                >Địa chỉ trang facebook của công ty. Thông tin sẽ hiển
                thị trên website là một đường dẫn tới trang Facebook
                Fanpage, thông tin này có thể sử dụng để thiết lập
                Facebook Fanpage Likebox</small
              >
            </div>
          </div>
        </div>
      </div>
      </form>
    </div>
  </div>
@endsection