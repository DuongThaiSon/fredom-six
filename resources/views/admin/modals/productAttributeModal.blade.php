<div class="modal fade" id="selectProductAttributeModal" tabindex="-1" role="dialog" aria-labelledby="selectProductAttributeModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="selectProductAttributeModalTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @php
                $selectedAttributes = $category->productAttributes->pluck('id')->toArray();
            @endphp
            @forelse ($productAttributes as $item)
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input select-attribute-input"
                        type="checkbox"
                        data-name="{{ $item->name }}"
                        value="{{ $item->id }}"
                        {{ in_array($item->id, $selectedAttributes)?'checked':'' }}>
                    {{ $item->name }}
                </label>
            </div>
            @empty
            <p>Chưa có thuộc tính thêm nào cả.</p>
            <p>Đi đến <a href="{{ route('admin.product-attributes.index') }}" target="_blank">Quản lý thuộc tính thêm</a>...</p>
            @endforelse
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary btn-submit-select-product-attribute">Save changes</button>
        </div>
        </div>
    </div>
</div>
