@extends('admin.layouts.main', ['activePage' => 'products', 'title' => __('Products Detail')])
@section('content')
 <div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <h1 class="mt-3 pl-4">Thông tin sản phẩm</h1>
            <form action="{{route('admin.products.update', $product->id)}}" method="POST" enctype="multipart/form-data" class="bg-white mt-3 p-4 pt-5">
            @csrf
            @method('PUT')
            @if ($errors->any())
                <div class="alert bg-danger" role="alert">
                    <svg class="glyph stroked cancel">
                        <use xlink:href="#stroked-cancel"></use>
                    </svg>{{ $errors->first() }}<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                </div>
                @endif
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

            <div class="row">
                <div class="col-md-6">
                <legend>Thông tin cơ bản</legend>
                <div class="form-group">
                    <label>ID</label>
                    <input type="text" name="id" class="form-control" readonly="readonly" value="{{ $product->id }}" />
                    <small class="form-text"
                    >ID là mã của tin bài, đây là một thuộc tính duy
                    nhất</small
                    >
                </div>

                <div class="form-group">
                    <label>Tiêu đề sản phẩm</label>
                    <input
                    type="text"
                    name="name"
                    required
                    class="form-control"
                    placeholder="The cat in the hat"
                    value="{{$product->name ?? ''}}"
                    />
                    <small class="form-text">Tên của tin bài</small>
                </div>

                <div class="form-group">
                    <label>Nằm trong mục</label>
                    <select
                        name="category[]"
                        data-selected-text-format="count > 2"
                        class="selectpicker form-control"
                        data-count-selected-text="{0} mục đã được chọn"
                        data-style="btn btn-primary"
                        title="Chọn mục sản phẩm"
                        data-size="7"
                        data-show-tick="true"
                        id="product-category">

                        <option value="0"></option>
                        @include('admin.partials.options', ['level'=>0])

                    </select>
                </div>
                <div class="form-group">
                    <label>Giá sản phẩm</label>
                    <input
                    type="text"
                    required
                    class="form-control price-format price-input"
                    placeholder=""
                    value="{{$product->price ?? ''}}"
                    />
                    <input type="hidden" value="{{$product->price ?? ''}}" name="price">
                    <small class="form-text">Giá của sản phẩm</small>
                </div>
                <div class="form-group">
                    <label>Discount</label>
                    <input
                    type="number"
                    name="discount"
                    class="form-control"
                    placeholder=""
                    value="{{$product->discount ?? ''}}"
                    />
                    <small class="form-text">Khuyến mãi của sản phẩm</small>
                </div>
                <div class="row">
                    <div class="col-6"><div class="form-group">
                        <label>Discount start</label>
                        <input
                            type="text"
                            name="discount_start"
                            class="form-control date-picker"
                            placeholder=""
                            value="{{$product->discount_start ?? ''}}"
                        />
                        <small class="form-text">Thời gian bắt đầu khuyến mãi</small>
                        </div>
                    </div>
                    <div class="col-6"><div class="form-group">
                        <label>Discount end</label>
                        <input
                            type="text"
                            name="discount_end"
                            class="form-control date-picker"
                            value=""
                        />
                        <small class="form-text">Thời gian kết thúc khuyến mãi</small>
                    </div></div>
                </div>


                <div class="form-group">
                    <label>Unit</label>
                    <input
                    type="text"
                    name="unit"
                    required
                    class="form-control"
                    placeholder=""
                    value="{{$product->unit ?? ''}}"
                    />
                    <small class="form-text">Đơn vị sản phẩm</small>
                </div>
                <div class="form-group">
                    <label>Product code</label>
                    <input
                    type="text"
                    name="product_code"
                    required
                    class="form-control"
                    placeholder=""
                    value="{{$product->product_code ?? ''}}"
                    />
                    <small class="form-text">Mã sản phẩm</small>
                </div>
                <div class="form-group">
                    <label>Quantity</label>
                    <input
                    type="text"
                    name="quantity"
                    required
                    class="form-control"
                    placeholder="The cat in the hat"
                    value="{{$product->quantity ?? ''}}"
                    />
                    <small class="form-text">Số lượng sản phẩm</small>
                </div>

                <!-- Button Toggle -->
                <div class="mb-2">
                    <label class="control-label">Hiển thị</label>
                    <input
                    type="checkbox"
                    class="checkbox-toggle"
                    name="is_public"
                    id="public"
                    {{ isset($product)&&$product->is_public==1?'checked':'' }}
                    />
                    <label class="label-checkbox" for="public"
                    >Hiển thị</label
                    >
                    <small class="form-text"
                    >Khi tính năng “Hiển thị” được bật, sản phẩm này có thể
                    hiện thị trên giao diện trang web</small
                    >
                </div>
                <div class="mb-2">
                    <label class="control-label">Nổi bật</label>
                    <input
                    type="checkbox"
                    class="checkbox-toggle"
                    name="is_highlight"
                    id="highlight"
                    {{ isset($product)&&$product->is_highlight==1?'checked':'' }}
                    />
                    <label class="label-checkbox" for="highlight"
                    >Nổi bật</label
                    >
                </div>
                <small class="form-text"
                    >Khi tính năng “Nổi bật” được bật, sản phẩm này sẽ đc hiển
                    thị trên trang chủ hoặc các điểm chỉ định trên giao
                    diện.</small
                >
                <div class="mb-2">
                    <label class="control-label">Mới</label>
                    <input
                    type="checkbox"
                    class="checkbox-toggle"
                    name="is_new"
                    id="new"
                    {{ isset($product)&&$product->is_new==1?'checked':'' }}
                    />
                    <label class="label-checkbox" for="new">Mới </label>
                </div>
                <small class="form-text"
                    >Khi tính năng “Mới” được bật, sản phẩm này sẽ đc hiển thị
                    trên trang chủ hoặc các điểm chỉ định trên giao
                    diện.</small
                >
                </div>

                <div class="col-lg-6">
                <legend>Tối ưu hóa SEO</legend>
                <div class="form-group">
                    <label class="control-label"
                    >Tiêu đề Browser (title)</label
                    >
                    <input
                    type="text"
                    class="form-control"
                    name="meta_title"
                    placeholder="Tiêu đề Browser (title)"
                    value="{{$product->meta_title ?? ''}}"
                    />
                    <small class="form-text"
                    >Tiêu đề của trang chủ có tác dụng tốt nhất cho
                    SEO</small
                    >
                </div>

                <div class="form-group">
                    <label class="control-label">Tối ưu hóa URL</label>
                    <input
                    type="text"
                    class="form-control"
                    name="slug"
                    placeholder="Tối ưu URL"
                    value="{{$product->slug ?? ''}}"
                    />
                    <small class="form-text"
                    >Tối ưu hóa đường dẫn URL dể tốt nhất cho SEO.</small
                    >
                </div>

                <div class="form-group">
                    <label class="control-label">Thẻ Meta Description</label>
                    <input
                        type="text"
                        class="form-control"
                        name="meta_description"
                        placeholder="Thẻ Meta Description"
                        value="{{$product->meta_description ?? ''}}"
                    />
                    <small class="form-text"
                        >Thẻ meta description của trang cung cấp cho Google và các công cụ tìm kiếm bản tóm tắt nội dung của trang đó. Trong khi tiêu đề trang có thể là vài từ hoặc cụm từ, thẻ mô tả của trang phải có một hoặc hai câu hoặc một đoạn ngắn. Thẻ meta description là một yếu tố SEO Onpage khá cơ bản cần được tối ưu cẩn thận</small
                    >
                    </div>

                    <div class="form-group">
                        <label class="control-label">Thẻ Meta keywords</label>
                        <input
                        type="text"
                        class="form-control"
                        name="meta_keyword"
                        placeholder="Thẻ Meta keywords"
                        value="{{$product->meta_keyword ?? ''}}"
                        />
                        <small class="form-text"
                        >Meta Keywords (Thẻ khai báo từ khóa trong SEO) Trong quá trình biên tập nội dung, Meta Keywords là một thẻ được dùng để khai báo các từ khóa dùng cho bộ máy tìm kiếm. Với thuộc tính này, các bộ máy tìm kiếm (Search Engine) sẽ dễ dàng hiểu nội dung của bạn đang muốn nói đến những vấn đề gì!</small
                        >
                    </div>

                    <div class="form-group">
                        <label class="control-label">Thẻ Meta Page Topic</label>
                        <input
                            type="text"
                            class="form-control"
                            name="meta_page_topic"
                            placeholder="Thẻ Meta Page Topic"
                            value="{{$product->meta_page_topic ?? ''}}"
                        />
                        <small class="form-text"
                            >Theo chuẩn SEO, thẻ meta page topic sẽ là tiêu điểm của trang web đang có nội dung nói về chủ đề nào</small
                        >
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
                            <div class="fileinput-new img-thumbnail" style="width: 400px; height: 300px;">
                                <img src="/assets/admin/img/image_placeholder.jpg"  alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 400px; max-height: 300px;"></div>
                            <div>
                                <span class="btn btn-outline-secondary btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="avatar"></span>
                                <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <legend>Thuộc tính sản phẩm</legend>
                        <a class="btn btn-secondary" data-toggle="modal" data-target="#selectProductAttributeModal">
                            Thêm thuộc tính
                        </a>
                    </div>
                    <div class="col-12 product-attribute-option">
                        @include('admin.partials.productAttributeOptions', [
                            'product' => $product,
                            'productAttributes' => $productAttributeSelected
                        ])
                    </div>
                </div>

                <!-- CK Editor -->
                <hr>
                <div class="row">
                    <div class="col-12">
                    <legend>Nội dung mô tả</legend>
                    <div class="form-group">
                        <textarea class="form-control ck-classic" name="description">{{$product->description?? ''}}</textarea>
                    </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                    <legend>Nội dung chi tiết</legend>
                    <div class="form-group">
                        <textarea class="form-control ck-classic" name="detail">{{$product->detail?? ''}}</textarea>
                    </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal select product attribute --}}
<div class="modal fade" id="selectProductAttributeModal" tabindex="-1" role="dialog" aria-labelledby="selectProductAttributeModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="selectProductAttributeModalTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @forelse ($productAttributes as $item)
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input select-attribute-input" type="checkbox" value="{{ $item->id }}" checked="">
                    {{ $item->name }}
                </label>
            </div>
            @empty
            <p>Chưa có thuộc tính thêm nào cả.</p>
            <p>Đi đến <a href="{{ route('admin.product-attributes.index') }}" target="_blank">Quản lý thuộc tính thêm</a>...</p>
            @endforelse
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary btn-submit-select-product-attribute">Save changes</button>
        </div>
        </div>
    </div>
</div>

@endsection
@push('js')
<script src="/assets/admin/js/products.edit.js"></script>
@endpush
