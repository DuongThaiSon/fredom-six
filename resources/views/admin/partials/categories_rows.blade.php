<ul style="list-style-type: none;" class="sort ui-sortable">
    @forelse ($categories as $category )
    <li id="entry_{{ $category->id}}" class="ui-state-default border-0">
        <div class="table-responsive bg-white">
            <table class="table table-hover table-sm mb-0" width="100%">
                <tbody data-link="row" class="rowlink">
                    <tr class="text-muted">
                        <td width="5%" class="text-muted connect" data-toggle="tooltip"
                            title="Giữ icon này kéo thả để sắp xếp" class="rowlink-skip">
                            <a href="{{route('admin.'.$category->type.'-categories.edit', $category->id)}}">
                                <i class="material-icons">format_line_spacing</i>
                            </a>
                        </td>
                        <td width="3%" class="text-center align-middle rowlink-skip">
                            <div class="pretty p-icon p-curve p-smooth">
                                <input type="checkbox" class="form-check-input" data-level="{{ $level }}"
                                    value="{{ $category->id }}" data-id="{{ $category->id }}" />
                                <div class="state">
                                    <i class="icon material-icons">done</i>
                                    <label></label>
                                </div>
                            </div>
                        </td>
                        <td width="4%" class="text-center align-middle">{{ $category->id }}</td>
                        <td width="25%" class="align-middle">
                            {!! repeatStr('&nbsp;', $level) !!}
                            {!! repeatStr('<i class="material-icons text-dark"
                                style="font-size:20px">subdirectory_arrow_right</i>', $level) !!}
                            <a href="#">{{$category->name}}</a>
                        </td>
                        <td width="20%" class="align-middle">{{$category->created_at}}</td>
                        <td width="15%" class="align-middle">{{$category->user()->first()->name?? ''}}</td>
                        <td width="13%" class="text-right rowlink-skip">
                            <div class="btn-group">
                                <a href="{{route('admin.'.$category->type.'-categories.create')}}"
                                    class="btn btn-sm p-1" data-toggle="tooltip" title="Thêm mục con">
                                    <i class="material-icons">playlist_add</i>
                                </a>
                                <a href="{{route('admin.'.$category->type.'-categories.edit', $category->id)}}"
                                    class="btn btn-sm p-1" data-toggle="tooltip" title="Sửa dữ liệu">
                                    <i class="material-icons">mode_edit</i>
                                </a>
                                <a href="{{route('admin.'.$category->type.'-categories.destroy', $category->id)}}"
                                    class="btn btn-sm p-1 btn-destroy" data-toggle="tooltip" title="Xoá">
                                    <i class="material-icons">delete</i>
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        @includeWhen($category->sub->count(),
        'admin.partials.categories_rows',['categories'=>$category->sub,'level'=>$level +1])
    </li>
    @empty
    <li>
        <div class="table-responsive bg-white">
            <table class="table table-hover table-sm" width="100%">
                <tbody>
                    <td class="text-dark" colspan="6">Không tìm thấy bản ghi</td>
                </tbody>
            </table>
        </div>
    </li>
    @endforelse
</ul>
