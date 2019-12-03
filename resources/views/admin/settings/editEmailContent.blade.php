@extends('admin.layouts.main', ['activePage' => 'emailContent', 'title' => __('Edit Email Content')])
@section('content')
<!-- Content -->
<div id="main-content">
  <div class="container-fluid" style="background: #e5e5e5;">
    <form method="POST" action="{{ route('admin.settings.postEditEmailContent', $email_content->id) }}" enctype="multipart/form-data">
      @csrf
      <div id="content">
        <h1 class="mt-3 pl-4">
          NỘI DUNG EMAIL
        </h1>
        
        <!-- Form input -->
        <div class="bg-white mb-0 p-4 pt-5">
          @if($errors->any())
          <div class="alert alert-danger">{{ $errors->first() }}</div>
          @endif
          @if(Session::has('success'))
          <div class="alert alert-success">{{ Session::get('success') }}</div>
          @endif
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
          <div class="row">
            <div class="col-12">
              {{-- <div class="form-group">
                <label>Email được gửi khi</label>
                <input
                  type="text"
                  name="send_when"
                  class="form-control"
                  placeholder="Thời điểm email được gửi đi"
                  value="{{ $email_content->send_when }}"
                />
                <small class="form-text"
                  >Email sẽ được gửi đi khi có khách liên hệ trực tuyến hay qua website hoặc online</small
                >
              </div>
              <div class="form-group">
                <label>Các giá trị cần có trong nội dung</label>
                <input
                  type="text"
                  name="need_value"
                  required
                  class="form-control"
                  placeholder="Các giá trị cần có trong nội dung"
                  value="{{ $email_content->need_value }}"
                />
                <small class="form-text"
                  >Các giá trị cần có trong nội dung.Ví dụ:Tên,số điện thoại,địa chỉ...</small
                >
              </div> --}}
              <div class="form-group">
                <label>Tiêu đề</label>
                <input
                  type="text"
                  name="name"
                  required
                  class="form-control"
                  placeholder="Tiêu đề"
                  value="{{ $email_content->name }}"
                />
                <small class="form-text"
                  >Tiêu đề của email gửi đi</small
                >
              </div>
              
            </div>
          </div>
          <!-- Ck editor -->
          <div class="row">
            <div class="col-12">
              <legend>Chi tiết</legend>
              <div class="form-group">
                <textarea class="form-control" name="detail">{{ $email_content->detail }}</textarea>
              </div>
            </div>
          </div>
        </div>
        <!-- End form-input -->
      </div>
    </form>
  </div>
</div>
@endsection
@push('js')
    <script>
      $("#setting-sub-menu").addClass("show");
      CKEDITOR.replace("des");
      CKEDITOR.replace("detail");
    </script>
@endpush