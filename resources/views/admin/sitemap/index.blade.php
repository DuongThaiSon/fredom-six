@extends('admin.layouts.main', ['activePage' => 'sitemap', 'title' => __('Sitemap')])
@section('content')
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <h1 class="mt-3 pl-4">Sitemap</h1>
            <!-- Save group button -->
            <div class="save-group-buttons">
                <a href="{{route('admin.sitemap.index')}}" class="btn btn-sm btn-dark btn-create-backup" data-toggle="tooltip"
                    title="Tạo sao lưu mới">
                    <i class="material-icons">
                        note_add
                    </i>
                </a>
                {{-- <button data-toggle="tooltip" title="Xóa toàn bộ mục được chọn" class="btn btn-sm btn-dark"
                    target="_blank" id="btn-del-all">
                    <i class="material-icons">
                        delete_forever
                    </i>
                </button> --}}
            </div>

            <div class="table-responsive bg-white mt-4">
                <table id="sitemap-table" class="table table-sm table-hover text-dark" cellspacing="0" width="100%" style="width:100%" data-href="{{ route('admin.sitemap.data') }}">
                    <thead>
                        <tr>
                            <th>URL</th>
                            <th>Priority</th>
                            <th>Update frequency</th>
                            <th>Updated at</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="/assets/admin/vendor/datatables/datatables.min.js"></script>
<script src="/assets/admin/js/sitemap.index.js"></script>
@endpush
