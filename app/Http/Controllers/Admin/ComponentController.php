<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Component;
use App\Http\Services\Admin\ComponentService;
use App\Http\Requests\ComponentRequest;
use Auth;


class ComponentController extends Controller
{
    public function __construct(ComponentService $service)
    {
        $this->service = $service;
    }
    public function index()
    {
        $components = Component::orderBy('id','desc')->with(['comCreatedBy'])->simplePaginate();
        return view('admin.components.index', compact('components'));
    }
    public function create()
    {
       return view('admin.components.add');
    }
    public function store(ComponentRequest $request)
    {
        $attributes = $this->service->componentCreate($request);
        $component = Component::create($attributes);
        return redirect()->route('admin.components.index')->with('success', 'Tạo dữ liệu thành công !');
    }
    public function show($id)
    {
        $component = Component::findOrFail($id);
        return view('admin.components.edit', compact('component'));
    }
    public function update(ComponentRequest $request, $id)
    {
        $component = Component::findOrFail($id);
        $attributes = $this->service->componentEdit($request);
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
    public function delete($id)
    {
        Component::findOrFail($id)->delete();
        return redirect()->route('admin.components.index')->with('DELETEED COMPLE');
    }
}
