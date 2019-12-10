<table class="table-sm table-hover table mb-2" width="100%">
    <thead>
        <tr class="text-muted">
            {{-- <th></th> --}}
            <th>Tên hiển thị</th>
            <th>Mã</th>
            <th>Giá trị</th>
            <th style="width: 160px;" class="text-right">Thao tác</th>
        </tr>
    </thead>
    <tbody class="sort">
        @forelse ($settings as $item )
        <tr id="item_{{$item->id}}" class="ui-state-default">
            {{-- <td class="text-muted connect" data-toggle="tooltip"
                title="Giữ icon này kéo thả để sắp xếp">
                <i class="material-icons">format_line_spacing</i>
            </td> --}}
            <td class="editname">
                <a href="{{route('admin.settings.edit', $item->id)}}">{{$item->display_name??''}}</a>
            </td>
            <td>{{$item->key}}</td>
            <td>{{$item->value}}</td>
            <td class="text-right">
                <div class="btn-group">

                    <a href="{{route('admin.settings.edit', $item->id)}}" class="btn btn-sm p-1 btn-open-form-setting" style="padding:0;" data-toggle="tooltip"
                        title="Sửa">
                        <i class="material-icons">border_color</i>
                    </a>
                    <a href="{{route('admin.settings.destroy', $item->id)}}" class="btn btn-sm p-1 btn-delete-setting" data-toggle="tooltip" title="Xoá">
                        <i class="material-icons">delete</i>
                    </a>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            {{-- <td></td> --}}
            <td colspan="3">Chưa có thông số nào.</td>
        </tr>
        @endforelse
    </tbody>
</table>
{{ $settings->links() }}
