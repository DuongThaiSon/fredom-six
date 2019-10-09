@foreach ($gallery->images as $image)
    {{-- <form action="{{ route('admin.image.destroy',$video->id) }}" method="POST">
    @csrf --}}
    <tr>
        <td class="text-center">
            <input type="checkbox" class="checkdel" value="{{$image->id}}" />
        </td>
        <td>{{$image->id}}</td>
        <td class="editname">
            <img src="{{ $image->name }}" width="100px" class="thumbnail">
        </td>
        <td>
            <a href="#">{{$image->url}}</a>
        </td>
            <td>
            <a href="#">{{$image->caption}}</a>
        </td>
        <td>
            <button type="button" class="btn btn-sm p-1" data-toggle="tooltip" title="Click để tắt">
                <i class="material-icons toggle-icon">check_circle_outline</i>
            </button>
        </td>
        <td>
            <div class="btn-group">
                <a href="" class="btn btn-sm p-1" data-toggle="tooltip" title="Sửa">
                    <i class="material-icons">border_color</i>
                </a>
                {{-- @method('DELETE') --}}
                <button class="btn btn-sm p-1" data-toggle="tooltip" title="Đưa lên đầu tiên">
                    <i class="material-icons">delete</i>
                </button>   
            </div>
        </td>
    </tr>
    {{-- </form>    --}}

@endforeach