@extends('admin.layouts.main', ['activePage' => 'users-profile', 'title' => __('Edit Profile')])
@section('content')
<!-- Content -->
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">

            <h1 class="mt-3 pl-4">THÔNG TIN CÁ NHÂN</h1>

            <form action="{{ route('admin.users.profile.update') }}" class="mb-0 p-4 bg-white" method="POST"
                enctype="multipart/form-data">
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
                    <div class="col-lg-4 col-md-5 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Ảnh đại diện</label>
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' id="imageUpload"/>
                                    <input type='hidden' name="avatar" value=""/>
                                    <label for="imageUpload"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview"
                                        style="background-image: url({{ asset("media/images/users/$user->avatar") }});">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-7 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Họ tên @importantfield</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') ?? $user->name }}" required />

                        </div>
                        <div class="form-group">
                            <label class="control-label">Email @importantfield</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="abc@mail.com" disabled />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Số điện thoại</label>
                            <input type="text" class="form-control" name="phone" value="{{ old('phone') ?? $user->phone }}" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" value="{{ old('address') ?? $user->address }}" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Sinh nhật</label>
                            <input type="text" class="form-control date-picker" name="birthday" value="{{ old('birthday') ?? $user->birthday }}" />
                        </div>
                        <div class="form-group pb-4 pt-2">
                            <label class="control-label pr-2">Giới tính</label>

                            <div class="pretty p-icon p-round p-plain p-smooth p-bigger mt-2">
                                <input type="radio" name="gender" value="male" {{ $user->gender === 'male' ? 'checked' : '' }}>
                                <div class="state p-info-o">
                                    <i class="icon fas fa-mars"></i>
                                    <label>Nam</label>
                                </div>
                            </div>
                            <div class="pretty p-icon p-round p-plain p-smooth p-bigger mt-2" {{ $user->gender === 'female' ? 'checked' : '' }}>
                                <input type="radio" name="gender" value="female">
                                <div class="state p-danger-o">
                                    <i class="icon fas fa-venus"></i>
                                    <label>Nữ</label>
                                </div>
                            </div>
                            <div class="pretty p-icon p-round p-plain p-smooth p-bigger mt-2">
                                <input type="radio" name="gender" value="other" {{ $user->gender === 'other' ? 'checked' : '' }}>
                                <div class="state p-warning-o">
                                    <i class="icon fas fa-venus-mars"></i>
                                    <label>Khác</label>
                                </div>
                            </div>
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
