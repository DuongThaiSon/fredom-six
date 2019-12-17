@extends('admin.layouts.main', ['activePage' => 'seo-tools', 'title' => __('Danh sách công cụ SEO')])
@section('content')
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <h1 class="mt-3 pl-4">Tin bài</h1>
            <!-- Save group button -->
            <div class="save-group-buttons">
                <a href="{{route('admin.seo-tools.create')}}" class="btn btn-sm btn-dark" data-toggle="tooltip"
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
                            <th  width="5%" class="text-center">
                                <a id="btn-ck-all" href="#" data-toggle="tooltip" title="Chọn / bỏ chọn toàn bộ">
                                    <i class="material-icons text-muted">check_box_outline_blank</i>
                                </a>
                            </th>
                            <th width="10%">ID</th>
                            <th width="70%">Tiêu đề</th>
                            <th width="15%" >Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($scripts as $script)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" class="checkdel form-check-input" name=id[] value="{{$script->id}}" data-id="{{ $script->id }}" />
                                </td>
                                <td>{{ $script->id }}</td>
                                <td><a href="{{ route('admin.seo-tools.edit', $script->id) }}">{{ $script->name ?? '' }}</a></td>
                                <td>
                                    <a href="{{route('admin.seo-tools.edit', $script->id)}}" class="btn btn-sm p-1" style="padding:0;" data-toggle="tooltip"
                                        title="Sửa">
                                        <i class="material-icons">border_color</i>
                                    </a>
                                    <a href="#" class="btn btn-sm p-1 delete-category" data-toggle="tooltip" title="Xoá" data-id="{{ $script->id }}">
                                        <i class="material-icons">delete</i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100%" class="text-center">
                                    Không có dữ liệu! Mời bạn ấn vào <a href="{{ route('admin.seo-tools.create') }}">đây</a> để thêm mới!
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
        core.initCheckboxButton();
        core.deleteAnItem('/admin/seo-tools');
        core.deleteMultipleItems('/admin/seo-tools/delete-many');
    });
</script>
@endpush
