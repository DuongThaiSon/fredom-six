@extends('admin.layouts.main', ['activePage' => 'products-create', 'title' => __('Products Detail')])
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
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#nav-review">Quản lý review</a>
                </li>
            </ul>
            <br>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-basic" role="tabpanel" aria-labelledby="nav-basic-tab">
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
                                <label>@importantfield Tiêu đề sản phẩm</label>
                                <input
                                type="text"
                                name="name"
                                required
                                class="form-control"
                                placeholder="The cat in the hat"
                                value="{{$product->name ?? ''}}"
                                />
                                <small class="form-text">Tên sản phẩm</small>
                            </div>

                            <div class="form-group">
                                <label>Loại sản phẩm</label>
                                <select
                                    disabled
                                    class="selectpicker form-control"
                                    data-style="select-with-transition"
                                    title="Chọn loại sản phẩm"
                                    data-show-tick="true">
                                    @forelse ($typeOptions as $optionKey => $optionValue)
                                        <option value="{{ $optionKey }}" {{ $product->type===$optionKey?'selected':'' }}>{{ $optionValue }}</option>
                                    @empty

                                    @endforelse
                                </select>
                            </div>

                            @php
                                $selectedCategories = $product->categories->pluck('id')->toArray();
                            @endphp
                            <div class="form-group">
                                <label>@importantfield Nằm trong mục</label>
                                <select
                                    required
                                    name="category[]"
                                    data-selected-text-format="count > 2"
                                    class="selectpicker form-control category-selectpicker"
                                    data-count-selected-text="{0} mục đã được chọn"
                                    data-style="select-with-transition"
                                    title="Chọn mục sản phẩm"
                                    data-size="7"
                                    data-show-tick="true"
                                    id="product-category"
                                    multiple
                                    >

                                    <option value="0"></option>
                                    @php
                                        // $selectedCategoryId = optional($product->categories()->first())->id;
                                        $selectedCategoryId = $product->categories->pluck('id');
                                    @endphp
                                    @include('admin.partials.productOptions', ['level' => 0, 'selectedCategoryId' => $selectedCategoryId])

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
                                  @php
                                    $selectedShowroom = optional($product->showrooms()->get()->pluck('id'));
                                    // print_r($selectedShowroom);die;
                                    @endphp
                                  @forelse ($showrooms as $showroomValue)
                                  <option value="{{ $showroomValue->id }}" {{ isset($selectedShowroom)&&$selectedShowroom->contains($showroomValue->id)?'selected':'' }}>
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
                                <label>Discount (%)</label>
                                <input
                                type="number"
                                name="discount"
                                class="form-control"
                                placeholder=""
                                value="{{ $product->discount ?? ''}}"
                                />
                                <small class="form-text">Khuyến mãi của sản phẩm tính theo %</small>
                            </div>
                            {{--  <div class="row">
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
                            </div>  --}}


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
                                <label>Weight (Gram)</label>
                                <input
                                type="text"
                                name="Weight"
                                required
                                class="form-control"
                                placeholder="Cân nặng của sản phẩm tính theo gram"
                                value="{{$product->weight ?? ''}}"
                                />
                                <small class="form-text">Cân nặng sản phẩm tính theo gram</small>
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
                                        <img src="/{{ env('UPLOAD_DIR_PRODUCT') }}/{{ $product->avatar }}"  alt="...">
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
                            <legend>Size Chart</legend>
                            <div class="form-group">
                                <textarea class="form-control ckeditor" name="size_chart">{{$product->size_chart?? ''}}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                        <legend>Nội dung mô tả</legend>
                        <div class="form-group">
                            <textarea class="form-control ckeditor" name="description">{{$product->description?? ''}}</textarea>
                        </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                        <legend>Nội dung chi tiết</legend>
                        <div class="form-group">
                            <textarea class="form-control ckeditor" name="detail">{{$product->detail?? ''}}</textarea>
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
                                            <input type="file" class="custom-file-input upload-variant-image" id="input-image">
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
                <div class="tab-pane fade show" id="nav-attribute" role="tabpanel" aria-labelledby="nav-image-tab">
                        <div class="row">
                            <div class="col-lg-6">
                                <legend>Thuộc tính sản phẩm</legend>
                                <br>
                                <div class="form-group">
                                    <label>Chọn thuộc tính</label>
                                    <select
                                        multiple
                                        name="attributes"
                                        data-selected-text-format="count > 0"
                                        class="selectpicker form-control attribute-selectpicker"
                                        data-count-selected-text="{0} mục đã được chọn"
                                        data-style="select-with-transition"
                                        title="Chọn thuộc tính cho sản phẩm"
                                        data-size="7"
                                        data-show-tick="true">

                                        @forelse ($productAttributes as $attribute)
                                            <option value="{{ $attribute->id }}" {{ $selectedProductAttributes->contains($attribute->id)?'selected':'' }}>{{ $attribute->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <legend>&nbsp;</legend>
                                <br>
                                <div>
                                    <label>Thuộc tính đã chọn</label>
                                    <p class="selected-value mt-2">&nbsp;</p>
                                </div>
                                <div>
                                    <button class="btn btn-block btn-primary border btn-make-variation" data-href="{{ route('admin.variants.store', $product->id) }}">
                                        Tạo biến thể
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive bg-white mt-4 col-12 product-variants-list" id="cat_table">
                                @include('admin.productVariants.index', ['products' => $product->variants->unique('id')->paginate(15)->withPath(route('admin.variants.index', $product->id))])
                            </div>
                        </div>
                    </div>
                <div class="tab-pane fade show" id="nav-review" role="tabpanel" aria-labelledby="nav-image-tab">
                    <div class="row">
                        <div class="col-12">
                            <legend>Quản lý review</legend>
                            <div class="row">
                                <div class="table-responsive bg-white mt-4" id="cat_table">
                                    <table class="table-sm table-hover table mb-2" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="5%">STT</th>
                                                <th width="15%">Người tạo</th>
                                                <th width="40%">Review</th>
                                                <th width="10%">Đánh giá</th>
                                                <th width="15%">Ngày tạo</th>
                                                <th width="10%">Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product->reviews as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->user->name ?? '' }}</td>
                                                    <td>{{ $item->content ?? '' }}</td>
                                                    <td>{{ $item->rate ?? '' }} *</td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>
                                                        <button class="btn btn-sm p-1 btn-delete" data-toggle="tooltip" title="Xoá" type="submit" data-user="{{ $item->user_id }}" data-product="{{ $item->product_id }}" data-href="{{ route('admin.reviews.destroy', $item->product_id) }}">
                                                            <i class="material-icons">delete</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="form-group col-4">
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input upload-variant-image" id="input-image">
                                            <label class="custom-file-label" for="input-image">Chọn ảnh</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="image-showcase">
                                @include('admin.products.imageShowcase')
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="variant-edit-modal" tabindex="-1" role="dialog" aria-labelledby="variant-edit-modal-label"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrol-lable modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="variant-edit-modal-label">Cập nhật thông tin biến thể</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary btn-submit-variant-edit">Lưu</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="/assets/admin/js/products.edit.js"></script>
@endpush
