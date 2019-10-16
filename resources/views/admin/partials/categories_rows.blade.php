@forelse ($categories as $category )
                 <tr id="cat_{{ isset($category->id)&&$category->parent_id==0?$category->id:''}}" class="ui-state-default">
                <td class="text-muted connect" data-toggle="tooltip" title="Giữ icon này kéo thả để sắp xếp">
                  <i class="material-icons">format_line_spacing</i>
                </td>
                <td class="text-center">
                  <input type="checkbox" class="checkdel" />
                </td>
                <td>{{ $category->id }}</td>
                <td class="editname">
                    @for ($i = 0; $i < $level; $i++)
                        --|
                    @endfor
                  <a href="#">{{$category->name}}</a>
                </td>
                <td>
                 {{$category->subCat()->first()->name?? ""}}
                </td>
                <td>{{$category->created_at}}</td>
                <td>{{$category->user()->first()->name}}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{route('admin.'.$category->type.'-cats.create')}}" class="btn btn-sm p-1" data-toggle="tooltip" title="Thêm mục con">
                          <i class="material-icons">playlist_add</i>
                        </a>
                        <a href="{{route('admin.'.$category->type.'-cats.edit', $category->id)}}" class="btn btn-sm p-1" data-toggle="tooltip" title="Sửa dữ liệu">
                          <i class="material-icons">mode_edit</i>
                        </a>
                          <button class="btn btn-sm p-1" data-toggle="tooltip" title="Xoá">
                            <i class="material-icons">delete</i>
                          </button>
                      </div>
                </td>
              </tr>
          </form>
    @includeWhen($category->sub->count(), 'admin.partials.categories_rows',['categories'=>$category->sub,'level'=>$level +1])
@empty
@endforelse
