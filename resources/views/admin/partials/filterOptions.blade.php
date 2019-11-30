@forelse ($categories as $categoryValue)
<option value="{{ $categoryValue->id }}" {{ isset($selectedCategoryId)&&$selectedCategoryId->contains($categoryValue->id)?'selected':'' }}>
    @for ($i = 0; $i < $level; $i++)
        --|
    @endfor
    {{ $categoryValue->name }}
</option>
    @includewhen($categoryValue->sub->count(),'admin.partials.filterOptions', [
            'categories'=> $categoryValue->sub,
            'level' => $level + 1,
            'selectedCategoryId' => $selectedCategoryId
        ])
@empty

@endforelse
