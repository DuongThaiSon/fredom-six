<ul class="sort list-unstyled">
    @forelse ($menus as $menu )
    <li id="item_{{ $menu->id }}" class="ui-state-default border-0">
        <div class="bg-white">
            <table class="table table-hover table-sm m-0" width="100%">
                <tbody class="rowlink" data-link="row">
                    <tr class="text-dark">
                        <td width="5%" class="text-muted connect rowlink-skip" data-toggle="tooltip"
                            data-placement="top" title="" data-original-title="Tooltip on top">
                            {{-- title="Giữ icon này kéo thả để sắp xếp"> --}}
                            <a href="{{route('admin.menus.edit', ['category' => $categoryId, 'menu' => $menu->id])}}">
                                <i class="material-icons">format_line_spacing</i>
                            </a>
                        </td>
                        {{-- <td width="3%" class="text-center align-middle rowlink-skip">
                            <div class="pretty p-icon p-curve p-smooth">
                                <input type="checkbox" class="form-check-input"
                                    data-level="{{ $level = isset($level) ? $level : 0 }}" value="{{ $categoryId }}"
                                    data-id="{{ $categoryId }}" />
                                <div class="state">
                                    <i class="icon material-icons">done</i>
                                    <label></label>
                                </div>
                            </div>
                        </td> --}}
                        <td width="5%">{{ $menu->id }}</td>
                        <td width="25%" class="editname">
                            {!! repeatStr('&nbsp;', $level = isset($level) ? $level : 0) !!}
                            {!! repeatStr('&#8627;', $level) !!}
                            <a href="#">{{ $menu->name }}</a>
                        </td>
                        <td width="20%">{{ $menu->category->name ?? '' }}</td>
                        <td width="15%">{{ $menu->user->name?? '' }}</td>
                        <td width="20%">{{ $menu->updated_at }}</td>

                        <td width="10%" class="rowlink-skip text-right">
                            <div class="btn-group">
                                <a href="{{route('admin.menus.makeChild', ['category' => $categoryId, 'menu' => $menu->id]) }}"
                                    class="btn btn-sm p-1" data-toggle="tooltip" title="Thêm mục con">
                                    <i class="material-icons">playlist_add</i>
                                </a>
                                <a href="{{route('admin.menus.edit', ['category' => $categoryId, 'menu' => $menu->id]) }}"
                                    class="btn btn-sm p-1" data-toggle="tooltip" title="Sửa dữ liệu">
                                    <i class="material-icons">mode_edit</i>
                                </a>
                                <a href="{{route('admin.menus.destroy', ['category' => $categoryId, 'menu' => $menu->id]) }}"
                                    class="btn btn-sm p-1" data-toggle="tooltip" title="Xoá">
                                    <i class="material-icons">delete</i>
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        @includeWhen($menu->sub->count(), 'admin.partials.menuRows', ['menus' => $menu->sub, 'level' => $level + 1])
    </li>
    @empty
    <li class="ui-state-default">
        <div class="table-responsive bg-white">
            <table class="table table-hover table-sm mb-0" width="100%">
                <td colspan="8">Không có bản ghi nào</td>
            </table>
        </div>
    </li>
    @endforelse
</ul>
