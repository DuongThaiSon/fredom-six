<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Component;
use Auth;
use Response;

class ComponentController extends Controller
{
    public function index()
    {
        $components = Component::paginate(10);
        return view('admin.component.index', compact('components'));
    }
    public function addCo()
    {
        return view('admin.component.add');
    }
    public function postAddCo(Request $request)
    {
        $component = new Component();

        $component->name = $request->name;
        $component->language = (session('lang'))?(session('lang')):(env('DEFAULT_LANGUAGE'));
        $component->is_public = $request->is_public;
        $component->detail = $request->detail;
        $maxorder = Component::whereRaw('`order` = (select max(`order`) from components)')->first();
        $component->order = $component->order?$component->order:($maxorder ? ($maxorder->order + 1) : 1);
        $component->created_by = Auth::id();
        $component->updated_by = Auth::id();
        $component->save();

        return redirect()->back()->with('success', 'Tạo dữ liệu thành công !');
    }
    public function editCo($id)
    {
        $component = Component::find($id);
        return view('admin.component.edit', compact('component'));
    }
    public function postEditCo(Request $request, $id)
    {
        $component = Component::findOrFail($id);
        $attributes = $request->only([
            'name', 'detail'

            ]);
        $attributes['language'] = session('lang', env('DEFAULT_LANG', 'vi'));
        $attributes['is_public'] = $request->has('is_public')?true:false;
        $attributes['updated_by'] = Auth::id();
        $component->fill($attributes);
        $component->save();
        return redirect()->back()->with('success', 'Lưu dữ liệu thành công !');
    }
    public function changePublic(Request $request)
    {
        $component = Component::find($request->id);
        $component->is_public = ($request->value == 0) ? '1':'0';
        $component->save();
        return response()->json(compact('component'), 200);

    }
}
