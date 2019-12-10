<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::orderBy('order', 'desc')->paginate();
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json([
            'message' => 'View retrieve successfully.',
            'data' => view('admin.settings.create')->render()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'display_name' => 'required',
            'key' => 'required|unique:settings',
            'value' => 'required'
        ]);

        $attributes = $request->only([
            'display_name', 'key', 'value', 'details'
        ]);
        $attributes['order'] = Setting::max('order') + 1;

        Setting::create($attributes);

        return response()->json([
            'message' => 'Created new setting successfully.',
            'data' => view('admin.settings.list', ['settings' => Setting::orderBy('order', 'desc')->paginate()])->render()
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        return response()->json([
            'message' => 'View retrieve successfully.',
            'data' => view('admin.settings.edit', compact('setting'))->render()
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'display_name' => 'required',
            'key' => "required|unique:settings,key,{$setting->id}",
            'value' => 'required'
        ]);

        $attributes = $request->only([
            'display_name', 'key', 'value', 'details'
        ]);

        $setting->fill($attributes);
        $setting->save();

        return response()->json([
            'message' => 'Updated setting successfully.',
            'data' => view('admin.settings.list', ['settings' => Setting::orderBy('order', 'desc')->paginate()])->render()
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        $setting->delete();

        return response()->json([
            'message' => 'Deleted setting successfully.',
            'data' => view('admin.settings.list', ['settings' => Setting::orderBy('order', 'desc')->paginate()])->render()
        ], 200);
    }
}
