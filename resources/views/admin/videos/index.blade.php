@extends('admin.layouts.main', ['activePage' => 'videos', 'title' => __('List Video')])
@section('content')
<div id="main-content">
    <!-- Search Group Button -->
    <div class="search-button-group">
        <div class="row collapse" id="advancesearch">
            <div class="form-row">
                <div class="form-group col">
                    <label>Mục</label>
                    <select class="form-control search-change p-2">
                        <option></option>
                        <option>BẾP ĐIỆN TỪ</option>
                    </select>
                </div>

                <div class="form-group col">
                    <label>Người tạo</label>
                    <select class="form-control search-change p-2">
                        <option></option>
                        <option>Admin</option>
                    </select>
                </div>

                <div class="form-group col">
                    <label>Từ ngày</label>
                    <input id="to_date" type="text" class="form-control datepicker search-change p-2" />
                </div>

                <div class="form-group col">
                    <label>Đến ngày</label>
                    <input id="from_date" type="text" class="form-control datepicker search-change p-2" />
                </div>
            </div>
        </div>
    </div>
    <!-- End Search Group Button -->
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
            <h1 class="mt-3 pl-4">VIDEO</h1>
            <!-- Save group button -->
            <div class="save-group-buttons">
                <a href="{{route('admin.videos.create')}}" class="btn btn-sm btn-dark" data-toggle="tooltip"
                    title="Thêm video mới">
                    <i class="material-icons">note_add</i>
                </a>
                <button data-toggle="tooltip" title="Xóa toàn bộ video" class="btn btn-sm btn-dark delete-all" target="_blank">
                    <i class="material-icons">delete_forever</i>
                </button>
            </div>
            <!-- TABLE -->
            <div class="table-responsive bg-white mt-4" id="table">
                @csrf
                <table class="table-sm table-hover table-bordered mb-2" width="100%">
                    <thead class="thead-light">
                        <tr class="text-muted">
                            <th></th>
                            <th>
                                <a id="btn-ck-all" href="#" data-toggle="tooltip" title="Chọn / bỏ chọn toàn bộ">
                                    <i class="material-icons text-muted">check_box_outline_blank</i>
                                </a>
                            </th>
                            <th>ID</th>
                            <th>Tên mục album</th>
                            <th>Mục</th>
                            <th style="width: 40px;">Hiển thị</th>
                            <th style="width: 40px;">Nổi bật</th>
                            <th style="width: 40px;">Mới</th>
                            <th style="width: 120px;">Ngày tạo</th>
                            <th style="width: 120px;">Người đăng</th>
                            <th style="width: 160px;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="sort">
                        @foreach ($videos as $video)
                            <tr id="item_{{$video->id}}" class="ui-state-default">
                                <td class="text-muted connect" data-toggle="tooltip" title="Giữ icon này kéo thả để sắp xếp">
                                    <i class="material-icons">format_line_spacing</i>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" class="checkdel" name=id[] value="{{$video->id}}" />
                                </td>
                                <td>{{$video->id}}</td>
                                <td class="editname">
                                    <a href="#">{{$video->name}}</a>
                                </td>
                                <td>
                                    <a href="#">{{$video->category()->first()->name ?? ''}}</a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm p-1 click-public" curentid="{{$video->id}}" value="{{$video->is_public}}"  data-toggle="tooltip"  title="{{ $video->is_public==1?'Click để tắt':'Click để bật' }}">
                                        <i class="material-icons toggle-icon">{{isset($video)&&$video->is_public==1?'check_circle_outline':'close'}}</i>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm p-1 click-highlight" curentid="{{$video->id}}" value="{{$video->is_highlight}}"  data-toggle="tooltip"  title="{{ $video->is_highlight==1?'Click để tắt':'Click để bật' }}">
                                        <i class="material-icons toggle-icon">{{isset($video)&&$video->is_highlight==1?'check_circle_outline':'close'}}</i>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm p-1 click-new" curentid="{{$video->id}}" value="{{$video->is_new}}"  data-toggle="tooltip"  title="{{ $video->is_new==1?'Click để tắt':'Click để bật' }}">
                                        <i class="material-icons toggle-icon"> {{isset($video)&&$video->is_new==1?'check_circle_outline':'close'}}</i>
                                    </button>
                                </td>
                                <td>{{$video->created_at}}</td>
                                <td>{{$video->user()->first()->name}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('admin.videos.edit', $video->id)}}" class="btn btn-sm p-1"
                                            data-toggle="tooltip" title="Sửa">
                                            <i class="material-icons">border_color</i>
                                        </a>
                                        <a href="{{ route('admin.videos.create') }}?id={{ $video->id }}" class="btn btn-sm p-1 btn-copy" data-id="{{$video->id}}" data-toggle="tooltip" title="Copy dữ liệu">
                                            <i class="material-icons">file_copy</i>
                                        </a>
                                        <a class="btn btn-sm p-1 move-top-button" video-id="{{$video->id}}" data-toggle="tooltip" title="Đưa lên đầu tiên">
                                            <i class="material-icons">call_made</i>
                                        </a>
                                        <a href="{{route('admin.videos.delete', $video->id)}}" class="btn btn-sm p-1" data-toggle="tooltip" title="Đưa lên đầu tiên">
                                            <i class="material-icons">delete</i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                 {{ $videos->links() }}
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
<script src="{{ asset('assets/admin')}}/js/videos.js"></script>
@endpush
