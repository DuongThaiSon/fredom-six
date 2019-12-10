@extends('admin.layouts.main', ['activePage' => 'setting', 'title' => __('List Settings')])
@section('content')
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <h1 class="mt-3 pl-4">Cài đặt thông số</h1>
            <!-- Save group button -->
            <div class="save-group-buttons">
                <a href="{{route('admin.settings.create')}}" class="btn btn-sm btn-dark btn-open-form-setting" data-toggle="tooltip"
                    title="Thêm bài viết mới">
                    <i class="material-icons">
                        note_add
                    </i>
                </a>
            </div>

            <!-- TABLE -->
            <div class="table-responsive bg-white mt-4" id="cat_table">
                @include('admin.settings.list')
            </div>

            <a href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc?usp=sharing"
                class="float-right mt-4">
                <i class="material-icons">
                    help_outline
                </i>
            </a>
        </div>
        {{-- </form> --}}
    </div>
</div>

<div class="modal fade bd-modal-lg modal-open-setting-form" tabindex="-1" role="dialog" aria-labelledby="settingFormModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thông số cài đặt</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary btn-submit-form-setting">Lưu</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="/assets/admin/js/settings.index.js"></script>
@endpush
