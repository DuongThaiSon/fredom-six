@extends('admin.layouts.main', ['activePage' => 'menus-categories', 'title' => __('Menu')])
@section('content')
<!-- Content -->
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <a href="{{ route('admin.menu-categories.index') }}" class="btn btn-sm btn-dark"
                data-toggle="tooltip" title="">
                <i class="material-icons">
                    keyboard_arrow_left
                </i>
                <span class="pt-5">Quay lại</span>
            </a>
            <h1 class="mt-3 pl-4">QUẢN LÝ MENU</h1>
            <!-- Save group button -->
            <div class="save-group-buttons">
                <a href="{{ route('admin.menus.create', ['category' => $categoryId]) }}" class="btn btn-sm btn-dark"
                    data-toggle="tooltip" title="Thêm mới">
                    <i class="material-icons">
                        note_add
                    </i>
                </a>
            </div>

            <!-- TABLE -->
            <div class="card-body">
                <div class="table-responsive bg-white mt-4" id="table" data-reorder="{{ route('admin.menus.reorder') }}"
                    data-destroy-many="{{ route('admin.menus.destroyMany') }}">
                    <table class="table-sm table-hover mb-2" width="100%">
                        <thead>
                            <tr class="text-muted">
                                <th width="5%"></th>
                                {{-- <th width="3%" class="text-center">
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
                                </th> --}}
                                <th width="5%">ID</th>
                                <th width="25%">TÊN MENU</th>
                                <th width="20%">THUỘC DANH MỤC </th>
                                <th width="15%">Người cập nhật</th>
                                <th width="20%">Ngày cập nhật</th>
                                <th width="10%" class="text-right">Thao tác</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                @include('admin.partials.menuRows')
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('assets/admin') }}/js/menus.index.js"></script>
@endpush
