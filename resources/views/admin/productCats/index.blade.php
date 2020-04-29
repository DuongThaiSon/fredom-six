@extends('admin.layouts.main', ['activePage' => 'product-categories-index', 'title' => __('Products Category')])
@section('content')
<div id="main-content">
    <!-- Search Group Button -->
    <div class="search-button-group">
        <div class="row collapse" id="advancesearch">
            <div class="form-row">
                <div class="form-group col">
                    <label>Mục</label>
                    <select class="form-control search-change p-2">
                        <option></option>
                    </select>
                </div>

                <div class="form-group col">
                    <label>Người tạo</label>
                    <select class="form-control search-change p-2">
                        <option></option>
                    </select>
                </div>

                <div class="form-group col">
                    <label>Từ ngày</label>
                    <input id="to_date" type="text" class="form-control datepicker search-change p-2" />
                </div>

                <div class="form-group col">
                    <label>Đến ngày</label>
                    <input id="from_date" type="text" class="form-control datepicker search-change p-2" />
                </div>
            </div>
        </div>
    </div>
    <!-- End Search Group Button -->
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <h1 class="mt-3 pl-4">QUẢN LÝ DANH MỤC</h1>
            <!-- Save group button -->
            <div class="save-group-buttons">
                <a href="{{route('admin.product-categories.create')}}" class="btn btn-sm btn-dark">
                    <i class="material-icons"> note_add</i>
                </a>
                <button id="btn-del-all" data-toggle="tooltip" title="Xóa toàn bộ mục đã chọn"
                    class="btn btn-sm btn-dark delete-all"
                    href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc?usp=sharing"
                    target="_blank">
                    <i class="material-icons">delete_forever</i>
                </button>
            </div>
            <!-- TABLE -->
            <div class="card-body pt-0">
                <div class="table-responsive bg-white mt-4" id="table"
                    data-reorder="{{ route('admin.product-categories.reorder') }}"
                    data-destroy-many="{{ route('admin.product-categories.destroyMany') }}">
                    <table class="table-sm table-hover" width="100%">
                        <thead>
                            <tr class="text-muted">
                                <th width="5%"></th>
                                <th width="3%" class="text-center">
                                    <div class="pretty p-icon p-curve p-bigger p-has-indeterminate p-smooth"
                                        style="font-size: 15px">
                                        <input type="checkbox" class="btn-check-all" />
                                        <div class="state">
                                            <i class="icon material-icons">done</i>
                                            <label></label>
                                        </div>
                                        <div class="state p-is-indeterminate">
                                            <i class="icon material-icons">remove</i>
                                            <label></label>
                                        </div>
                                    </div>
                                </th>
                                <th width="4%">ID</th>
                                <th width="25%">TÊN MỤC</th>
                                <th width="20%">Ngày tạo</th>
                                <th width="15%">Người đăng</th>
                                <th width="13%" class="text-right">Thao tác</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                @include('admin.partials.categoryRows')
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('assets/admin') }}/js/productCats.index.js"></script>
@endpush
