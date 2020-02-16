<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Component;
use App\Services\Admin\ComponentService;

class ComponentController extends Controller
{
    public function __construct(ComponentService $componentService)
    {
        $this->componentService = $componentService;
    }

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->componentService->allWithDatatables();
        }
        return view('admin.components.index', compact('components'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'key' => 'sometimes|unique:components',
            'value' => 'required'
        ]);
        $attributes = $request->only([
            'name', 'key', 'value', 'is_public'
        ]);
        $component = $this->componentService->create($attributes);
        return response()->json([], 204);
    }

    public function edit($id)
    {
        $component = Component::findOrFail($id);
        return response()->json(compact('component'), 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'key' => "required|unique:components,key,{$id}",
            'value' => 'required'
        ]);
        $attributes = $request->only([
            'name', 'key', 'value', 'is_public'
        ]);
        $component = $this->componentService->update($attributes, $id);
        return response()->json([], 204);
    }

    public function destroy($id)
    {
        $this->componentService->destroy($id);
        return response()->json([], 204);
    }
}
