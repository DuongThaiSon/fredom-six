<ul style="list-style-type: none;" class="sortcat ui-sortable">
    @forelse ($categories as $category )
        <li id="cat_{{ $category->id}}" class="ui-state-default">
            <div class="table-responsive bg-white">
                <table class="table table-hover table-sm" width="100%">
                    <tbody>
                        <tr class="text-muted">
                            {{-- <td class="text-muted connect" data-toggle="tooltip" title="Giữ icon này kéo thả để sắp xếp">
                                <i class="material-icons">format_line_spacing</i>
                            </td> --}}
                            <td width="3%" class="text-center">
                                <input type="checkbox" class="checkdel form-check-input ml-0" name="id[]" value="{{$category->id}}" data-id="{{ $category->id }}" />
                            </td>
                            <td width="4%">{{ $category->id }}</td>
                            <td width="25%" class="editname">
                                @for ($i = 0; $i < $level; $i++)
                                    --|
                                @endfor
                                <a href="#">{{$category->name}}</a>
                            </td>
                            <td width="20%"> {{$category->subCat()->first()->name ?? ""}}</td>
                            <td width="20%">{{$category->created_at}}</td>
                            <td width="15%">{{$category->user()->first()->name?? ''}}</td>
                            <td width="13%">
                                <div class="btn-group">
                                    <a href="{{route('admin.'.$category->type.'-categories.create')}}" class="btn btn-sm p-1" data-toggle="tooltip" title="Thêm mục con">
                                        <i class="material-icons">playlist_add</i>
                                    </a>
                                    <a href="{{route('admin.'.$category->type.'-categories.edit', $category->id)}}" class="btn btn-sm p-1" data-toggle="tooltip" title="Sửa dữ liệu">
                                        <i class="material-icons">mode_edit</i>
                                    </a>
                                    <a href="{{route('admin.'.$category->type.'-categories.destroy', $category->id)}}" class="btn btn-sm p-1" data-toggle="tooltip" title="Xoá">
                                        <i class="material-icons">delete</i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @includeWhen($category->sub->count(), 'admin.partials.categories_rows',['categories'=>$category->sub,'level'=>$level +1])
        </li>
    @empty
        Not Found
    @endforelse
</ul>
