@forelse ($categories as $category)
<tr class="ui-state-default">
    <td>{{ $category->id }}</td>
    <td class="editname">
        {!! repeatStr('&nbsp;', $level = isset($level) ? $level : 0) !!}
        {!! repeatStr('&#8627;', $level) !!}
        {{ $category->name }}
    </td>
    <td>{{ $category->updated_at }}</td>
    <td>{{ $category->user->name ?? '' }}</td>
    <td class="text-right">
        <div class="btn-group">
            <a href="#" data-id="{{ $category->id }}" class="btn btn-sm p-1 choose-record" style="padding:0;" data-toggle="tooltip" title="Chọn">
                <i class="material-icons">library_add</i> Chọn
            </a>
        </div>
    </td>
</tr>
@includeWhen($category->sub, 'admin.menus.categoryRows', ['categories' => $category->sub, 'level' => $level + 1])
@empty
@if ($level < 1)
<tr>
    <td class="text-dark" colspan="5">Không tìm thấy bản ghi</td>
</tr>
@endif
@endforelse
