@extends('admin.layouts.main', ['activePage' => 'product-attributes-index', 'title' => __('Detail Category')])
@section('content')
    <div id="main-content">
        <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <h1 class="mt-3 pl-4 text-uppercase">thêm mới thuộc tính</h1>
            <!-- Save group button -->
            <form action="{{route('admin.product-attributes.store')}}" method="POST" enctype="application/json" class="form-main bg-white mt-3 mb-0 p-4 pt-5">

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
                            <input type="text" name="name" required class="form-control"/>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 select-zone">
                        <legend>Tạo lựa chọn</legend>
                        <div class="selection-list">

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
                        <div class="form-group mb-4">
                            <label class="control-label">Cho phép chọn nhiều
                                <input type="checkbox" value="checked" checked class="checkbox-toggle" name="allow_multiple" id="allow_multiple"/>
                                <label class="label-checkbox" for="allow_multiple"> </label>
                            </label>
                            <small class="form-text">
                                Khi tính năng “Cho phép chọn nhiều” được bật, sản phẩm có thể chọn nhiều lựa chọn của thuộc tính này cùng lúc
                            </small>
                        </div>

                        <div class="form-group mb-2">
                            <label class="control-label">Kiểu dữ liệu
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="type" value="text" class="custom-control-input" checked>
                                <label class="custom-control-label font-weight-normal" for="customRadio1">Text</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" name="type" value="color" class="custom-control-input" >
                                <label class="custom-control-label font-weight-normal" for="customRadio2">Color</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio3" name="type" value="date" class="custom-control-input" >
                                <label class="custom-control-label font-weight-normal" for="customRadio3">Date</label>
                            </div>
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
<script src="/assets/admin/js/product-attributes.create.js"></script>
@endpush
