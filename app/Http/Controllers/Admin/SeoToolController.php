<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoTool;
use Illuminate\Http\Request;

class SeoToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scripts = SeoTool::get();
        return view('admin.seoTools.index', compact('scripts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.seoTools.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $seoTool = SeoTool::create($request->all());

        return redirect()->route('admin.seo-tools.edit', $seoTool->id)->with('message', 'Tạo mới thành công!');
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
     * @param  \App\Models\SeoTool  $seoTool
     * @return \Illuminate\Http\Response
     */
    public function edit(SeoTool $seoTool)
    {
        return view('admin.seoTools.edit', compact('seoTool'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SeoTool  $seoTool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SeoTool $seoTool)
    {
        $seoTool->fill($request->all())->save();
        return redirect()->back()->with('message', 'Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SeoTool  $seoTool
     * @return \Illuminate\Http\Response
     */
    public function destroy(SeoTool $seoTool)
    {
        $seoTool->delete();
    }

    public function deleteMany(Request $request)
    {
        $ids = explode(",", $request->ids);
        foreach($ids as $id)
        {
            SeoTool::find($id)->delete();
        }
    }
}
