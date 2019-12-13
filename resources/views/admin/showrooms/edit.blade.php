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
            <label>Tên Showroom</label>
            <input type="text" name="name" class="form-control" placeholder="Tên Showroom" value="{{ $showroom->name }}"/>
            <small class="form-text">Đặt tên cho Showroom</small>
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
            <input type="text" name="address" class="form-control" placeholder="Số nhà, Tên đường, Phường xã " value="{{ $showroom->address }}"/>
            <small class="form-text">Địa chỉ showroom</small>
          </div>
          <div class="form-group">
            <label>Quận</label>
            <input type="text" name="district" class="form-control" placeholder="Quận" value="{{ $showroom->district }}"/>
            <small class="form-text">Quận </small>
          </div>
          <div class="form-group">
            <label>Thành Phố</label>
            <input type="text" name="city" class="form-control" placeholder="Thành Phố" value="{{ $showroom->city }}"/>
            <small class="form-text">Thành Phố</small>
          </div>
          <div class="form-group">
            <label>Bản đồ</label>
            <input type="text" name="map" class="form-control" placeholder="Link bản đồ showroom" value="{{ $showroom->map }}"/>
            <small class="form-text">Bản đồ showroom</small>
          </div>
          <div class="form-group">
            <label class="control-label">Ảnh đại diện</label>
            {{-- <div class="custom-file">
                <input type="file" class="custom-file-input" name="avatar">
                <label class="custom-file-label" for="">Choose file</label>
            </div> --}}
          </div>
          <div class="form-group">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new img-thumbnail" style="width: 400px; height: 230px;">
                    <img src="{{ asset('/media/images/showrooms') }}/{{ $showroom->avatar }}"  alt="{{ $showroom->avatar }}">
                </div>
                <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 400px; max-height: 300px;"></div>
                <div>
                    <span class="btn btn-outline-secondary btn-file">
                        <span class="fileinput-new">Select image</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="avatar">
                    </span>
                    <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
      </form>
    </div>
  </div>
@endsection
@push('js')
 <script>
    // CKEDITOR.replace("description");
    // CKEDITOR.replace("detail");
</script>
@endpush