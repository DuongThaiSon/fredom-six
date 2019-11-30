@extends('admin.layouts.main', ['activePage' => 'product-filter-category', 'title' => __('List Product Filter')])
@section('content')
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <h1 class="mt-3 pl-4">Bộ lọc sản phẩm</h1>
            <!-- Save group button -->
            <div class="save-group-buttons">
                <a href="{{ route('admin.products-filters.create') }}" class="btn btn-sm btn-dark" data-toggle="tooltip"
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
                            <th width="35%">Tên bộ lọc</th>
                            <th width="10%">Hiển thị</th>
                            <th width="20%">Ngày tạo</th>
                            <th width="20%">Người tạo</th>
                            <th width="5%">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="sort">
                        @forelse ($filters as $item)
                        <tr id="item_" class="ui-state-default">
                            <td class="text-center">
                                <input type="checkbox" class="checkdel form-check-input" value="" data-id="" />
                            </td>
                            <td>1</td>
                            <td class="editname">
                                <a href="">{{ $item->name }}</a>
                            </td>
                            <td><button type="button" class="btn btn-sm p-1 click-public" curentid="" value=""  data-toggle="tooltip"  title="">
                                    <i class="material-icons toggle-icon">check_circle_outline</i>
                                </button></td>                            
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.products-filters.edit', $filters->id) }}" class="btn btn-sm p-1" style="padding:0;" data-toggle="tooltip"
                                        title="Sửa">
                                        <i class="material-icons">border_color</i>
                                    </a>                                   
                                    <a href="" class="btn btn-sm p-1" data-toggle="tooltip" title="Xoá">
                                        <i class="material-icons">delete</i>
                                    </a>
                                </div>
                            </td>
                        </tr> 
                        @empty
                            
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
        {{-- </form> --}}
    </div>
</div>

@endsection
@push('js')

@endpush
