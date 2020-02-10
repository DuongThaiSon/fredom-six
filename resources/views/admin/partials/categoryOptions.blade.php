@forelse ($categories as $categoryValue)
<option value="{{ $categoryValue->id }}"
    {{ isset ($selectedId)&&$categoryValue->id===$selectedId?'selected':'' }}>
    {!! repeatStr('&nbsp;', $level = isset($level) ? $level : 0) !!}
    {!! repeatStr('&#8627;', $level) !!}
    {{ $categoryValue->name }}
</option>
@includewhen($categoryValue->sub->count(),'admin.partials.categoryOptions', [
'categories'=> $categoryValue->sub,
'level' => $level +1
])
@empty

@endforelse
