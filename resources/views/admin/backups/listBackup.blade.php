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
                @if ($item['can_download'])
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
        <tr>
            <td colspan="4">
                Chưa có phiên bản sao lưu nào
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
{{ $backups->links() }}

