@forelse ($menuCats as $menuValues)
<option value="{{ $menuValues->id }}" {{ $menuValues->id==$parent_id?'selected':'' }}>
    @for ($i = 0; $i < $level; $i++)
        --|
    @endfor
    {{ $menuValues->name }}
</option>
    @includewhen($menuValues->sub->count(),'admin.partials.menu_options', [
        'menuCats'=> $menuValues->sub,
        'level' => $level +1
        ]) 
@empty
    
@endforelse