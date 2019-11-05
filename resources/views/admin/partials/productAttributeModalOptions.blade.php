@php
    $selectedAttributes = isset($selectedAttributes)?$selectedAttributes->pluck('id')->toArray():[];
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
