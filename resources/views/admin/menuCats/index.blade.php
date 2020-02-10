@extends('admin.layouts.main', ['activePage' => 'menus-categories', 'title' => __('Menu Categories')])
@section('content')
<!-- Content -->
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <h1 class="mt-3 pl-4">QUẢN LÝ DANH MỤC MENU</h1>
            <!-- Save group button -->
            <div class="save-group-buttons">
                <a href="{{route('admin.menu-categories.create')}}" class="btn btn-sm btn-dark" data-toggle="tooltip"
                    title="Thêm mới">
                    <i class="material-icons">
                        note_add
                    </i>
                </a>
            </div>

            <!-- TABLE -->
            <div class="table-responsive bg-white mt-4" id="table">
                <table class="table-sm table-hover table mb-2" width="100%">
                    <thead>
                        <tr class="text-muted">
                            <th width="5%">ID</th>
                            <th>TÊN DANH MỤC MENU</th>
                            <th width="15%">Mã menu</th>
                            <th width="20%">NGƯỜI ĐĂNG</th>
                            <th width="20%">NGÀY TẠO</th>
                            <th width="10%" class="text-right">THAO TÁC</th>
                        </tr>
                    </thead>
                    <tbody class="rowlink" data-link="row">
                        @foreach ($categories as $cat)
                        <tr class="text-dark">
                            <td>
                                <a href="{{ route('admin.menus.index', ['category' => $cat->id]) }}">{{ $cat->id }}</a>
                            </td>
                            <td>{{ $cat->name }}</td>
                            <td>{{ $cat->slug }}</td>
                            <td>{{ $cat->user->name }}</td>
                            <td>{{ $cat->updated_at }}</td>
                            <td class="text-right rowlink-skip">
                                <div class="btn-group">
                                    <a href="{{route('admin.'.$cat->type.'-categories.edit', $cat->id)}}"
                                        class="btn btn-sm p-1 text-dark" data-toggle="tooltip" title="Sửa dữ liệu">
                                        <i class="material-icons">mode_edit</i>
                                    </a>
                                    <a href="{{route('admin.'.$cat->type.'-categories.destroy', $cat->id)}}"
                                        class="btn btn-sm p-1 text-dark btn-destroy" data-toggle="tooltip" title="Xoá">
                                        <i class="material-icons">delete</i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
$(document).ready(core.deleteSingleItem())
</script>
@endpush
