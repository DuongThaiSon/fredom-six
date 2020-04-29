@extends('admin.layouts.main', ['activePage' => 'product-attributes-index', 'title' => __('List Product Attributes')])
@section('content')
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <h1 class="mt-3 pl-4">Thuộc tính thêm của sản phẩm</h1>
            <!-- Save group button -->
            <div class="save-group-buttons">
                <a href="{{route('admin.product-attributes.create')}}" class="btn btn-sm btn-dark" data-toggle="tooltip"
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
            <div class="bg-white mt-4" id="cat_table">
                @csrf
                <table class="table-responsive table-sm table-hover table mb-2 overflow-hidden" width="100%">
                    <thead>
                        <tr class="text-muted">
                            <th width="5%">#</th>
                            <th width="20%">Tên thuộc tính</th>
                            <th>Giá trị</th>
                            <th width="10%">Ngày tạo</th>
                            <th width="10%">Người đăng</th>
                            <th width="10%" class="text-right">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="sort" data-link="row" class="rowlink">
                        @forelse ($attributes as $attribute)
                        <tr id="item_{{$attribute->id}}" class="ui-state-default">
                            <td>{{$attribute->id}}</td>
                            <td class="editname">
                                {{$attribute->name}}
                            </td>
                            <td>
                                {{ $attribute->productAttributeOptions->pluck('value')->implode(', ') }}
                            </td>
                       
                            <td>{{$attribute->updated_at}}</td>
                            <td>{{$attribute->updater->name ?? ''}}</td>
                            <td class="text-right rowlink-skip">
                                <div class="btn-group">
                                    <a href="{{route('admin.product-attributes.edit', $attribute->id)}}"
                                        class="btn btn-sm p-1" style="padding:0;" data-toggle="tooltip" title="Sửa">
                                        <i class="material-icons">border_color</i>
                                    </a>
                                    <a href="{{route('admin.product-attributes.destroy', $attribute->id)}}"
                                        class="btn btn-sm p-1 btn-destroy" data-toggle="tooltip" title="Xoá">
                                        <i class="material-icons">delete</i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-dark" colspan="6">Không tìm thấy bản ghi</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    $(document).ready(function () {
        core.updateViewViewStatus('/admin/products/update-view-status');
        core.initCheckboxButton();
        core.deleteSingleItem();
    });
</script>
@endpush
