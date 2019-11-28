<ul style="list-style-type: none;">
    @forelse ($categories as $category )
        <li id="cat_{{ $category->id}}" class="ui-state-default" style="border: none">
            <div class="table-responsive bg-white">
                <table class="table-hover table-sm" width="100%">
                    <tbody class="product-table-body">
                        <tr class="product-item">
                            <td width="10%">{{ $category->id }}</td>
                            <td width="60%" class="choose-record" data-id="{{ $category->id }}">@for ($i = 0; $i < $level; $i++)--|@endfor
                                <a href="">{{$category->name}}</a>
                            </td>
                            {{-- <td class="w-35"> {{$category->subCat()->first()->name ?? ""}}</td> --}}
                            <td width="30%">
                                <div class="btn-group">
                                    <a style="color: white" class="btn-sm btn-success choose-record" href="#" data-id="{{ $category->id }}"
                                        class="btn btn-sm p-1" data-toggle="tooltip" title="Chọn" data-slug={{ $category->slug }}>
                                        <i class="material-icons">radio_button_checked</i> Chọn   

                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @includeWhen($category->sub->count(), 'admin.menus.list_category_products',['categories'=>$category->sub,'level'=>$level +1])
        </li>
    @empty
        Not Found
    @endforelse
</ul>
        