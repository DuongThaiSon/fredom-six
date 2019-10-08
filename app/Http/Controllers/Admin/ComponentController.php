<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Component;
use Auth;

class ComponentController extends Controller
{
    public function index()
    {
        $components = Component::get();
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
        $component->name = $request->name;
        $component->language = (session('lang'))?(session('lang')):(env('DEFAULT_LANGUAGE'));
        $component->is_public = isset($request->is_public)?1:0;
        $component->detail = $request->detail;
        $maxorder = Component::whereRaw('`order` = (select max(`order`) from components)')->first();
        $component->order = $component->order?$component->order:($maxorder ? ($maxorder->order + 1) : 1);
        $component->updated_by = Auth::id();
        $component->save();
        return redirect()->back()->with('success', 'Lưu dữ liệu thành công !');
    }
}
