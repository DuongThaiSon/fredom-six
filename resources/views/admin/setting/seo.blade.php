@extends('admin.layouts.main', ['activePage' => 'dashboard', 'title' => __('Setting seo')])
@section('content')
<!-- Content -->
<div id="main-content">
  <div class="container-fluid" style="background: #e5e5e5;">
    <form method="POST" action="{{ route('admin.setting.postSeo') }}">
      @csrf
    <div id="content">
      <h1 class="mt-3 pl-4">
        TỐI ƯU HÓA SEO CHO TRANG CHỦ CỦA HỆ THỐNG
      </h1>
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
                <label>Tiêu đề trên thanh công cụ Browser:</label>
                <input
                  type="text"
                  name="seo_page_title"
                  class="form-control"
                  placeholder="leotive.com"
                  required
                  value="{{ $setting->seo_page_title }}"
                />
                <small class="form-text"
                  >Tiêu đề của trang chủ có tác dụng tốt nhất cho SEO.
                  Thiết lập tiêu để chuẩn SEO sẽ giúp tối ưu hóa tốt
                  hơn.</small>
              </div>
              <div class="form-group">
                <label>Thẻ meta page-topic</label>
                <input
                  type="text"
                  name="seo_meta_page_topic"
                  class="form-control"
                  placeholder="The cat in the hat"
                  value="{{ $setting->seo_page_title }}"
                />
                <small class="form-text"
                  >Theo chuẩn SEO, thẻ meta page topic sẽ là tiêu điểm của
                  trang web đang có nội dung nói về chủ đề nào</small
                >
              </div>
              <div class="form-group">
                <label>Thẻ meta copyright</label>
                <input
                  type="text"
                  name="seo_meta_copyright"
                  class="form-control"
                  placeholder="Địa chỉ"
                  value="{{ $setting->seo_meta_copyright }}"
                />
                <small class="form-text"
                  >Copyright là thông tin về bản quyền về mặt nội dung
                  trên trang web đang hiển thị</small
                >
              </div>
              <div class="form-group">
                <label>Thẻ meta author</label>
                <input
                  type="text"
                  name="seo_meta_author"
                  class="form-control"
                  placeholder="The cat in the hat"
                  value="{{ $setting->seo_meta_author }}"
                />
                <small class="form-text"
                  >Author là tác giả của nội dung viết trên trang
                  web</small
                >
              </div>
              <div class="form-group">
                <label>Thẻ meta keywords</label>
                <input
                  type="text"
                  name="seo_meta_keywords"
                  class="form-control"
                  placeholder=""
                  value="{{ $setting->seo_meta_keywords }}"
                />
                <small class="form-text"
                  >Meta Keywords (Thẻ khai báo từ khóa trong SEO) Trong
                  quá trình biên tập nội dung, Meta Keywords là một thẻ
                  được dùng để khai báo các từ khóa dùng cho bộ máy tìm
                  kiếm. Với thuộc tính này, các bộ máy tìm kiếm (Search
                  Engine) sẽ dễ dàng hiểu nội dung của bạn đang muốn nói
                  đến những vấn đề gì!</small
                >
              </div>
              <div class="form-group">
                <label>Thẻ meta description</label>
                <input
                  type="text"
                  name="seo_meta_des"
                  class="form-control"
                  placeholder="The cat in the hat"
                  value="{{ $setting->seo_meta_des }}"
                />
                <small class="form-text"
                  >Thẻ meta description của trang cung cấp cho Google và
                  các công cụ tìm kiếm bản tóm tắt nội dung của trang đó.
                  Trong khi tiêu đề trang có thể là vài từ hoặc cụm từ,
                  thẻ mô tả của trang phải có một hoặc hai câu hoặc một
                  đoạn ngắn. Thẻ meta description là một yếu tố SEO Onpage
                  khá cơ bản cần được tối ưu cẩn thận</small
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