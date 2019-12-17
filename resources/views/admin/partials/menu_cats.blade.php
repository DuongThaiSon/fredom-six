@forelse ($menuCats as $menuValues)
<option value="{{ $menuValues->id }}" {{ isset ($menu)&&$menuValues->id===$menu->parent_id?'selected':'' }}>
    @for ($i = 0; $i < $level; $i++)
        --|
    @endfor
    {{ $menuValues->name }}
</option>
    @includewhen($menuValues->sub->count(),'admin.partials.menu_cats', [
        'menuCats'=> $menuValues->sub,
        'level' => $level +1
        ]) 
@empty
    
@endforelse