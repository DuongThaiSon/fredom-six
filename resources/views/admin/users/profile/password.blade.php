@extends('admin.layouts.main', ['activePage' => 'users-profile', 'title' => __('Edit Password')])
@section('content')
<!-- Content -->
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">

            <h1 class="mt-3 pl-4">cập nhật mật khẩu</h1>

            <form action="{{ route('admin.users.profile.changePassword') }}" class="mb-0 p-4 bg-white" method="POST">
                @csrf

                @if ($errors->any())
                @component('admin.layouts.components.alert')
                @slot('title', 'Lỗi!')
                @slot('type', 'danger')
                {{ $errors->first() }}
                @endcomponent
                @endif

                @if (session()->has('success'))
                @component('admin.layouts.components.alert')
                @slot('title', 'Thành công!')
                @slot('type', 'success')
                {{ session()->get('success') }}
                @endcomponent
                @endif

                <div class="save-group-buttons">
                    <button class="btn btn-sm btn-dark" data-toggle="tooltip" title="Lưu">
                        <i class="material-icons">
                            save
                        </i>
                    </button>
                    <a class="btn btn-sm btn-dark"
                        href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc?usp=sharing"
                        target="_blank">
                        <i class="material-icons">
                            help_outline
                        </i>
                    </a>
                </div>
                <div class="row">
                    <div class="offset-lg-3 col-lg-6 offset-md-2 col-md-8 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Mật khẩu hiện tại @importantfield</label>
                            <input type="password" class="form-control" name="password_current" required />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Mật khẩu mới @importantfield</label>
                            <input type="password" class="form-control" name="password" required />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Mật khẩu mới nhập lại @importantfield</label>
                            <input type="password" class="form-control" name="password_confirmation" required />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@include('admin.partials.uploadAvatarModal')
</section>
@push('js')
<script src="/assets/admin/js/users.profile.edit.js"></script>
@endpush
@endsection
