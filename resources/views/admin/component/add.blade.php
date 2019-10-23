@extends('admin.layouts.main', ['activePage' => 'dashboard', 'title' => __('Create Component')])
@section('content')
<!-- Content -->
<div id="main-content">
<div class="container-fluid" style="background: #e5e5e5;">
  <form method="POST" action="{{ route('admin.component.store') }}" >
    @csrf
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
      <div class="bg-white p-4 pt-5">
      <div class="row">
        <div class="col-12">
          <legend>THÔNG TIN NỘI DUNG PHỤ</legend>
          <div class="form-group">
            <label>Tên Showroom</label>
            <input type="text" name="name" class="form-control" placeholder="Tên Showroom"/>
            <small class="form-text"
              >Đặt tên cho Showroom</small
            >
          </div>

          <div class="form-group">
            <label>Ngôn ngữ</label>
            <input
              type="text"
              name="language"
              required
              class="form-control"
              placeholder="Ngôn ngữ"
              value=""
              readonly
            />
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
              value=""
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
                <textarea class="form-control" name="detail"></textarea>
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