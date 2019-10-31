@extends('admin.layouts.main', ['activePage' => 'product-attributes', 'title' => __('Detail Category')])
@section('content')
    <div id="main-content">
        <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <h1 class="mt-3 pl-4 text-uppercase">sửa thuộc tính</h1>
            <!-- Save group button -->
            <form action="{{route('admin.product-attributes.update', $productAttribute->id)}}" method="POST" enctype="application/json" class="form-main bg-white mt-3 mb-0 p-4 pt-5">
                @method('PUT')
                @csrf
                @if ($errors->any())
                <div class="alert bg-danger" role="alert">
                    <svg class="glyph stroked cancel">
                        <use xlink:href="#stroked-cancel"></use>
                    </svg>{{ $errors->first() }}<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                </div>
                @endif
            <div class="save-group-buttons">
                <button class="btn btn-sm btn-dark btn-submit-data" data-toggle="tooltip" title="Lưu">
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
                        <label>Tên thuộc tính</label>
                        <input type="text" name="name" required class="form-control" value="{{ $productAttribute->name }}"/>
                    </div>

                    <!-- Button Toggle -->
                    <div class="mb-2 d-none">

                        <label class="control-label">Giới hạn lựa chọn
                            <input type="checkbox" value="checked" {{ $productAttribute->can_select?'checked':'' }} class="checkbox-toggle" name="can_select" id="can_select" checked/>
                            <label class="label-checkbox" for="can_select"> </label>
                        </label>
                    </div>
                    <small class="form-text d-none">
                        Khi tính năng “Giới hạn lựa chọn” được bật, có thể tạo các lựa chọn cụ thể cho thuộc tính
                    </small>

                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 select-zone">
                    <legend>Tạo lựa chọn</legend>
                    <div class="selection-list">
                        @forelse ($productAttribute->productAttributeValues()->get() as $item)
                        <div class="row form-group selection-item">
                            <div class="col-10 input-group">
                                <input type="hidden" name="attribute_values[{{ $item->id }}][id]" value="{{ $item->id }}" class="form-control selection-item-id"/>
                                <input type="text" name="attribute_values[{{ $item->id }}][value]" value="{{ $item->value }}" class="form-control selection-item-value"/>
                                <div class="input-group-prepend">
                                    <a href="#" class="text-decoration-none btn-remove-selection-item">
                                        <div class="input-group-text bg-white">
                                            <i class="material-icons">delete</i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @empty
                        @endforelse
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <button class="btn btn-light btn-block btn-add-selection-item">
                                <i class="material-icons">playlist_add</i>
                                Thêm lựa chọn
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 select-zone">
                    <legend>&nbsp;</legend>
                    <div class="mb-2">
                        <label class="control-label">Cho phép chọn nhiều
                            <input type="checkbox" value="checked" {{ $productAttribute->allow_multiple?'checked':'' }} class="checkbox-toggle" name="allow_multiple" id="allow_multiple"/>
                            <label class="label-checkbox" for="allow_multiple"> </label>
                        </label>
                    </div>
                    <small class="form-text">
                        Khi tính năng “Cho phép chọn nhiều” được bật, sản phẩm có thể chọn nhiều lựa chọn của thuộc tính này cùng lúc
                    </small>
                </div>
            </div>
            </form>
            <!-- End form -->
        </div>
        </div>
    </div>
@endsection
@push('js')
<script src="/assets/admin/js/product-attributes.create.js"></script>
@endpush
