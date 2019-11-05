@forelse ($categories as $categoryValue)
<option value="{{ $categoryValue->id }}" {{ isset($selectedCategoryId)&&$categoryValue->id==$selectedCategoryId?'selected':'' }}>
    @for ($i = 0; $i < $level; $i++)
        --|
    @endfor
    {{ $categoryValue->name }}
</option>
    @includewhen($categoryValue->sub->count(),'admin.partials.productOptions', [
            'categories'=> $categoryValue->sub,
            'level' => $level + 1,
            'selectedCategoryId' => $selectedCategoryId
        ])
@empty

@endforelse
