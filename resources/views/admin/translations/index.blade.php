@extends('admin.layouts.main', ['activePage' => 'translations-index', 'title' => __('translation')])
@section('content')
<!-- Content -->
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <h1 class="mt-3 pl-4">quản lý ngôn ngữ</h1>
            <div class="save-group-buttons">
                <a href="#translationDetailModal" data-toggle="modal" class="btn btn-sm btn-dark">
                    <i class="material-icons">
                        note_add
                    </i>
                </a>
                <a href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc" target="_blank"
                    class="btn btn-sm btn-dark">
                    <i class="material-icons">
                        help_outline
                    </i>
                </a>
            </div>
            <!-- TABLE -->
            <div class="row">
                <div class="form-group col-lg-5 col-md-8 col-sm-12">
                    <label for="message-text" class="col-form-label">Chọn ngôn ngữ</label>
                    <select class="form-control selectpicker" name="locale">
                        @forelse ($languages as $language)
                        <option value="{{ $language->locale }}"
                            {{ app()->getLocale() === $language->locale ? 'selected' : '' }}>{{ $language->name }}
                        </option>
                        @empty
                        @endforelse
                    </select>
                </div>
            </div>
            <div class="bg-white mt-4 p-2">
                <table class="table-sm table-hover table" width="100%" id="table">
                    <thead>
                        <tr class="text-muted">
                            <th width="15%">Mã</th>
                            <th width="40%">Mặc định</th>
                            <th width="40%">Dịch</th>
                            <th width="5%" class="text-right">Thao tác</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="translationDetailModal" tabindex="-1" role="dialog"
    aria-labelledby="translationDetailModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="translationDetailModalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" name="id">
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="name" class="col-form-label text-dark">Tên:</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="name" class="col-form-label text-dark">Mã:</label>
                            <input type="text" class="form-control" name="locale">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded" data-dismiss="modal">Huỷ</button>
                <button type="button" class="btn btn-primary btn-update-translation rounded">Cập nhật</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('assets/admin') }}/js/translations.index.js"></script>
@endpush
