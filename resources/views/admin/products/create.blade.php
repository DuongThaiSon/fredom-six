@extends('admin.layouts.main', ['activePage' => 'products-create', 'title' => __('Products Detail')])
@section('content')
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <h1 class="mt-3 pl-4">Thông tin sản phẩm</h1>
            <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data" class="bg-white mt-3 p-4 pt-5">
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
                    <input type="text" name="id" class="form-control" readonly="readonly" />
                    <small class="form-text"
                    >ID là mã của tin bài, đây là một thuộc tính duy
                    nhất</small
                    >
                </div>

                <div class="form-group">
                    <label>@importantfield Tên sản phẩm</label>
                    <input
                    type="text"
                    name="name"
                    required
                    class="form-control"
                    placeholder="The cat in the hat"
                    value=""
                    />
                    <small class="form-text">Tên của tin bài</small>
                </div>
                {{-- <div class="form-group">
                    <label>@importantfield Loại sản phẩm</label>
                    <select
                        required
                        name="type"
                        class="selectpicker form-control"
                        data-style="select-with-transition"
                        title="Chọn loại sản phẩm"
                        data-show-tick="true">
                        @forelse ($typeOptions as $optionKey => $optionValue)
                            <option value="{{ $optionKey }}">{{ $optionValue }}</option>
                        @empty

                        @endforelse
                    </select>
                </div> --}}
                <div class="form-group">
                    <label>@importantfield Nằm trong mục</label>
                    <select
                        required
                        name="category[]"
                        data-selected-text-format="count > 2"
                        class="selectpicker form-control"
                        data-count-selected-text="{0} mục đã được chọn"
                        data-style="select-with-transition"
                        title="Chọn mục sản phẩm"
                        data-size="7"
                        data-show-tick="true"
                        id="product-category"
                        multiple
                        >

                        <option value="0"></option>
                        @include('admin.partials.options', ['level'=>0])

                    </select>
                </div>
                <div class="form-group">
                    <label>Showrooms</label>
                    <select
                    required
                    name="showroom[]"
                    data-selected-text-format="count > 7"
                    class="selectpicker form-control category-selectpicker"
                    data-count-selected-text="{0} mục đã được chọn"
                    data-style="select-with-transition"
                    title="Chọn Showrooms cho sản phẩm"
                    data-size="15"
                    data-show-tick="true"
                    id="product-showroom"
                    multiple>
                      <option value="0"></option>
                      @forelse ($showrooms as $showroomValue)
                      <option value="{{ $showroomValue->id }}" >
                          {{ $showroomValue->name }} - {{ $showroomValue->regions }}
                      </option>
                         
                      @empty
                          
                      @endforelse
                    </select>
                    <small class="form-text">Chọn Showrooms cho sản phẩm</small>
                  </div>
                
                <div class="form-group">
                    <label>Giá sản phẩm</label>
                    <input
                    type="number"
                    name="price"
                    class="form-control"
                    placeholder=""
                    value=""
                    />
                    <small class="form-text">Giá của sản phẩm</small>
                </div>
                <div class="form-group">
                    <label>Discount (%)</label>
                    <input
                    type="number"
                    name="discount"
                    class="form-control"
                    placeholder=""
                    value=""
                    />
                    <small class="form-text">Khuyến mãi của sản phẩm tính theo %</small>
                </div>
                {{--  <div class="form-group">
                    <label>Discount start</label>
                    <input
                    type="datetime-local"
                    name="discount_start"
                    class="form-control"
                    placeholder=""
                    value=""
                    />
                    <small class="form-text">Thời gian bắt đầu khuyến mãi</small>
                </div>
                <div class="form-group">
                    <label>Discount end</label>
                    <input
                    type="datetime-local"
                    name="discount_end"
                    class="form-control"
                    placeholder="The cat in the hat"
                    value=""
                    />
                    <small class="form-text">Thời gian kết thúc khuyến mãi</small>
                </div>  --}}
                <div class="form-group">
                    <label>Unit</label>
                    <input
                    type="text"
                    name="unit"
                    class="form-control"
                    placeholder=""
                    value=""
                    />
                    <small class="form-text">Đơn vị sản phẩm</small>
                </div>
                <div class="form-group">
                    <label>Weight (Gram)</label>
                    <input
                    type="text"
                    name="weight"
                    required
                    class="form-control"
                    placeholder="Cân nặng của sản phẩm tính theo gram"
                    />
                    <small class="form-text">Cân nặng sản phẩm tính theo gram</small>
                </div>
                <div class="form-group">
                    <label>SKU</label>
                    <input
                    type="text"
                    name="sku"
                    required
                    class="form-control"
                    placeholder="SKU của sản phẩm"                    
                    />
                    <small class="form-text">SKU của sản phẩm</small>
                </div>
                <div class="form-group">
                    <label>Product code</label>
                    <input
                    type="text"
                    name="product_code"
                    class="form-control"
                    placeholder=""
                    value=""
                    />
                    <small class="form-text">Mã sản phẩm</small>
                </div>
                <div class="form-group">
                    <label>Quantity</label>
                    <input
                    type="text"
                    name="quantity"
                    class="form-control"
                    placeholder="The cat in the hat"
                    value=""
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
                    value=""
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
                    value=""
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
                        value=""
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
                        value=""
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
                            value=""
                        />
                        <small class="form-text"
                            >Theo chuẩn SEO, thẻ meta page topic sẽ là tiêu điểm của trang web đang có nội dung nói về chủ đề nào</small
                        >
                    </div>

                    <div class="form-group">
                        <label class="control-label">Ảnh đại diện</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="avatar">
                            <label class="custom-file-label" for="">Choose file</label>
                        </div>
                    </div>

                </div>
                </div>

                {{--  <div class="form-group">
                    <label class="control-label">Ảnh đại diện</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="avatar">
                        <label class="custom-file-label" for="">Choose file</label>
                    </div>
                </div>  --}}

            {{--  </div>
            </div>  --}}
                {{--  </div>  --}}

                <hr>
                <div class="row">
                    <div class="col-12">
                    <legend>Size Chart</legend>
                    <div class="form-group">
                        <textarea class="form-control ckeditor" name="size_chart"></textarea>
                    </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                    <legend>Nội dung mô tả</legend>
                    <div class="form-group">
                        <textarea class="form-control ckeditor" name="description"></textarea>
                    </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                    <legend>Nội dung chi tiết</legend>
                    <div class="form-group">
                        <textarea class="form-control ckeditor" name="detail"></textarea>
                    </div>
                    </div>
                </div>
            
            </form>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    // CKEDITOR.replace("description");
    // CKEDITOR.replace("detail");

</script>
@endpush
