@extends('admin.layouts.main', ['activePage' => 'backup', 'title' => __('List Backups')])
@section('content')
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <h1 class="mt-3 pl-4">Sao lưu</h1>
            <!-- Save group button -->
            <div class="save-group-buttons">
                <a href="{{route('admin.articles.create')}}" class="btn btn-sm btn-dark" data-toggle="tooltip"
                    title="Tạo sao lưu mới">
                    <i class="material-icons">
                        note_add
                    </i>
                </a>
                {{-- <button data-toggle="tooltip" title="Xóa toàn bộ mục được chọn" class="btn btn-sm btn-dark"
                    target="_blank" id="btn-del-all">
                    <i class="material-icons">
                        delete_forever
                    </i>
                </button> --}}
            </div>

            <div class="table-responsive bg-white mt-4" id="cat_table">
                @csrf
                <table class="table-sm table-hover table mb-2" width="100%">
                    <thead>
                        <tr class="text-muted">
                            <th width="5%">ID</th>
                            <th width="20%">Thời điểm tạo</th>
                            <th width="10%">Kích thước</th>
                            <th class="text-left" width="0">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="sort">

                        <tr id="item_" class="ui-state-default">
                            <td>11</td>
                            <td class="">
                                <a href="#">19 Nov 2019, 18:49</a>
                            </td>
                            <td>
                                <a href="#">25.47 MB</a>
                            </td>
                            <td class="text-left">
                                <button class="btn btn-sm btn-link px-2 py-0" data-toggle="tooltip" title="Tải xuống">
                                    <i class="material-icons">cloud_download</i>
                                </button>
                                <button class="btn btn-sm btn-link px-2 py-0" data-toggle="tooltip" title="Xóa">
                                    <i class="material-icons">delete_forever</i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
