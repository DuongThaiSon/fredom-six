<ul style="list-style-type: none;" class="sortcat ui-sortable">
    @forelse ($menuCats as $menu )
        <li id="item_{{ $menu->id}}" class="ui-state-default" style="border: none;">
            <div class="table-responsive bg-white">
                <table class="table table-hover table-sm" width="100%">
                    <tbody>
                        <tr class="text-muted">
                            <td style="width: 4%;" class="text-muted connect" data-toggle="tooltip" title="Giữ icon này kéo thả để sắp xếp">
                                <i class="material-icons">format_line_spacing</i>
                            </td>
                            {{-- <td style="width: 3%;" class="text-center">
                                <input type="checkbox" class="checkdel" name=id[] value="{{$menu->id}}" />
                            </td> --}}
                            <td style="width: 6%;">{{ $menu->id }}</td>
                            <td style="width: 20%;" class="editname">
                                @for ($i = 0; $i < $level; $i++)
                                    --|
                                @endfor
                                <a href="#">{{$menu->name}}</a>
                            </td>
                            <td style="width: 20%">{{ $menu->categories->name }}</td>
                            <td style="width: 15%;">{{$menu->user->name?? ''}}</td>
                            <td style="width: 20%;">{{$menu->created_at}}</td>
                            
                            <td style="width: 15%;">
                                <div class="btn-group">
                                    <a href="{{route('admin.menus.create', ['parent_id' => $menu->id, 'category_id' => $category_id])}}" class="btn btn-sm p-1" data-toggle="tooltip" title="Thêm mục con">
                                        <i class="material-icons">playlist_add</i>
                                    </a>
                                    <a href="{{route('admin.menus.edit', $menu->id)}}" class="btn btn-sm p-1" data-toggle="tooltip" title="Sửa dữ liệu">
                                        <i class="material-icons">mode_edit</i>
                                    </a>
                                    <form style="margin-top: 0 !important; padding-top: 0 !important;" action="{{route('admin.menus.destroy', $menu->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf

                                         <button class="btn btn-sm p-1" data-toggle="tooltip" title="Xoá" type="submit">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @includeWhen($menu->sub->count(), 'admin.partials.menu_rows',['menuCats'=>$menu->sub,'level'=>$level +1])
        </li>
    @empty
        Not Found
    @endforelse
</ul>
