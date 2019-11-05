@forelse ($categories as $categoryValue)
<option value="{{ $categoryValue->id }}" {{ isset($selectedCategories)&in_array($categoryValue->id, $selectedCategories)?'selected':'' }}>
    @for ($i = 0; $i < $level; $i++)
        --|
    @endfor
    {{ $categoryValue->name }}
</option>
    @includewhen($categoryValue->sub->count(),'admin.partials.productOptions', [
        'categories'=> $categoryValue->sub,
        'level' => $level +1
        ])
@empty

@endforelse
