@foreach ($gallery->images as $image)
    {{-- <form action="{{ route('admin.image.destroy',$video->id) }}" method="POST">
    @csrf --}}
    <tr>
        <td class="text-center">
            <input type="checkbox" class="checkdel" value="{{$image->id}}" />
        </td>
        <td>{{$image->id}}</td>
        <td>
            <img src="{{ $image->name }}" width="100px" class="thumbnail">
        </td>
        <td>
            <a href="#">{{$image->url}}</a>
        </td>
            <td>
            <a href="#">{{$image->caption}}</a>
        </td>
        <td>
            <button type="button" class="btn btn-sm p-1 click-public" curentid="{{$image->id}}" value="{{$image->is_public}}" data-toggle="tooltip" title="{{ $image->is_public==1?'Click để tắt':'Click để bật' }}">
                <i class="material-icons toggle-icon">{{isset($image)&&$image->is_public==1?'check_circle_outline':'close'}}</i>
            </button>
        </td>
        <td>
            <div class="btn-group">
                <a href="{{ route('admin.images.edit',  $gallery->id) }}?image_id={{ $image->id }}" class="btn btn-sm p-1" data-toggle="tooltip" title="Sửa">
                    <i class="material-icons">border_color</i>
                </a>
                {{-- @method('DELETE') --}}
                <a href="#" class="btn btn-sm p-1" data-toggle="tooltip" title="Đưa lên đầu tiên">
                    <i class="material-icons">delete</i>
                </a>
            </div>
        </td>
    </tr>
    {{-- </form>    --}}

@endforeach
