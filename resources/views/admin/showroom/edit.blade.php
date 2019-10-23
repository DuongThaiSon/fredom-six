@extends('admin.layouts.main', ['activePage' => 'dashboard', 'title' => __('Edit Showroom')])
@section('content')
<!-- Content -->
<div id="main-content">
<div class="container-fluid" style="background: #e5e5e5;">
  <form method="POST" action="{{ route('admin.showrooms.update', $showroom->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div id="content">
    <h1 class="mt-3 pl-4">Thông tin bài viết</h1>
    <div class="save-group-buttons">
        <button class="btn btn-sm btn-dark" data-toggle="tooltip" title="Lưu">
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
      <!-- Form -->
      @if($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
      @endif
      @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
      @endif
      <div class="bg-white p-4 pt-5">
      <div class="row">
        <div class="col-12">
          <legend>THÔNG TIN NỘI DUNG PHỤ</legend>
          <div class="form-group">
            <label>Tên nội dung</label>
            <input type="text" name="name" class="form-control" placeholder="Tên nội dung" value="{{ $showroom->name }}"/>
            <small class="form-text">Đặt tên cho nội dung</small>
          </div>
          <div class="form-group">
            <label>Chi nhánh</label>
            {{-- <input type="text" name="email" class="form-control" placeholder="Chi nhánh"/> --}}
            <select name="regions" class="form-control" id="sel1">
              <option value="Miền Bắc" {{ $showroom->regions == 'Miền Bắc' ? 'selected' :''}}>Miền Bắc</option>
              <option value="Miền Trung" {{ $showroom->regions == 'Miền Trung' ? 'selected' :''}}>Miền Trung</option>
              <option value="Miền Nam" {{ $showroom->regions == 'Miền Nam' ? 'selected' :''}}>Miền Nam</option>
            </select>
            <small class="form-text">Chọn tên chi nhánh</small>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $showroom->email }}"/>
            <small class="form-text"
              >Email liên hệ của showroom</small>
          </div>
          <div class="form-group">
            <label>Số điện thoại</label>
            <input type="text" name="phone" class="form-control" placeholder="Số điện thoại" value="{{ $showroom->phone }}"/>
            <small class="form-text">Số điện thoại của showroom</small>
          </div>
          <div class="form-group">
            <label>Địa chỉ</label>
            <input type="text" name="address" class="form-control" placeholder="Địa chỉ" value="{{ $showroom->address }}"/>
            <small class="form-text">Địa chỉ showroom</small>
          </div>
          <div class="form-group">
            <label class="control-label">Ảnh đại diện</label>
            <input
              type="file"
              class="form-control"
              name="avatar"
              placeholder="Ảnh đại diện"
              value="{{ $showroom->avatar }}"/>
            <small class="form-text">Ảnh đại diện showroom</small>
          </div>

          <div class="form-group">
            <label>Ngôn ngữ</label>
            <input
              type="text"
              name="language"
              required
              class="form-control"
              placeholder="Ngôn ngữ"
              value="{{ $showroom->language }}"
              readonly />
            <small class="form-text">Ngôn ngữ của trang(Ví dụ:Tiếng Việt,Tiếng Anh)</small>
          </div>

          <!-- Button Toggle -->
          <div class="mb-2">
            <label class="control-label">Trạng thái hiển thị</label>
            <input
              type="checkbox"
              class="checkbox-toggle"
              name="is_public"
              id="public"
              {{isset($showroom)&&$showroom->is_public==1?'checked':''}}
              
            />
            <label class="label-checkbox" for="public"
              >Hiển thị</label
            >
            <small class="form-text"
              >Khi tính năng được bật, danh mục này sẽ được hiển thị trên trang chủ hoặc các điểm chỉ định trên giao diện.</small
            >
          </div>

        </div>
        </div>

        <!-- CK Editor -->
        <hr>
          <div class="row">
            <div class="col-12">
              <legend>Nội dung</legend>
              <div class="form-group">
                <textarea class="form-control" name="detail" >{{ $showroom->detail }}</textarea>
              </div>
            </div>
          </div>
          <hr>
        </div>
      </form>
    </div>
  </div>
@endsection
@push('js')
 <script>
    CKEDITOR.replace("description");
    CKEDITOR.replace("detail");
</script>
@endpush