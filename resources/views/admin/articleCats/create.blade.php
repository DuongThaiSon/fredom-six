@extends('admin.layouts.main', ['activePage' => 'articleCats-create', 'title' => __('Detail Category')])
@section('content')
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <h1 class="mt-3 pl-4">THÔNG TIN DANH MỤC BÀI VIẾT</h1>
            <!-- Save group button -->
            <form action="{{route('admin.article-categories.store')}}" method="POST" enctype="multipart/form-data"
                class="bg-white mt-3 mb-0 p-4 pt-5">

                @if ($errors->any())
                @component('admin.layouts.components.alert')
                @slot('title', 'Lỗi!')
                @slot('type', 'danger')
                {{ $errors->first() }}
                @endcomponent
                @endif

                @if (session()->has('success'))
                @component('admin.layouts.components.alert')
                @slot('title', 'Thành công!')
                @slot('type', 'success')
                {{ session()->get('success') }}
                @endcomponent
                @endif

                @csrf
                <div class="save-group-buttons">
                    <button class="btn btn-sm btn-dark" data-toggle="tooltip" title="Lưu">
                        <i class="material-icons"> save</i>
                    </button>
                    <a class="btn btn-sm btn-dark"
                        href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc?usp=sharing"
                        target="_blank">
                        <i class="material-icons"> help_outline </i>
                    </a>
                </div>
                <!-- End group button -->
                <!-- Form -->
                <div class="row">
                    <div class="col-md-6">
                        <legend>Thông tin cơ bản</legend>

                        <div class="form-group">
                            <label>Tên mục @importantfield</label>
                            <input type="text" name="name" required class="form-control" placeholder="Tên mục"
                                value="{{ old('name') }}" />
                            <small class="form-text">Tên của mục</small>
                        </div>

                        <div class="form-group">
                            <label>Nằm trong mục</label>
                            <select name="parent_id" class="form-control">
                                <option value="0" selected></option>
                                @include('admin.partials.categoryOptions')
                            </select>
                            <small class="form-text">Chọn mục cho dữ liệu này, bạn không nên để trống</small>
                        </div>

                        <!-- Button Toggle -->
                        <div class="mb-2">
                            <label class="control-label">Hiển thị</label>
                            <input type="checkbox" class="checkbox-toggle" name="is_public" id="public" checked />
                            <label class="label-checkbox" for="public">Hiển thị</label>
                        </div>
                        <small class="form-text">Khi tính năng “Hiển thị” được bật, bài viết này sẽ đc hiển
                            thị trên trang chủ hoặc các điểm chỉ định trên giao diện.
                        </small>

                    </div>

                    <div class="col-lg-6">
                        <legend>Tối ưu hóa SEO</legend>
                        <div class="form-group">
                            <label class="control-label">Tiêu đề Browser (title)</label>
                            <input type="text" class="form-control" name="meta_title"
                                placeholder="Tiêu đề Browser (title)" value="{{ old('meta_title') }}" />
                            <small class="form-text">Tiêu đề của trang chủ có tác dụng tốt nhất cho SEO</small>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Tối ưu hóa URL</label>
                            <input type="text" class="form-control" name="slug" value="{{ old('slug') }}"
                                placeholder="Tối ưu URL" />
                            <small class="form-text">Tối ưu hóa đường dẫn URL dể tốt nhất cho SEO.</small>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Thẻ Meta Description</label>
                            <input type="text" class="form-control" name="meta_description"
                                value="{{ old('meta_description') }}" placeholder="Thẻ Meta Description" />
                            <small class="form-text">Thẻ meta description của trang cung cấp cho Google và các công cụ
                                tìm kiếm bản tóm tắt nội dung của trang đó. Trong khi tiêu đề trang có thể là vài từ
                                hoặc cụm từ, thẻ mô tả của trang phải có một hoặc hai câu hoặc một đoạn ngắn.
                                Thẻ meta description là một yếu tố SEO Onpage khá cơ bản cần được tối ưu cẩn
                                thận</small>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Thẻ Meta keywords</label>
                            <input type="text" class="form-control" name="meta_keyword"
                                value="{{ old('meta_keyword') }}" placeholder="Thẻ Meta keywords" />
                            <small class="form-text">Meta Keywords (Thẻ khai báo từ khóa trong SEO) Trong quá trình biên
                                tập nội dung,
                                Meta Keywords là một thẻ được dùng để khai báo các từ khóa dùng cho bộ máy tìm kiếm. Với
                                thuộc tính này,
                                các bộ máy tìm kiếm (Search Engine) sẽ dễ dàng hiểu nội dung của bạn đang muốn nói đến
                                những vấn đề gì!</small>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Thẻ Meta Page Topic</label>
                            <input type="text" class="form-control" name="meta_page_topic"
                                value="{{ old('meta_page_topic') }}" placeholder="Thẻ Meta Page Topic" />
                            <small class="form-text">Theo chuẩn SEO, thẻ meta page topic sẽ là tiêu điểm của trang web
                                đang có nội dung nói về chủ đề nào</small>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Ảnh đại diện</label>
                            <div class="fileinput fileinput-new d-block" data-provides="fileinput">
                                <div class="fileinput-preview img-thumbnail" data-trigger="fileinput"
                                    style="width: 200px; height: 150px;"></div>
                                <div>
                                    <span class="btn btn-outline-secondary btn-file border-0 p-0 rounded">
                                        <span class="fileinput-new btn btn-outline-secondary btn-sm">Select image</span>
                                        <span class="fileinput-exists btn btn-outline-secondary btn-sm">Change</span>
                                        <input type="file" name="avatar" class="">
                                    </span>
                                    <a href="#" class="btn btn-outline-secondary btn-sm fileinput-exists rounded"
                                        data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- CK Editor -->
                <hr>
                <div class="row">
                    <div class="col-12">
                        <legend>Nội dung mô tả</legend>
                        <div class="form-group">
                            <textarea class="form-control ckeditor"
                                name="description">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>
            </form>
            <!-- End form -->
        </div>
    </div>
</div>
@endsection
@push('js')
{{--  <script>
    CKEDITOR.replace("description");
    CKEDITOR.replace("detail");
</script>  --}}
@endpush
