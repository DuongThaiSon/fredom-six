@forelse ($gallery->images()->orderBy('order', 'asc')->get() as $item)
<div class="row border-bottom py-2">
    <div class="col-2">
        <img style="width: 100px; height: 100px" src="{{ '/'.env('UPLOAD_DIR_GALLERY').'/'.$item->name }}" alt="..." class="img-thumbnail">
    </div>
    <div class="col-8 align-self-center">
        <input type="text" class="form-control" name="image_captions[{{ $item->id }}]" value="{{ old('image_caption['.$item->id.']') ?? $item->caption }}" placeholder="Chú thích của ảnh">
    </div>
    <div class="col-2 align-self-center d-flex">
        <button class="btn btn-link ml-auto mr-auto btn-destroy-image" data-href="{{ route('admin.galleries.revertImage', ['gallery' => $gallery->id, 'image' => $item->id]) }}">
            <i class="material-icons">delete</i>
        </button>
    </div>
</div>
@empty
@endforelse
