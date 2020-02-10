<h5>
    Bản ghi đã chọn
</h5>
<table class="table-sm table-hover table mb-2" width="100%">
    <thead>
        <tr class="text-muted">
            <th width="10%">ID</th>
            <th width="50%">Tên mục</th>
            <th width="15%">Thời điểm sửa cuối</th>
            <th width="15%">Người sửa cuối</th>
            <th width="10%" class="text-right">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <tr class="ui-state-default">
            <td>{{ $object->id }}</td>
            <td>{{ $object->name }}</td>
            <td>{{ $object->updated_at }}</td>
            <td>{{ optional($object->user()->first())->name }}</td>
            <td class="text-right">
                <a href="#" class="btn btn-sm p-1 choose-another" style="padding:0;" data-toggle="tooltip" title="Chọn">
                    <i class="material-icons">replay</i> Chọn lại
                </a>
            </td>
        </tr>
    </tbody>
</table>
<input type="hidden" name="object_id" id="object_id" value="{{ $object->id }}">
