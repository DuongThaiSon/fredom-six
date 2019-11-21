@extends('admin.layouts.main', ['activePage' => 'backup', 'title' => __('List Backups')])
@section('content')
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <h1 class="mt-3 pl-4">Sao lưu</h1>
            <!-- Save group button -->
            <div class="save-group-buttons">
                <a href="{{route('admin.backups.store')}}" class="btn btn-sm btn-dark btn-create-backup" data-toggle="tooltip"
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

            <div class="table-responsive bg-white mt-4" id="table-list-backup">
                @include('admin.backups.listBackup')
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="/assets/admin/js/backups.index.js"></script>
@endpush
