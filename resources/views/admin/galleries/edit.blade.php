@extends('admin.layouts.main', ['activePage' => 'galleries', 'title' => __('Gallery Detail')])
@section('content')
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <h1 class="mt-3 pl-4">THÔNG TIN ALBUM ẢNH</h1>
            <form action="{{route('admin.galleries.update',$gallery->id)}}" method="POST" enctype="multipart/form-data"
                class="bg-white mt-3 mb-0 p-4 pt-5">
                @csrf
                @method('PUT')
                <div class="save-group-buttons">
                    <button class="btn btn-sm btn-dark" data-toggle="tooltip" title="Lưu">
                        <i class="material-icons">
                            save
                        </i>
                    </button>
                    <a class="btn btn-sm btn-dark"
                        href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc?usp=sharing"
                        target="_blank">
                        <i class="material-icons">
                            help_outline
                        </i>
                    </a>
                </div>
                <!-- Form -->
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#nav-basic">Thông tin cơ bản</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#nav-image">Ảnh</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-basic" role="tabpanel"
                        aria-labelledby="nav-basic-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <legend>Thông tin cơ bản</legend>

                                <div class="form-group">
                                    <label>Tên gallery @importantfield</label>
                                    <input type="text" name="name" required class="form-control"
                                        placeholder="Tên gallery" value="{{$gallery->name}}" />
                                    <small class="form-text">Tên của gallery chứa dữ liệu</small>
                                </div>

                                <div class="form-group">
                                    <label>Nằm trong mục</label>
                                    <select name="category_id" class="form-control">
                                        <option value='0'></option>
                                        @include('admin.partials.categoryOptions')
                                    </select>
                                    <small class="form-text">Đặt mục cha cho mục dữ liệu này, mục cha ở đây nghĩa là các
                                        mục gallery lớn đã được tạo trước đó.</small>
                                </div>

                                <!-- Button Toggle -->
                                <div class="mb-2">
                                    <label class="control-label">Hiển thị</label>
                                    <input type="checkbox" class="checkbox-toggle" name="is_public" id="public"
                                        {{ isset($gallery)&&$gallery->is_public==1?'checked': ' ' }} />
                                    <label class="label-checkbox" for="public">Hiển thị</label>
                                    <small class="form-text">Khi tính năng “Hiển thị” được bật, bài viết này có thể
                                        hiện thị trên giao diện trang web</small>
                                </div>
                                <div class="mb-2">
                                    <label class="control-label">Nổi bật</label>
                                    <input type="checkbox" class="checkbox-toggle" name="is_highlight" id="highlight"
                                        {{ isset($gallery)&&$gallery->is_highlight==1?'checked': ' ' }} />
                                    <label class="label-checkbox" for="highlight">Nổi bật</label>
                                </div>
                                <small class="form-text">Khi tính năng “Nổi bật” được bật, bài viết này sẽ đc hiển
                                    thị trên trang chủ hoặc các điểm chỉ định trên giao
                                    diện.
                                </small>
                                <div class="mb-2">
                                    <label class="control-label">Mới</label>
                                    <input type="checkbox" class="checkbox-toggle" name="is_new" id="new"
                                        {{ isset($gallery)&&$gallery->is_new==1?'checked': ' ' }} />
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
                                    <input type="text" class="form-control" name="meta_title"
                                        placeholder="Tiêu đề Browser (title)" value="{{$gallery->meta_title}}" />
                                    <small class="form-text">Tiêu đề của trang chủ có tác dụng tốt nhất choSEO</small>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Tối ưu hóa URL</label>
                                    <input type="text" class="form-control" name="slug" placeholder="Tối ưu URL"
                                        value="{{$gallery->slug}}" />
                                    <small class="form-text">Tối ưu hóa đường dẫn URL dể tốt nhất cho SEO.</small>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Thẻ Meta Description</label>
                                    <input type="text" class="form-control" name="meta_description"
                                        placeholder="Thẻ Meta Description" value="{{$gallery->meta_description}}" />
                                    <small class="form-text">Thẻ meta description của trang cung cấp cho Google và các
                                        công cụ tìm kiếm bản tóm tắt nội dung của trang đó.
                                        Trong khi tiêu đề trang có thể là vài từ hoặc cụm từ, thẻ mô tả của trang phải
                                        có một hoặc hai câu hoặc một đoạn ngắn.
                                        Thẻ meta description là một yếu tố SEO Onpage khá cơ bản cần được tối ưu cẩn
                                        thận</small>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Thẻ Meta keywords</label>
                                    <input type="text" class="form-control" name="meta_keyword"
                                        placeholder="Thẻ Meta keywords" value="{{$gallery->meta_keyword}}" />
                                    <small class="form-text">Meta Keywords (Thẻ khai báo từ khóa trong SEO) Trong quá
                                        trình biên tập nội dung,
                                        Meta Keywords là một thẻ được dùng để khai báo các từ khóa dùng cho bộ máy tìm
                                        kiếm. Với thuộc tính này,
                                        các bộ máy tìm kiếm (Search Engine) sẽ dễ dàng hiểu nội dung của bạn đang muốn
                                        nói đến những vấn đề gì!</small>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Thẻ Meta Page Topic</label>
                                    <input type="text" class="form-control" name="meta_page_topic"
                                        placeholder="Thẻ Meta Page Topic" value="{{$gallery->meta_page_topic}}" />
                                    <small class="form-text">Theo chuẩn SEO, thẻ meta page topic sẽ là tiêu điểm của
                                        trang web đang có nội dung nói về chủ đề nào</small>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Ảnh đại diện</label>
                                    <div class="fileinput fileinput-new d-block" data-provides="fileinput">
                                        @if ( isset($gallery) && $gallery->avatar)
                                        <div class="fileinput-new img-thumbnail" style="width: 200px; h ight: 150px;">
                                            <img src="{{ asset(env('UPLOAD_DIR_GALLERY', 'media/images/galleries')) . "/{$gallery->avatar}" }}"
                                                alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists img-thumbnail"
                                            style="max-width: 200px; max-height: 150px;"></div>
                                        @else
                                        <div class="fileinput-preview img-thumbnail" data-trigger="fileinput"
                                            style="width: 200px; height: 150px;"></div>
                                        @endif
                                        <div>
                                            <span class="btn btn-outline-secondary btn-file border-0 p-0 rounded">
                                                <span class="fileinput-new btn btn-outline-secondary btn-sm">Select
                                                    image</span>
                                                <span
                                                    class="fileinput-exists btn btn-outline-secondary btn-sm">Change</span>
                                                <input type="file" name="avatar" class="">
                                            </span>
                                            <a href="#"
                                                class="btn btn-outline-secondary btn-sm fileinput-exists rounded"
                                                data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <legend>Nội dung tóm tắt</legend>
                                <div class="form-group">
                                    <textarea class="form-control ckeditor"
                                        name="description">{{$gallery->description}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="nav-image" role="tabpanel" aria-labelledby="nav-image-tab">
                        <div class="row">
                            <div class="col-12">
                                <legend>Ảnh bộ sưu tập</legend>
                                <div class="row">
                                    <div class="form-group col-4">
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input upload-variant-image"
                                                    id="input-image" multiple accept="image/*"
                                                    data-href="{{ route('admin.galleries.processImage', $gallery) }}">
                                                <label class="custom-file-label" for="input-image">Chọn ảnh</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-showcase sort"
                                    data-href="{{ route('admin.galleries.reorderImage') }}">
                                    @include('admin.galleries.imageShowcase')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="/assets/admin/js/galleries.edit.js"></script>
@endpush
