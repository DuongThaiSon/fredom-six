<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Showroom;
use App\Http\Services\Admin\ShowroomService;
use App\Http\Requests\ShowroomRequest;
use Auth;

class ShowroomController extends Controller
{
    public function __construct(ShowroomService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showroom = Showroom::orderBy('order','asc')->paginate(10);
        return view('admin.showrooms.index', compact('showroom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.showrooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShowroomRequest $request)
    {
        $fileName = '';
        if($request->hasFile('avatar')){
            $fileName = uniqid('showroom') . '.' .$request->avatar->extension();
            $request->avatar->move(public_path('media/showroom'), $fileName);
            
        }
        $attributes = $this->service->showroomCreate($request);
        $attributes['avatar'] = $fileName;
        $showroom = Showroom::create($attributes);
        return redirect()->route('admin.showrooms.index')->with('success', 'Tạo dữ liệu thành công !');
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
    public function edit($id)
    {
        $showroom = Showroom::findOrFail($id);
        return view('admin.showrooms.edit', compact('showroom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShowroomRequest $request, $id)
    {
        if($request->hasFile('avatar')){
            $fileName = uniqid('showroom') . '.' .$request->avatar->extension();
            $request->avatar->move(public_path('media/showroom'), $fileName);
            
        }
        else{
            $fileName = Showroom::findOrFail($id)->avatar;
            
        }
        $showroom = Showroom::findOrFail($id);
        
        $attributes = $this->service->showroomEdit($request);
        $attributes['avatar'] = $fileName;
        $showroom->fill($attributes);
        $showroom->save();
        return redirect()->back()->with('success', 'Lưu dữ liệu thành công !');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Showroom::findOrFail($id)->delete();
        return redirect()->route('admin.showrooms.index')->with('DELETED COMPLE');
    }
    
}
