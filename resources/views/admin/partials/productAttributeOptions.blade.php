@foreach ($productAttributes as $attribute)
    @if (!$attribute->can_select)
    <div class="form-group">
        <label>{{ $attribute->name }}</label>
        <input
            type="text"
            name="attribute_values[{{ $attribute->id }}][{{ $attribute->productAttributeValues->first()->id }}]"
            required
            class="form-control"
        />
    </div>
    @else

    @php
        $selectedAttribute = $product->productAttributeValues->pluck('id')->toArray();
    @endphp
    <div class="form-group">
        <label>{{ $attribute->name }}</label>
        <select
            required
            {{ $attribute->allow_multiple?'multiple':'' }}
            name="attribute_values[{{ $attribute->id }}][]"
            data-selected-text-format="count > 2"
            class="form-control attribute-selectpicker"
            data-count-selected-text="{0} mục đã được chọn"
            data-style="select-with-transition"
            title="Chọn mục sản phẩm"
            data-size="7"
            data-show-tick="true"
            id="product-category">
            @forelse ($attribute->productAttributeValues as $item)
                <option
                    value="{{ $item->id }}"
                    {{ in_array($item->id, $selectedAttribute)?'selected':'' }}
                    {{ $attribute->type==="color"?'style=background:'.$item->value:''}}>
                        {{ $item->value }}
                    </option>
            @empty
            @endforelse
        </select>
    </div>
    @endif
@endforeach
