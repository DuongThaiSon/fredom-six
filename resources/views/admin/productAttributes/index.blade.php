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
            <div class="table-responsive bg-white mt-4" id="cat_table">
                @csrf
                <table class="table-sm table-hover table mb-2" width="100%">
                    <thead>
                        <tr class="text-muted">
                            <th class="text-center" width="5%">
                                <a id="btn-ck-all" href="#" data-toggle="tooltip" title="Chọn / bỏ chọn toàn bộ">
                                    <i class="material-icons text-muted">check_box_outline_blank</i>
                                </a>
                            </th>
                            <th width="5%">#</th>
                            <th width="20%">Tên thuộc tính</th>
                            <th>Giá trị</th>
                            <th width="10%">Cho phép chọn nhiều</th>
                            <th width="10%">Ngày tạo</th>
                            <th width="10%">Người đăng</th>
                            <th width="5%">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="sort">
                        @foreach ($attributes as $attribute )
                        <tr id="item_{{$attribute->id}}" class="ui-state-default">
                            <td class="text-center">
                                <input type="checkbox" class="checkdel" value="{{$attribute->id}}" data-id="{{$attribute->id}}" />
                            </td>
                            <td>{{$attribute->id}}</td>
                            <td class="editname">
                                <a href="{{route('admin.products.edit', $attribute->id)}}">{{$attribute->name}}</a>
                            </td>
                            <td>
                                {{-- <a href="{{route('admin.product-categories.edit', $attribute->category_id)}}">{{$attribute->category()->first()->name??''}}</a> --}}
                                {{-- {{ implode(', ', $attribute->categories->pluck('name')->toArray()) }} --}}
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm p-1 click-public" curentid="{{$attribute->id}}" value="{{$attribute->allow_multiple}}"  data-toggle="tooltip"  title="{{ $attribute->allow_multiple==1?'Click để tắt':'Click để bật' }}">
                                    <i class="material-icons toggle-icon">{{isset($attribute)&&$attribute->allow_multiple==1?'check_circle_outline':'close'}}</i>
                                </button>
                            </td>
                            <td>{{$attribute->updated_at}}</td>
                            <td>{{$attribute->updater->name ?? ''}}</td>
                            <td>
                                <div class="btn-group">

                                    <a href="{{route('admin.products.edit', $attribute->id)}}" class="btn btn-sm p-1" style="padding:0;" data-toggle="tooltip"
                                        title="Sửa">
                                        <i class="material-icons">border_color</i>
                                    </a>
                                    {{-- <a href="{{ route('admin.products.create') }}?id={{ $attribute->id }}" class="btn btn-sm p-1 btn-copy" data-id="{{$attribute->id}}" data-toggle="tooltip" title="Copy dữ liệu">
                                        <i class="material-icons">file_copy</i>
                                    </a> --}}
                                    <a href="{{route('admin.products.destroy', $attribute->id)}}" class="btn btn-sm p-1" data-toggle="tooltip" title="Xoá">
                                        <i class="material-icons">delete</i>
                                    </a>
                                </div>
                            </td>
                        </tr>

                        @endforeach
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
        {{-- </form> --}}
    </div>
</div>

<div class="modal fade" id="add-attribute" tabindex="-1" role="">
    <div class="modal-dialog modal-login" role="document">
        <div class="modal-content">
            <div class="card card-signup card-plain">
                <div class="modal-header">
                    <div class="card-header card-header-primary text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">clear</i>
                    </button>

                    <h4 class="card-title">Thuộc tính sản phẩm</h4>
                    <div class="social-line">
                        <p>Thêm mới</p>
                    </div>
                    </div>
                </div>
                <div class="modal-body">
                    <form class="form" method="" action="">
                        <div class="card-body">

                            <input type="hidden" name="attr-id">

                            <div class="row">
                                <label class="col-sm-2 col-form-label"><i class="material-icons">face</i></label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="attr-name">
                                        <span class="bmd-help">Tên thuộc tính sản phẩm.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label"><i class="material-icons">local_offer</i></label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" class="form-control tagsinput" data-role="tagsinput" data-color="info" name="attr-accepted-value">
                                        <span class="bmd-help">Giá trị mà thuộc tính có thể nhận. Bỏ trống nếu không muốn giới hạn lựa chọn.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label"><i class="material-icons">grain</i></label>
                                <div class="col-sm-10">
                                    <div class="togglebutton">
                                    <label>
                                        <input type="checkbox" name="attr-allow-multiple" disabled>
                                        <span class="toggle"></span>
                                        Lựa chọn nhiều giá trị trong cùng thuộc tính. Lựa chọn này chỉ có hiệu quả khi tồn tại giá trị có thẻ nhận.
                                    </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-center">
                    <button disabled href="#stal" class="btn btn-primary btn-link btn-wd btn-lg" id="btn-add-attr">Tạo thuộc tính</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    $(document).ready(function () {
        core.updateViewViewStatus('/admin/products/update-view-status');
    });
</script>
@endpush
