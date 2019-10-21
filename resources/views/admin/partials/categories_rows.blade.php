<ul style="list-style-type: none;" class="sortcat ui-sortable">
    @forelse ($categories as $category )
        <li id="cat_{{ $category->id}}" class="ui-state-default">
            <div class="table-responsive bg-white mt-4">
                <table class="table table-hover table-sm mb-2" width="100%">
                    <tbody>
                        <tr class="text-muted">
                            <td style="width: 34.5px;" class="text-muted connect" data-toggle="tooltip" title="Giữ icon này kéo thả để sắp xếp">
                                <i class="material-icons">format_line_spacing</i>
                            </td>
                            <td style="width: 34.5px;" class="text-center">
                                <input type="checkbox" class="checkdel" />
                            </td>
                            <td style="width: 40px;">{{ $category->id }}</td>
                            <td class="editname">
                                @for ($i = 0; $i < $level; $i++)
                                    --|
                                @endfor
                                <a href="#">{{$category->name}}</a>
                            </td>
                            <td> {{$category->subCat()->first()->name ?? ""}}</td>
                            <td style="width: 120px;">{{$category->created_at}}</td>
                            <td style="width: 120px;">{{$category->user()->first()->name}}</td>
                            <td style="width: 160px;">
                                <div class="btn-group">
                                    <a href="{{route('admin.'.$category->type.'-cats.create')}}" class="btn btn-sm p-1" data-toggle="tooltip" title="Thêm mục con">
                                        <i class="material-icons">playlist_add</i>
                                    </a>
                                    <a href="{{route('admin.'.$category->type.'-cats.edit', $category->id)}}" class="btn btn-sm p-1" data-toggle="tooltip" title="Sửa dữ liệu">
                                        <i class="material-icons">mode_edit</i>
                                    </a>
                                    <a href="{{ Route('admin.'.$category->type.'-cats.delete', $category->id) }}" class="btn btn-sm p-1" data-toggle="tooltip" title="Xoá">
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
