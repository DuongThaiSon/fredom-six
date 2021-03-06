@forelse ($product->images()->orderBy('order', 'desc')->get() as $item)
<div class="row border-bottom py-2" id="item_{{ $item->id }}">
    <div class="col-1 align-self-center d-flex connect">
        <span class="btn btn-link ml-auto mr-auto">
            <i class="material-icons">format_line_spacing</i>
        </span>
    </div>
    <div class="col-2">
        <img style="width: 100px; height: 100px" src="{{ $item->url }}" alt="..." class="img-thumbnail">
    </div>
    <div class="col-8 align-self-center">
        <input type="text" class="form-control" name="image_captions[{{ $item->id }}]" value="{{ old('image_caption['.$item->id.']') ?? $item->caption }}" placeholder="Chú thích của ảnh">
    </div>
    <div class="col-1 align-self-center d-flex">
        <button class="btn btn-link ml-auto mr-auto btn-destroy-image" data-href="{{ route('admin.products.revertImage', ['product' => $product->id, 'image' => $item->id]) }}">
            <i class="material-icons">delete</i>
        </button>
    </div>
</div>
@empty
@endforelse
