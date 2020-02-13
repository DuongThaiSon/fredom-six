@extends('admin.layouts.main', ['activePage' => 'users-admins', 'title' => __('List Members')])
@section('content')
<!-- Content -->
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <h1 class="mt-3 pl-4">QUẢN LÝ QUẢN TRỊ VIÊN</h1>
            <!-- Save group button -->
            <div class="save-group-buttons">
                <a class="btn btn-sm btn-dark" data-toggle="tooltip" title="Thêm thành viên mới"
                    href="{{ route('admin.users.admins.create')}}">
                    <i class="material-icons">
                        note_add
                    </i>
                </a>
                <button data-toggle="tooltip" title="Xóa toàn bộ mục đã chọn"
                    class="btn btn-sm btn-dark delete-all-user" id="btn-del-all">
                    <i class="material-icons">
                        delete_forever
                    </i>
                </button>
            </div>

            <!-- TABLE -->
            <div class="bg-white mt-4">
                <table class="table-sm table-hover table mb-2" width="100%" id="table" data-url="{{ route('admin.users.admins.list') }}" data-destroy-many="{{ route('admin.users.admins.destroyMany') }}">
                    <thead>
                        <tr class="text-muted">
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
                            <th>Tên hiển thị</th>
                            <th>Email</th>
                            <th width="15%">Trạng thái</th>
                            <th width="10%">Ngày tạo</th>
                            <th class="text-right" width="10%">
                                Thao tác
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
</section>
</div>

@endsection
@push('js')
<script src="{{ asset('assets/admin') }}/js/users.admins.index.js"></script>
@endpush
