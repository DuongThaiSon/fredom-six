@extends('admin.layouts.main', ['activePage' => 'products-create', 'title' => __('products.title')])
@section('content')
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <h1 class="mt-3 pl-4">Thông tin sản phẩm</h1>
            <form action="{{route('admin.products.update', $product->id)}}" method="POST" enctype="multipart/form-data"
                class="bg-white mt-3 p-4 pt-5 touch-product-form">

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
                @method('PUT')
                <div class="save-group-buttons">
                    <button class="btn btn-sm btn-dark" data-toggle="tooltip" title="Lưu">
                        <i class="material-icons">
                            save
                        </i>
                    </button>
                </div>
                <!-- Form -->
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#nav-basic">Thông tin cơ bản</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#nav-image">Ảnh</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#nav-attribute">Thuộc tính</a>
                    </li>
                </ul>
                <div class="tab-content mt-4" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-basic" role="tabpanel"
                        aria-labelledby="nav-basic-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <legend class="mb-4">Thông tin cơ bản</legend>
                                <div class="form-group d-none">
                                    <label>Id</label>
                                    <input type="text" name="id" required class="form-control"
                                        placeholder="The cat in the hat"
                                        value="{{ old('id') ?? $product->id ?? '' }}" />
                                </div>
                                <div class="form-group">
                                    <label>Tên sản phẩm @importantfield</label>
                                    <input type="text" name="name" required class="form-control"
                                        placeholder="The cat in the hat"
                                        value="{{ old('name') ?? $product->name ?? '' }}" />
                                </div>
                                <div class="form-group">
                                    <label>Mã sản phẩm @importantfield</label>
                                    <input type="text" name="sku" required class="form-control"
                                        placeholder="Mã sản phẩm" value="{{ old('sku') ?? $product->sku ?? '' }}" />
                                </div>
                                <!-- <div class="form-group">
                                    <label>Loại sản phẩm @importantfield</label>
                                    <select required name="type" class="selectpicker form-control"
                                        data-style="select-with-transition" data-show-tick="true">
                                        @forelse ($typeOptions as $optionKey => $optionValue)
                                        <option value="{{ $optionKey }}">{{ $optionValue }}</option>
                                        @empty

                                        @endforelse
                                    </select>
                                </div> -->
                                <div class="form-group">
                                    <label>Nằm trong mục</label>
                                    <select name="category_id[]" data-selected-text-format="count > 2"
                                        class="selectpicker form-control"
                                        data-count-selected-text="{0} mục đã được chọn"
                                        data-style="select-with-transition" title="Chọn mục sản phẩm" data-size="7"
                                        data-show-tick="true" multiple>
                                        @include('admin.partials.categoryOptions')

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Giá sản phẩm @importantfield</label>
                                    <input type="text" name="price" class="form-control price-format" placeholder=""
                                        value="{{ old('price') ?? $product->price ?? '' }}" />
                                </div>
                                <div class="form-group">
                                    <label>Số lượng</label>
                                    <input type="text" name="quantity" class="form-control"
                                        placeholder="Số lượng sản phẩm"
                                        value="{{ old('quantity') ?? $product->quantity ?? '' }}" />
                                </div>

                                <!-- Button Toggle -->
                                <div class="form-group">
                                    <label class="control-label">Hiển thị</label>
                                    <input type="checkbox" class="checkbox-toggle" name="is_public" id="public"
                                        {{ isset($product)&&$product->is_public==1?'checked':'' }} />
                                    <label class="label-checkbox" for="public">Hiển thị</label>
                                    <small class="form-text">Khi tính năng “Hiển thị” được bật, sản phẩm này có thể
                                        hiện thị trên giao diện trang web</small>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Nổi bật</label>
                                    <input type="checkbox" class="checkbox-toggle" name="is_highlight" id="highlight"
                                        {{ isset($product)&&$product->is_highlight==1?'checked':'' }} />
                                    <label class="label-checkbox" for="highlight">Nổi bật</label>
                                </div>
                                <small class="form-text">Khi tính năng “Nổi bật” được bật, sản phẩm này sẽ đc hiển
                                    thị trên trang chủ hoặc các điểm chỉ định trên giao
                                    diện.
                                </small>
                                <div class="form-group">
                                    <label class="control-label">Mới</label>
                                    <input type="checkbox" class="checkbox-toggle" name="is_new"
                                        {{ isset($product)&&$product->is_new==1?'checked':'' }} id="new" />
                                    <label class="label-checkbox" for="new">Mới </label>
                                    <small class="form-text">Khi tính năng “Mới” được bật, sản phẩm này sẽ đc hiển thị
                                        trên trang chủ hoặc các điểm chỉ định trên giao
                                        diện.</small>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <legend class="mb-4">Tối ưu hóa SEO</legend>
                                <div class="form-group">
                                    <label class="control-label">Tiêu đề Browser (title)</label>
                                    <input type="text" class="form-control" name="meta_title"
                                        placeholder="Tiêu đề Browser (title)"
                                        value="{{ old('meta_title') ?? $product->meta_title ?? '' }}" />
                                    <small class="form-text">Tiêu đề của trang chủ có tác dụng tốt nhất cho SEO</small>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Tối ưu hóa URL</label>
                                    <input type="text" class="form-control" name="slug" placeholder="Tối ưu URL"
                                        value="{{ old('slug') ?? $product->slug ?? '' }}" />
                                    <small class="form-text">Tối ưu hóa đường dẫn URL dể tốt nhất cho SEO.</small>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Thẻ Meta Description</label>
                                    <input type="text" class="form-control" name="meta_description"
                                        placeholder="Thẻ Meta Description"
                                        value="{{ old('meta_description') ?? $product->meta_description ?? '' }}" />
                                    <small class="form-text">Thẻ meta description của trang cung cấp cho Google và các
                                        công cụ
                                        tìm kiếm bản tóm tắt nội dung của trang đó. Trong khi tiêu đề trang có thể là
                                        vài từ
                                        hoặc cụm từ, thẻ mô tả của trang phải có một hoặc hai câu hoặc một đoạn ngắn.
                                        Thẻ meta
                                        description là một yếu tố SEO Onpage khá cơ bản cần được tối ưu cẩn thận
                                    </small>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Thẻ Meta keywords</label>
                                    <input type="text" class="form-control" name="meta_keyword"
                                        placeholder="Thẻ Meta keywords"
                                        value="{{ old('meta_keyword') ?? $product->meta_keyword ?? '' }}" />
                                    <small class="form-text">Meta Keywords (Thẻ khai báo từ khóa trong SEO) Trong quá
                                        trình biên
                                        nội tập dung, Meta Keywords là một thẻ được dùng để khai báo các từ khóa dùng
                                        cho bộ máy
                                        tìm kiếm. Với thuộc tính này, các bộ máy tìm kiếm (Search Engine) sẽ dễ dàng
                                        hiểu nội
                                        dung của bạn đang muốn nói đến những vấn đề gì!
                                    </small>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Thẻ Meta Page Topic</label>
                                    <input type="text" class="form-control" name="meta_page_topic"
                                        placeholder="Thẻ Meta Page Topic"
                                        value="{{ old('meta_page_topic') ?? $product->meta_page_topic ?? '' }}" />
                                    <small class="form-text">Theo chuẩn SEO, thẻ meta page topic sẽ là tiêu điểm của
                                        trang web
                                        đang có nội dung nói về chủ đề nào</small>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Ảnh đại diện</label>
                                    <div class="fileinput fileinput-new d-block" data-provides="fileinput">
                                        @if ( isset($product) && $product->avatar)
                                        <div class="fileinput-new img-thumbnail" style="width: 200px; height: 150px;">
                                            <img src="{{ asset(env('UPLOAD_DIR_PRODUCT', 'media/images/products')) . "/{$product->avatar}" }}"
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
                                <legend>Nội dung mô tả</legend>
                                <div class="form-group">
                                    <textarea class="form-control ckeditor"
                                        name="description">{{ old('description') ?? $product->description ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <!--end tab basic info-->

                    <!--tab image-->
                    <div class="tab-pane fade show" id="nav-image" role="tabpanel" aria-labelledby="nav-image-tab">
                        <div class="row">
                            <div class="col-12">
                                <legend class="mb-4">Ảnh bộ sưu tập</legend>
                                <div class="row">
                                    <div class="form-group col-4">
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input upload-variant-image"
                                                    id="input-image">
                                                <label class="custom-file-label" for="input-image">Chọn ảnh</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-showcase">
                                    @include('admin.products.imageShowcase')
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end tab image-->

                    <!--tab attribute-->
                    <div class="tab-pane fade show" id="nav-attribute" role="tabpanel"
                        aria-labelledby="nav-attribute-tab">
                        @include('admin.products.variant')
                    </div>
                    <!--end tab attribute-->
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="/assets/admin/js/products.edit.js"></script>
@endpush
