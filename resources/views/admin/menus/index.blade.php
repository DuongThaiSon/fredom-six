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
                <a href="{{ route('admin.menus.create', $category_id) }}" class="btn btn-sm btn-dark"
                    data-toggle="tooltip" title="Thêm mới">
                    <i class="material-icons">
                        note_add
                    </i>
                </a>
            </div>

            <!-- TABLE -->
            <div class="card-body">
                <div class="table-responsive bg-white mt-4" id="table">
                    <table class="table-sm table-hover mb-2" width="100%">
                        <thead>
                            <tr class="text-muted">
                                <th style="width: 4%;"></th>
                                {{-- <th style="width: 3%;" class="text-center">
                        <a id="btn-ck-all" href="#" data-toggle="tooltip" title="Chọn / bỏ chọn toàn bộ">
                            <i class="material-icons text-muted">check_box_outline_blank</i>
                        </a>
                        </th> --}}
                                <th style="width: 6%;">ID</th>
                                <th style="width: 20%;">TÊN MENU</th>
                                <th style="width: 20%">THUỘC DANH MỤC </th>
                                <th style="width: 15%;">Người đăng</th>
                                <th style="width: 20%;">Ngày tạo</th>
                                <th style="width: 15%">Thao tác</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                @include('admin.partials.menu_rows',['level' => 0])
            </div>
            <a target="_blank"
                href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc?usp=sharing"
                class="float-right mt-4">
                <i class="material-icons">
                    help_outline
                </i>
            </a>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('assets/admin') }}/js/menus.js"></script>
<script>
    $(document).ready(function () {
      core.makeTableOrderable('/admin/menus/sort');
      // core.initCheckboxButton();
  })
</script>
@endpush
