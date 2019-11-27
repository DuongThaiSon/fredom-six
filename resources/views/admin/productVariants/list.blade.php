@forelse ($products as $entry)
<tr id="item_{{ $entry->id }}" class="ui-state-default">
    <td class="text-muted connect" data-toggle="tooltip"
        title="Giữ icon này kéo thả để sắp xếp">
        <i class="material-icons">format_line_spacing</i>
    </td>
    <td class="text-center">
        <input type="checkbox" class="checkdel form-check-input" value="1" data-id="{{ $entry->id }}" />
    </td>
    <td class="editname">
        <a href="#">{{ $entry->name }}</a>
    </td>
    <td>
        <button type="button" class="btn btn-sm p-1 click-public" data-id="{{ $entry->id }}" value="{{ $entry->is_public }}"  data-toggle="tooltip"  title="{{ $entry->is_public==1?'Click để tắt':'Click để bật' }}">
            <i class="material-icons toggle-icon">{{isset($entry)&&$entry->is_public==1?'check_circle_outline':'close'}}</i>
        </button>
    </td>
    <td>{{ $entry->quantity }}</td>
    <td class="text-right">{{ number_format($entry->price) }} đ</td>
    <td class="text-right">
        <div class="btn-group">
            <button data-href="{{ route('admin.variants.edit', ['product' => $product->id, 'variant' => $entry->id]) }}" class="btn btn-sm p-1 btn-link btn-edit-variant" data-toggle="tooltip"
                title="Sửa">
                <i class="material-icons">border_color</i>
            </button>
            <button data-href="{{ route('admin.variants.destroy', ['product' => $product->id, 'variant' => $entry->id]) }}" class="btn btn-sm p-1 btn-link btn-delete-variant" data-toggle="tooltip" title="Xoá" type="submit">
                <i class="material-icons">delete</i>
            </button>
        </div>
    </td>
</tr>
@empty
<tr>
    <td colspan="7">Chưa có biến thể nào</td>
</tr>
@endforelse
