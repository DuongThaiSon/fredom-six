<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Showroom;
use App\Http\Services\Admin\ShowroomService;
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
        $showroom = Showroom::orderBy('id','desc')->paginate(10);
        return view('admin.showroom.index', compact('showroom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.showroom.create');
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
            'name' => 'required',
            // 'detail' => 'required',
            // 'email' => 'email',
            'phone' => 'required|numeric|digits_between:10,100',
        ],
        [
            // 'email.email' => 'Email không hợp lệ',
            'phone.digits_between' => 'Số điện thoại phải ít nhất là 10 số',
            'phone.required' => 'Bạn chưa điền vào số điện thoại',
            'phone.numeric' => 'Điện thoại phải là số',
            'name.required' => 'Tiêu đề không được để trống',
            // 'detail.required' => 'Nội dung không được để trống'
        ]);

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
        return view('admin.showroom.edit', compact('showroom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            // 'detail' => 'required',
            // 'email' => 'email',
            'phone' => 'required|numeric|digits_between:10,100',
        ],
        [
            // 'email.email' => 'Email không hợp lệ',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.required' => 'Bạn chưa điền vào số điện thoại',
            'phone.numeric' => 'Điện thoại phải là số',
            'name.required' => 'Tiêu đề không được để trống',
            // 'detail.required' => 'Nội dung không được để trống'
        ]);
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
        // print_r($attributes['avatar']);die;
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
    
    /**
     * Change is_public from showroom
     */
    public function changePublic(Request $request)
    {
        $showroom = Showroom::find($request->id);
        $showroom->is_public = ($request->value == 0) ? '1':'0';
        $showroom->save();
        return response()->json(compact('showroom'), 200);
    }
}
