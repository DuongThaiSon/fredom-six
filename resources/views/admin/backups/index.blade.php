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
                <table class="table-sm table-striped mb-2" width="100%">
                    <thead>
                        <tr class="text-muted">
                            <th width="10px">ID</th>
                            <th width="240px">Thời điểm tạo</th>
                            <th width="130px">Kích thước</th>
                            <th class="text-left" width="0">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="sort">
                        @forelse ($backups as $key => $item)
                        <tr id="item_" class="ui-state-default">
                            <td>{{ $key+1 }}</td>
                            <td class="">
                                <a href="#">{{ \Carbon\Carbon::createFromTimeStamp($item['last_modified'])->formatLocalized('%d %B %Y, %H:%M') }}</a>
                            </td>
                            <td>
                                <a href="#">{{ round((int)$item['file_size']/1048576, 2) }} MB</a>
                            </td>
                            <td class="text-left">
                                @if ($item['download'])
                                <a href="{{ route('admin.backups.download', [
                                    'disk' => $item['disk'],
                                    'path' => urlencode($item['file_path']),
                                    'file_name' => urlencode($item['file_name'])
                                    ]) }}" class="btn btn-sm btn-link px-2 py-0" data-toggle="tooltip" title="Tải xuống">
                                    <i class="material-icons">cloud_download</i>
                                </a>
                                @endif

                                <a class="btn btn-sm btn-link px-2 py-0" data-toggle="tooltip" title="Xóa">
                                    <i class="material-icons">delete_forever</i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        Chưa có phiên bản sao lưu nào
                        @endforelse
                    </tbody>
                </table>
                {{ $backups->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
