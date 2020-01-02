@forelse ($categories as $categoryValue)
<option value="{{ $categoryValue->id }}" {{ isset($menu) && $categoryValue->id == $menu ? 'selected' : '' }}>
    @for ($i = 0; $i < $level; $i++)
        --|
    @endfor
    {{ $categoryValue->name }}
</option>
    @includewhen($categoryValue->sub->count(),'admin.menus.categories_option', [
        'categories'=> $categoryValue->sub,
        'level' => $level + 1
        ])
@empty

@endforelse
