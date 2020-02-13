@extends('admin.layouts.main', ['activePage' => 'users-admins', 'title' => __('Show Admin')])
@section('content')
<!-- Content -->
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <h1 class="mt-3 pl-4">THÔNG TIN USER</h1>
            <form action="#" class="mb-0 p-4 bg-white">

                <div class="save-group-buttons">
                    <a class="btn btn-sm btn-dark" href="{{ route('admin.users.admins.edit', $user->id) }}"
                        data-toggle="tooltip" title="Sửa">
                        <i class="material-icons">
                            edit
                        </i>
                    </a>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-5 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Ảnh đại diện</label>
                            <div class="avatar-upload">
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
                            <label class="control-label">Họ tên</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') ?? $user->name }}"
                                disabled />

                        </div>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}"
                                placeholder="abc@mail.com" disabled />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Số điện thoại</label>
                            <input type="text" class="form-control" name="phone"
                                value="{{ old('phone') ?? $user->phone }}" disabled />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Địa chỉ</label>
                            <input type="text" class="form-control" name="address"
                                value="{{ old('address') ?? $user->address }}" disabled />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Sinh nhật</label>
                            <input type="text" class="form-control date-picker" name="birthday"
                                value="{{ old('birthday') ?? $user->birthday }}" disabled />
                        </div>
                        <div class="form-group pb-4 pt-2">
                            <label class="control-label pr-2">Giới tính</label>

                            <div class="pretty p-locked p-icon p-round p-plain p-smooth p-bigger mt-2">
                                <input type="radio" name="gender" value="male"
                                    {{ $user->gender === 'male' ? 'checked' : '' }}>
                                <div class="state p-info-o">
                                    <i class="icon fas fa-mars"></i>
                                    <label>Nam</label>
                                </div>
                            </div>
                            <div class="pretty p-locked p-icon p-round p-plain p-smooth p-bigger mt-2"
                                {{ $user->gender === 'female' ? 'checked' : '' }}>
                                <input type="radio" name="gender" value="female">
                                <div class="state p-danger-o">
                                    <i class="icon fas fa-venus"></i>
                                    <label>Nữ</label>
                                </div>
                            </div>
                            <div class="pretty p-locked p-icon p-round p-plain p-smooth p-bigger mt-2">
                                <input type="radio" name="gender" value="other"
                                    {{ $user->gender === 'other' ? 'checked' : '' }}>
                                <div class="state p-warning-o">
                                    <i class="icon fas fa-venus-mars"></i>
                                    <label>Khác</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group pb-4 pt-2">
                            <label class="control-label pr-2">Trạng thái tài khoản</label>

                            <div class="pretty p-locked p-icon p-round p-plain p-smooth p-bigger mt-2">
                                <input type="radio" name="status" value="not_verified"
                                    {{ !$user->email_verified_at ? 'checked' : '' }}>
                                <div class="state">
                                    <i class="icon material-icons text-muted">visibility_off</i>
                                    <label>Chưa kích hoạt</label>
                                </div>
                            </div>
                            <div class="pretty p-locked p-icon p-round p-plain p-smooth p-bigger mt-2">
                                <input type="radio" name="status" value="active"
                                    {{ $user->email_verified_at && $user->is_active ? 'checked' : '' }}>
                                <div class="state p-success-o">
                                    <i class="icon material-icons">visibility</i>
                                    <label>Đang hoạt động</label>
                                </div>
                            </div>
                            <div class="pretty p-locked p-icon p-round p-plain p-smooth p-bigger mt-2">
                                <input type="radio" name="status" value="disabled"
                                    {{ $user->email_verified_at && !$user->is_active ? 'checked' : '' }}>
                                <div class="state p-danger-o">
                                    <i class="icon material-icons">lock</i>
                                    <label>Bị khoá</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
</section>
@endsection
