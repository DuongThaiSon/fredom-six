@extends('admin.layouts.main', ['activePage' => 'articleCats', 'title' => __('Menu create')])
@section('content')
<div id="main-content">
  <div class="container-fluid" style="background: #e5e5e5;">
    <div id="content">
      <h1 class="mt-3 pl-4">THÔNG TIN DANH MỤC MENU</h1>
        <!-- Save group button -->
        <form action="{{ route('admin.menus.store') }}" method="POST" enctype="multipart/form-data" class="bg-white mt-3 mb-0 p-4 pt-5">
          @csrf
          @if ($errors->any())
            <div class="alert bg-danger" role="alert">
                <svg class="glyph stroked cancel">
                    <use xlink:href="#stroked-cancel"></use>
                </svg>{{ $errors->first() }}<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
            </div>
          @endif
        <div class="save-group-buttons">
            <button class="btn btn-sm btn-dark" data-toggle="tooltip" title="Lưu">
              <i class="material-icons"> save</i>
            </button>
            <a class="btn btn-sm btn-dark" href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc?usp=sharing" target="_blank">
              <i class="material-icons"> help_outline </i>
            </a>
        </div>
        <!-- End group button -->
      <!-- Form -->
        <div class="row">
          <div class="col-md-6">
            <legend>Thông tin cơ bản</legend>
            <div class="form-group">
              <label>ID</label>
              <input type="text" name="id" class="form-control" readonly="readonly" />
              <small class="form-text">ID là mã của tin bài, đây là một thuộc tính duy nhất</small>
            </div>

            <div class="form-group">
              <label>Tên menu</label>
              <input type="text" name="name" required class="form-control" placeholder="Tên menu"/>
              <small class="form-text">Tên của menu</small>
            </div>

            <div class="form-group">
              <label>Danh mục</label>
              <select name="parent_id" class="form-control">
                <option value="0"></option>
                  @include('admin.partials.menu_cats', ['level'=>0])
              </select>
              <small class="form-text">Chọn mục cho dữ liệu này, bạn không nên để trống</small>
            </div>
            
            <div class="form-group">
              <label>Loại Menu</label>
              <select name="type" class="form-control">
                <option value="0"></option>
                <option value="1">[Bài viết] Link đến một mục bài viết</option>
                <option value="2">[Bài viết] Đồng bộ với toàn bộ mục con của một mục</option>
                <option value="3">[Bài viết] Đồng bộ mục bài viết</option>
                <option value="4">[Bài viết] Link đến bài viết chỉ định</option>
                <option value="5">[Sản phẩm] Link đến một mục sản phẩm</option>
                <option value="6">[Sản phẩm] Đồng bộ với toàn bộ mục con của một mục</option>
                <option value="7">[Sản phẩm] Đồng bộ mục sản phẩm</option>
                <option value="8">[Sản phẩm] Link đến sản phẩm chỉ định</option>
              </select>
              <small class="form-text">Chọn mục cho dữ liệu này, bạn không nên để trống</small>
            </div>
            <div class="form-group">
              <label>URL</label>
              <input type="text" name="link"  class="form-control" placeholder="URL Link"/>
              <small class="form-text">Khi click vào menu này sẽ chuyển hướng đến URL chỉ định</small>
            </div>
            <div class="form-group d-none">
              <input type="hidden" name="category_id" value="{{ $category_id }}" class="form-control" placeholder="URL Link"/>
            </div>
          </div>
          <input type="hidden" name="article_id" id="article_id" value="">
          <input type="hidden" name="produc_id" id="produc_id" value="">

          <div class="col-lg-6" style="border: 1px solid gray">
              <p>Chú thích loại menu</p>
              <p>Link tùy chọn: Khi click vào menu này sẽ chuyển hướng đến URL chỉ định</p>
              <p>[Bài viết] Link đến một mục bài viết: Người dùng click vào menu này sẽ chuyển hướng trực tiếp đến trang list bài viết theo mục đã chọn</p>
              <p>[Bài viết] Đồng bộ với toàn bộ mục con của một mục: Hệ thống sẽ tự sinh ra các menu con là các mục con của mục đã chọn và mỗi menu con sẽ link đến trang list bài viết theo mục đã chọn</p>
              <p>[Bài viết] Đồng bộ mục bài viết: Hệ thống tự sinh ra toàn bộ mục bài viết có trong cơ sở dữ liệu theo đúng cấu trúc mục cha, con đã định</p>
              <p>[Bài viết] Link đến bài viết chỉ định: Khi click vào menu này sẽ chuyển hướng đến trang chi tiết của bài viết được chọn</p>
              <p>[Sản phẩm] Link đến một mục sản phẩm: Người dùng click vào menu này sẽ chuyển hướng trực tiếp đến trang list sản phẩm theo mục đã chọn</p>
              <p>[Sản phẩm] Đồng bộ với toàn bộ mục con của một mục: Hệ thống sẽ tự sinh ra các menu con là các mục con của mục đã chọn và mỗi menu con sẽ link đến trang list sản phẩm theo mục đã chọn</p>
              <p>[Sản phẩm] Đồng bộ mục sản phẩm: Hệ thống tự sinh ra toàn bộ mục sản phẩm có trong cơ sở dữ liệu theo đúng cấu trúc mục cha, con đã định</p>
              <p>[Sản phẩm] Link đến sản phẩm chỉ định: Khi click vào menu này sẽ chuyển hướng đến trang chi tiết của sản phẩm được chọn</p>
          </div>
          <hr>
          <div class="col-lg-12 filter-result">
          </div>
        </div>
        </form>
      <!-- End form -->
    </div>
  </div>
</div>
@endsection
@push('js')
<script>
  CKEDITOR.replace("description");
  CKEDITOR.replace("detail");
</script>
<script>
  $(document).ready(function(){
    $("select[name=type]").on('change', function (e) {
      e.preventDefault();
      let url = "";
      if ($(this).val() == 4) {
        url = "list-articles";
        ajaxCall(url);
      }
      if ($(this).val() == 8) {
        url = "list-products";
        ajaxCall(url);
      }
    });
    
  });

  let ajaxCall = function(url) {
    $.ajax({
        url: '/admin/menus/'+url,
        method: 'GET',
        success: function(scs){
          $('.filter-result').html(scs)
          $('input:[name=link]').remove();
        },
        error: function(e){
          console.log(e);
          
          }
      });
   };
    
</script>
@endpush
