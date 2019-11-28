@extends('admin.layouts.main', ['activePage' => 'partner-index', 'title' => __('Danh sách đối tác')])
@section('content')
<div id="main-content">

    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <h1 class="mt-3 pl-4">Đối tác</h1>
            <!-- Save group button -->
            <div class="save-group-buttons">
                <a href="{{route('admin.partners.create')}}" class="btn btn-sm btn-dark" data-toggle="tooltip"
                    title="Thêm bài viết mới">
                    <i class="material-icons">
                        note_add
                    </i>
                </a>
                <button data-toggle="tooltip" title="Xóa toàn bộ mục được chọn" class="btn btn-sm btn-dark"
                    target="_blank" id="btn-del-all">
                    <i class="material-icons">
                        delete_forever
                    </i>
                </button>
            </div>
                <!-- TABLE -->
            <div class="table-responsive bg-white mt-4" id="cat_table">
                @csrf
                <table class="table-sm table-hover table mb-2" width="100%">
                    <thead>
                        <tr class="text-muted">
                            <th class="text-center" width="10%">
                                <a id="btn-ck-all" href="#" data-toggle="tooltip" title="Chọn / bỏ chọn toàn bộ">
                                    <i class="material-icons text-muted">check_box_outline_blank</i>
                                </a>
                            </th>
                            <th witdth="10%">ID</th>
                            <th width="40%">Tên đối tác</th>
                            <th width="30%">Giá (VNĐ)</th>
                            <th width="10%">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="sort">
                        @forelse ($partners as $partner)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" class="checkdel form-check-input" name=id[] value="{{$partner->id}}" data-id="{{ $partner->id }}" />
                                </td>
                                <td>{{ $partner->id ??'' }}</td>
                                <td><a href="{{ route('admin.partners.edit', $partner->id) }}">{{ $partner->name ?? '' }}</a></td>
                                <td>{{ number_format($partner->price) ?? '' }}</td>
                                <td>
                                    <a href="{{route('admin.partners.edit', $partner->id)}}" class="btn btn-sm p-1" style="padding:0;" data-toggle="tooltip"
                                        title="Sửa">
                                        <i class="material-icons">border_color</i>
                                    </a>
                                    <a href="#" class="btn btn-sm p-1 delete-category" data-toggle="tooltip" title="Xoá" data-id="{{ $partner->id }}">
                                        <i class="material-icons">delete</i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100%" class="text-center">
                                    Không tìm thấy dữ liệu!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>

            <a href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc?usp=sharing"
                class="float-right mt-4">
                <i class="material-icons">
                    help_outline
                </i>
            </a>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    $(document).ready(function () {
        // core.makeTableOrderable('/admin/articles/sort');
        core.initCheckboxButton();
        // core.updateViewViewStatus('/admin/articles/update-view-status');
        core.deleteAnItem('/admin/partners');
        core.deleteMultipleItems('/admin/partners/delete-many');

    });
</script>
@endpush
