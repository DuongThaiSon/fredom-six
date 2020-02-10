@forelse ($menus as $menuValue)
<option value="{{ $menuValue->id }}" {{ isset($selectedId) && $menuValue->id === $selectedId ? 'selected' : '' }}>
    {!! repeatStr('&nbsp;', $level = isset($level) ? $level : 0) !!}
    {!! repeatStr('&#8627;', $level) !!}
    {{ $menuValue->name }}
</option>
@includewhen($menuValue->sub->count(),'admin.partials.menuOptions', [
    'menus'=> $menuValue->sub,
    'level' => $level + 1
])
@empty

@endforelse
