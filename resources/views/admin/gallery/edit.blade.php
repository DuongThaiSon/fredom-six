@extends('admin.layouts.main', ['activePage' => 'Gallery', 'title' => __('Gallery Detail')])
@section('content')
 <div id="main-content">
          <div class="container-fluid" style="background: #e5e5e5;">
            <div id="content">
              <h1 class="mt-3 pl-4">THÔNG TIN ALBUM ẢNH</h1>
              <form action="{{route('admin.gallery.update',$gallery->id)}}" method="POST" enctype="multipart/form-data" class="bg-white mt-3 mb-0 p-4 pt-5">
              @csrf
              <div class="save-group-buttons">
                  <button class="btn btn-sm btn-dark" data-toggle="tooltip" title="Lưu">
                    <i class="material-icons">
                      save
                    </i>
                  </button>
                  <a class="btn btn-sm btn-dark" href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc?usp=sharing" target="_blank">
                    <i class="material-icons">
                      help_outline
                    </i>
                  </a>
                </div>
              <!-- Form -->
              
                <div class="row">
                  <div class="col-md-6">
                    <legend>Thông tin cơ bản</legend>
                    <div class="form-group">
                      <label>ID</label>
                      <input type="text" name="id" class="form-control" value="{{$gallery->id}}" />
                      <small class="form-text">ID là mã của mục, đây là một thuộc tính duy nhất</small>
                    </div>

                    <div class="form-group">
                      <label>Tên gallery</label>
                      <input type="text" name="name" required class="form-control" placeholder="Tên gallery" value="{{$gallery->name}}" />
                      <small class="form-text">Tên của gallery chứa dữ liệu</small>
                    </div>
                    
                    <div class="form-group">
                      <label>URL gallery</label>
                      <input type="text" name="link_to" required class="form-control" placeholder="URL gallery" value={{$gallery->link_to}}/>
                      <small class="form-text">Dán đoạn link url đã copy từ youtube vào.</small>
                    </div>
                    
                    <div class="form-group">
                      <label>Nằm trong mục</label>
                      <select name="category_id" class="form-control">
                        <option value='0'></option>
                        @include('admin.partials.categories_options',['level' => 0])
                      </select>
                      <small class="form-text">Đặt mục cha cho mục dữ liệu này, mục cha ở đây nghĩa là các mục gallery lớn đã được tạo trước đó.</small>
                    </div>

                    <!-- Button Toggle -->
                    <div class="mb-2">
                      <label class="control-label">Hiển thị</label>
                      <input type="checkbox" class="checkbox-toggle" name="is_public" id="public" {{ isset($gallery)&&$gallery->is_public==1?'checked': ' ' }}/>
                      <label class="label-checkbox" for="public">Hiển thị</label>
                      <small class="form-text">Khi tính năng “Hiển thị” được bật, bài viết này có thể
                        hiện thị trên giao diện trang web</small>
                    </div>
                    <div class="mb-2">
                      <label class="control-label">Nổi bật</label>
                      <input type="checkbox" class="checkbox-toggle" name="is_highlight" id="highlight" {{ isset($gallery)&&$gallery->is_highlight==1?'checked': ' ' }}/>
                      <label class="label-checkbox" for="highlight">Nổi bật</label>
                    </div>
                    <small class="form-text">Khi tính năng “Nổi bật” được bật, bài viết này sẽ đc hiển
                      thị trên trang chủ hoặc các điểm chỉ định trên giao
                      diện.
                    </small>
                    <div class="mb-2">
                      <label class="control-label">Mới</label>
                      <input type="checkbox" class="checkbox-toggle" name="is_new" id="new" {{ isset($gallery)&&$gallery->is_new==1?'checked': ' ' }}/>
                      <label class="label-checkbox" for="new">Mới </label>
                    </div>
                    <small class="form-text">Khi tính năng “Mới” được bật, bài viết này sẽ đc hiển thị
                      trên trang chủ hoặc các điểm chỉ định trên giao
                      diện.
                    </small>
                  </div>

                  <div class="col-lg-6">
                    <legend>Tối ưu hóa SEO</legend>
                    <div class="form-group">
                      <label class="control-label">Tiêu đề Browser (title)</label>
                      <input type="text" class="form-control" name="meta_title" placeholder="Tiêu đề Browser (title)" value="{{$gallery->meta_title}}" />
                      <small class="form-text">Tiêu đề của trang chủ có tác dụng tốt nhất choSEO</small>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Tối ưu hóa URL</label>
                      <input type="text" class="form-control" name="slug" placeholder="Tối ưu URL" value="{{$gallery->slug}}"/>
                      <small class="form-text">Tối ưu hóa đường dẫn URL dể tốt nhất cho SEO.</small>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Thẻ Meta Description</label>
                        <input type="text" class="form-control" name="meta_description" placeholder="Thẻ Meta Description" value="{{$gallery->meta_description}}"/>
                        <small class="form-text">Thẻ meta description của trang cung cấp cho Google và các công cụ tìm kiếm bản tóm tắt nội dung của trang đó. 
                        Trong khi tiêu đề trang có thể là vài từ hoặc cụm từ, thẻ mô tả của trang phải có một hoặc hai câu hoặc một đoạn ngắn. 
                        Thẻ meta description là một yếu tố SEO Onpage khá cơ bản cần được tối ưu cẩn thận</small>
                      </div>
                      
                      <div class="form-group">
                          <label class="control-label">Thẻ Meta keywords</label>
                          <input type="text" class="form-control" name="meta_keyword" placeholder="Thẻ Meta keywords" value="{{$gallery->meta_keyword}}"/>
                          <small class="form-text">Meta Keywords (Thẻ khai báo từ khóa trong SEO) Trong quá trình biên tập nội dung, 
                          Meta Keywords là một thẻ được dùng để khai báo các từ khóa dùng cho bộ máy tìm kiếm. Với thuộc tính này, 
                          các bộ máy tìm kiếm (Search Engine) sẽ dễ dàng hiểu nội dung của bạn đang muốn nói đến những vấn đề gì!</small>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Thẻ Meta Page Topic</label>
                            <input type="text" class="form-control" name="meta_page_topic" placeholder="Thẻ Meta Page Topic" value="{{$gallery->meta_page_topic}}"/>
                            <small class="form-text">Theo chuẩn SEO, thẻ meta page topic sẽ là tiêu điểm của trang web đang có nội dung nói về chủ đề nào</small>
                        </div>

                      <div class="form-group">
                        <label class="control-label">Ảnh đại diện</label>
                        <input type="file" class="form-control" name="avatar" placeholder="Ảnh đại diện"/>
                        <small class="form-text">Theo chuẩn SEO, thẻ meta page topic sẽ là tiêu điểm của
                          trang web đang có nội dung nói về chủ đề nào
                        </small>
                      </div>
                  </div>
                </div>

                <hr>
                <div class="row">
                  <div class="col-12">
                    <legend>Nội dung tóm tắt</legend>
                    <div class="form-group">
                      <textarea class="form-control" name="caption">{{$gallery->caption}}</textarea>
                    </div>
                  </div>
                </div>
                </form>
                {{-- <form action="{{route('admin.images.create', $gallery->id)}}" method="POST">
                @csrf --}}
                <div class="row">
                  <div class="col-12">
                    <legend>Ảnh trong album</legend>
                    <button class="btn btn-sm btn-dark float-left" data-toggle="tooltip" title="Xóa toàn bộ mục đã chọn">
                      <i class="material-icons">
                        delete_forever
                      </i>
                    </button>

                    <div class="float-right">
                      <a href="{{route('admin.images.create', $gallery->id)}}" class="btn btn-sm btn-dark float-left" data-toggle="tooltip" title="Upload ảnh">
                        <i class="material-icons">
                          file_upload
                        </i>
                      </a>
                      <a class="btn btn-sm btn-dark float-left ml-4" data-toggle="tooltip" title="Upload nhiều ảnh">
                        <i class="material-icons">
                          perm_media
                        </i>
                      </a>
                    </div>
                    <!-- Table -->
                    <div class="table-responsive bg-white">
                        <table class="table-sm table-hover table mt-3" width="100%">
                          <thead>
                            <tr class="text-muted">
                              <th>
                                <a id="btn-ck-all" href="#" data-toggle="tooltip" title="Chọn / bỏ chọn toàn bộ">
                                  <i class="material-icons text-muted">check_box_outline_blank</i>
                                </a>
                              </th>
                              <th>ID</th>
                              <th>Ảnh</th>
                              <th>Link</th>
                              <th>Caption</th>
                              <th style="width: 40px;">Hiển thị</th>
                              <th style="width: 40px;">Thao tác</th>
                            </tr>
                          </thead>
                          <tbody>
                              {{-- list image --}}
                             @include('admin.images.list_image')
                              {{-- end list imgage --}}
                          </tbody>
                        </table>
                      </div>
                  </div>
                </div>
                 {{-- </form> --}}
              <!-- End Form -->
            </div>
  @endsection   
  @push('js')
 <script>
    CKEDITOR.replace("description");
    CKEDITOR.replace("detail");
</script>   
@endpush