@extends('admin.layouts.main', ['activePage' => 'video-categories-index', 'title' => __('Video Category')])
@section('content')
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <h1 class="mt-3 pl-4">QUẢN LÝ DANH MỤC VIDEO</h1>
            <!-- Save group button -->
            <div class="save-group-buttons">
                <a href="{{ route('admin.video-categories.create') }}" class="btn btn-sm btn-dark">
                    <i class="material-icons">
                        create_new_folder
                    </i>
                </a>
                <button data-toggle="tooltip" title="Xóa toàn bộ" class="btn btn-sm btn-dark"
                    href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc?usp=sharing"
                    target="_blank">
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
            <div class="card-body">
                <div class="table-responsive bg-white mt-4" id="table"
                    data-reorder="{{ route('admin.video-categories.reorder') }}"
                    data-destroy-many="{{ route('admin.video-categories.destroyMany') }}">
                    <table class="table-sm table-hover mb-2" width="100%">
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
<script src="{{asset('assets/admin')}}/js/videoCats.index.js"></script>
@endpush
