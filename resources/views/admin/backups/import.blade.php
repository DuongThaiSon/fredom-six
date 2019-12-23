@extends('admin.layouts.main', ['activePage' => 'backup', 'title' => __('Restore Backups')])
@section('content')
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $errors->first() }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div id="content">
            <h1 class="mt-3 pl-4">Khôi phục cơ sở dữ liệu</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h6>Chọn tệp tin khôi phục</h6>
                        <p>Tệp tin có thể ở dạng nén .zip hoặc tệp không nén .sql</p>
                    </div>
                    <div class="col-6">
                        <form class="form-request-restore" action="{{ route('admin.backups.restore') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="import_file" accept=".sql,.zip">
                                        <label class="custom-file-label" >Choose file</label>
                                    </div>
                                    <small>&nbsp;</small>
                                </div>
                                <div class="col-12 mt-5">
                                    <button class="btn btn-primary btn-request-restore" data-target="{{ route('admin.backups.index') }}">Khôi phục</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="/assets/admin/js/backups.import.js"></script>
@endpush
