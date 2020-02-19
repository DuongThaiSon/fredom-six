@extends('admin.layouts.main', ['activePage' => 'products-index', 'title' => __('List Products')])
@section('content')
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <h1 class="mt-3 pl-4">Tin bài</h1>
            <!-- Save group button -->
            <div class="save-group-buttons">
                <a href="{{route('admin.products.create')}}" class="btn btn-sm btn-dark" data-toggle="tooltip"
                    title="Thêm bài viết mới">
                    <i class="material-icons">
                        note_add
                    </i>
                </a>
                <button data-toggle="tooltip" title="Xóa toàn bộ mục được chọn" class="btn btn-sm btn-dark"
                    target="_blank" id="btn-del-all">
                    <i class="material-icons">
                        delete_forever
                    </i>
                </button>
                <a href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc" target="_blank"
                    class="btn btn-sm btn-dark">
                    <i class="material-icons">
                        help_outline
                    </i>
                </a>
            </div>
            <!-- TABLE -->
            <div class="bg-white mt-4">
                <table class="table-sm table-responsive table-hover table mb-2" width="100%" id="table" data-reorder="{{ route('admin.products.reorder') }}"
                data-destroy-many="{{ route('admin.products.destroyMany') }}"
                data-update-view-status="{{ route('admin.products.updateViewStatus') }}"
                data-list="{{ route('admin.products.index') }}">
                    <thead>
                        <tr class="text-muted">
                            <th width="5%"></th>
                            <th width="3%" class="text-center">
                                <div class="pretty p-icon p-curve p-bigger p-has-indeterminate p-smooth"
                                    style="font-size: 15px">
                                    <input type="checkbox" class="btn-check-all" />
                                    <div class="state p-primary">
                                        <i class="icon material-icons">done</i>
                                        <label></label>
                                    </div>
                                    <div class="state p-is-indeterminate p-primary">
                                        <i class="icon material-icons">remove</i>
                                        <label></label>
                                    </div>
                                </div>
                            </th>
                            <th width="7%">ID</th>
                            <th width="25%">Tên sản phẩm</th>
                            <th width="15%">Mục</th>
                            <th width="5%">Hiển thị</th>
                            <th width="5%">Nổi bật</th>
                            <th width="5%">Mới</th>
                            <th width="10%">Ngày tạo</th>
                            <th width="10%">Người đăng</th>
                            <th width="10%" class="text-right">Thao tác</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="/assets/admin/js/products.index.js"></script>
@endpush
