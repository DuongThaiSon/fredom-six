@extends('admin.layouts.main', ['activePage' => 'contacts-index', 'title' => __('Contact')])
@section('content')

<!-- Content -->
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <h1 class="mt-3 pl-4">QUẢN LÝ NỘI DUNG LIÊN HỆ TỪ KHÁCH HÀNG</h1>
            <!-- Save group button -->
            <div class="save-group-buttons">
                <button data-toggle="tooltip" title="Xóa toàn bộ mục đã chọn"
                    class="btn btn-sm btn-dark" id="btn-del-all">
                    <i class="material-icons">
                        delete_forever
                    </i>
                </button>
            </div>

            <!-- TABLE -->
            <div class="bg-white mt-4 p-2">
                <div class="row">
                    <div class="form-group col-lg-5 col-md-8 col-sm-12">
                        <label for="message-text" class="col-form-label">Lọc trạng thái</label>
                        <select class="form-control selectpicker" name="filter_status" multiple>
                            @forelse ($statuses as $key => $item)
                            <option value="{{ $key }}">{{ $item }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                </div>
                <table class="table-sm table-hover table" width="100%" id="table"
                    data-destroy-many="{{ route('admin.contacts.destroyMany') }}"
                    data-list="{{ route('admin.contacts.list') }}">
                    <thead>
                        <tr class="text-muted">
                            <th width="3%" class="text-center">
                                <div class="pretty p-icon p-curve p-bigger p-has-indeterminate p-smooth"
                                    style="font-size: 15px">
                                    <input type="checkbox" class="btn-check-all" />
                                    <div class="state p-primary">
                                        <i class="icon material-icons">done</i>
                                        <label></label>
                                    </div>
                                    <div class="state p-is-indeterminate p-primary">
                                        <i class="icon material-icons">remove</i>
                                        <label></label>
                                    </div>
                                </div>
                            </th>
                            <th width="7%">ID</th>
                            <th>Họ tên</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th width="10%">Trạng thái</th>
                            <th width="10%">Ngày tạo</th>
                            <th width="10%" class="text-right">Thao tác</th>
                        </tr>
                    </thead>
                </table>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="contactDetailModal" tabindex="-1" role="dialog" aria-labelledby="contactDetailModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactDetailModalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" name="id">
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="name" class="col-form-label">Khách hàng:</label>
                            <input type="text" class="form-control" name="name" readonly>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="name" class="col-form-label">Email:</label>
                            <input type="text" class="form-control" name="email" readonly>
                        </div>
                        <div class="form-group col-lg-4 col-md-12 col-sm-12">
                            <label for="name" class="col-form-label">Số điện thoại:</label>
                            <input type="text" class="form-control" name="phone" readonly>
                        </div>
                        <div class="form-group col-lg-8 col-md-12 col-sm-12">
                            <label for="name" class="col-form-label">Địa chỉ:</label>
                            <input type="text" class="form-control" name="address" readonly>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="message-text" class="col-form-label">Nội dung:</label>
                            <textarea class="form-control" name="content" readonly></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="message-text" class="col-form-label">Ghi chú:</label>
                            <textarea class="form-control bg-white border-bottom" name="note"></textarea>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                            <label for="message-text" class="col-form-label">Trạng thái:</label>
                            <select class="form-control" name="status">
                                @forelse ($statuses as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded" data-dismiss="modal">Huỷ</button>
                <button type="button" class="btn btn-primary btn-update-contact rounded">Cập nhật</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('assets/admin') }}/js/contacts.index.js"></script>
@endpush
