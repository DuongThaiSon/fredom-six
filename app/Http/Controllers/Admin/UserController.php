<?php

namespace App\Http\Controllers\Admin;

use App\Http\Services\Admin\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Profile;
use Auth;

class UserController extends Controller
{
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function info($id)
    {
        $user = User::findOrFail($id);
        foreach ($user->profiles()->get() as $profile) {
            $name = $profile->name;
            $user->$name = $profile->pivot->value;
        }
        return view('admin.users.info', compact('user'));
    }

    public function changeInfo(Request $request)
    {
        $user = Auth::user();                           //user đang đăng nhập hệ thống
        $email = Auth::user()->email;
        $userChange = User::findOrFail($request->id);   //user đang được chỉnh sửa
        $emailChange = $userChange->email;
        
        if ($user == $userChange) {                  // nếu user đang sửa là user đang đăng nhập
            if($request->email == $emailChange) {    // nếu user đang sửa là user đang đăng nhập và không sửa email
                if($request->password != '') {       // nếu user đang sửa là user đang đăng nhập và không sửa email và thay đổi pass
                    $this->validate($request,
                    [
                        'avatar' => 'nullable|sometimes|image',
                        'password' => 'min:8',
                    ],
                    [
                        'password.min' => 'Mật khẩu ít nhất 8 kí tự',
                    ]);
                    if($request->avatar) {
                        $userChange['avatar'] = $this->service->uploadAvatar($request, '/media/user/');
                    }
                    
                    $userChange->password = bcrypt($request['password']);
                    $userChange->name = $request->name;
                    $userChange->type = $request->type;
                    $userChange->phone = $request->phone;
                    $userChange->address = $request->address;
                    $userChange->birthday = $request->birthday;
                    $userChange->gender = $request->gender;
                    $userChange->note = $request->note;
                    $userChange->save();
                    $request = collect($request);
                    $this->service->updateUserProfile($request, $userChange);
                    Auth::logout();
                    return redirect()->route('admin.login.showLoginForm')->with('win', 'Thông tin thay đổi thành công, vui lòng đăng nhập lại hệ thống');
                }else {                         // nếu user đang sửa là user đang đăng nhập và không sửa email và không thay đổi pass
                    $this->validate($request,
                    [
                        'avatar' => 'nullable|sometimes|image'
                    ]);
                    if($request->avatar) {
                        $userChange['avatar'] = $this->service->uploadAvatar($request, '/media/user/');
                    }
                    
                    $userChange->name = $request->name;
                    $userChange->type = $request->type;
                    $userChange->phone = $request->phone;
                    $userChange->address = $request->address;
                    $userChange->birthday = $request->birthday;
                    $userChange->gender = $request->gender;
                    $userChange->note = $request->note;
                    $userChange->save();
                    $request = collect($request);
                    $this->service->updateUserProfile($request, $userChange);
                    
                    return redirect()->back()->with('win', 'Thông tin thay đổi thành công');
                }
            }else {                                     // nếu user đang sửa là user đang đăng nhập và sửa email
                if ($request->password != '') {         // nếu user đang sửa là user đang đăng nhập và sửa email và thay đổi pass
                    $this->validate($request,
                    [
                        'email' => 'unique:users,email',
                        'password' => 'min:8',
                        'avatar' => 'nullable|sometimes|image'
                    ],
                    [
                        'email.unique' => 'Email đã được đăng kí',
                        'password.min' => 'Mật khẩu ít nhất 8 kí tự',
                    ]);
                    if($request->avatar) {
                        $userChange['avatar'] = $this->service->uploadAvatar($request, '/media/user/');
                    }
                    
                    $userChange->email = $request->email;
                    $userChange->password = bcrypt($request['password']);
                    $userChange->name = $request->name;
                    $userChange->type = $request->type;
                    $userChange->phone = $request->phone;
                    $userChange->address = $request->address;
                    $userChange->birthday = $request->birthday;
                    $userChange->gender = $request->gender;
                    $userChange->note = $request->note;
                    $userChange->save();
                    $request = collect($request);
                    $this->service->updateUserProfile($request, $userChange);
                    Auth::logout();
                    return redirect()->route('admin.login.showLoginForm')->with('win', 'Thông tin thay đổi thành công, vui lòng đăng nhập lại hệ thống');
                }else {                                 // nếu user đang sửa là user  đang đăng nhập và sửa email và không thay đổi pass
                    $this->validate($request,
                    [
                        'email' => 'unique:users,email',
                        'avatar' => 'nullable|sometimes|image'
                    ],[
                        'email.unique' => 'Email đã được đăng kí'
                    ]);
                    if($request->avatar) {
                        $userChange['avatar'] = $this->service->uploadAvatar($request, '/media/user/');
                    }
                    
                    $userChange->email = $request->email;
                    $userChange->name = $request->name;
                    $userChange->type = $request->type;
                    $userChange->phone = $request->phone;
                    $userChange->address = $request->address;
                    $userChange->birthday = $request->birthday;
                    $userChange->gender = $request->gender;
                    $userChange->note = $request->note;
                    $userChange->save();
                    $request = collect($request);
                    $this->service->updateUserProfile($request, $userChange);
                    Auth::logout();
                    return redirect()->route('admin.login.showLoginForm')->with('win', 'Thông tin thay đổi thành công, vui lòng đăng nhập lại hệ thống');
                }
            }
        }else {                                         // nếu user đang sửa không phải là user đang đăng nhập
            if($request->email == $emailChange) {       // nếu user đang sửa không phải là user đang đăng nhập và không sửa mail
                if($request->password != '') {          // nếu user đang sửa không phải là user đang đăng nhập và không sửa mail và sửa pass
                    $this->validate($request,   
                    [
                        'password' => 'min:8',
                        'avatar' => 'nullable|sometimes|image'
                    ],
                    [
                        'password.min' => 'Mật khẩu ít nhất 8 kí tự',
                    ]);
                    if($request->avatar) {
                        $userChange['avatar'] = $this->service->uploadAvatar($request, '/media/user/');
                    }
                    
                    $userChange->password = bcrypt($request['password']);
                    $userChange->name = $request->name;
                    $userChange->type = $request->type;
                    $userChange->phone = $request->phone;
                    $userChange->address = $request->address;
                    $userChange->birthday = $request->birthday;
                    $userChange->gender = $request->gender;
                    $userChange->note = $request->note;
                    $userChange->save();
                    $request = collect($request);
                    $this->service->updateUserProfile($request, $userChange);
                    return redirect()->back()->with('win', 'Thông tin thay đổi thành công');
                }else {                                 // nếu user đang sửa không phải là user đang đăng nhập và không sửa mail và không sửa pass
                    $this->validate($request,
                    [
                        'avatar' => 'nullable|sometimes|image'
                    ]);
                    if($request->avatar) {
                        $userChange['avatar'] = $this->service->uploadAvatar($request, '/media/user/');
                    }
                    
                    $userChange->name = $request->name;
                    $userChange->type = $request->type;
                    $userChange->phone = $request->phone;
                    $userChange->address = $request->address;
                    $userChange->birthday = $request->birthday;
                    $userChange->gender = $request->gender;
                    $userChange->note = $request->note;
                    $userChange->save();
                    // print_r($request);die;
                    $request = collect($request);
                    $this->service->updateUserProfile($request, $userChange);
                    return redirect()->back()->with('win', 'Thông tin thay đổi thành công');
                }
            }else {                                 // nếu user đang sửa không phải là user đang đăng nhập và sửa mail
                if ($request->password != '') {     // nếu user đang sửa không phải là user đang đăng nhập và sửa mail và sửa pass
                    $this->validate($request,
                    [
                        'email' => 'unique:users,email',
                        'password' => 'min:8',
                        'avatar' => 'nullable|sometimes|image'
                    ],
                    [
                        'email.unique' => 'Email đã được đăng kí',
                        'password.min' => 'Mật khẩu ít nhất 8 kí tự',
                    ]);
                    if($request->avatar) {
                        $userChange['avatar'] = $this->service->uploadAvatar($request, '/media/user/');
                    }
                    $userChange->email = $request->email;
                    $userChange->password = bcrypt($request['password']);
                    $userChange->name = $request->name;
                    $userChange->type = $request->type;
                    $userChange->phone = $request->phone;
                    $userChange->address = $request->address;
                    $userChange->birthday = $request->birthday;
                    $userChange->gender = $request->gender;
                    $userChange->note = $request->note;
                    $userChange->save();
                    $request = collect($request);
                    $this->service->updateUserProfile($request, $userChange);
                    return redirect()->back()->with('win', 'Thông tin thay đổi thành công');
                }else {                             // nếu user đang sửa không phải là user đang đăng nhập và sửa mail và không sửa pass
                    $this->validate($request,
                    [
                        'email' => 'unique:users,email',
                        'avatar' => 'nullable|sometimes|image'
                    ],[
                        'email.unique' => 'Email đã được đăng kí'
                    ]);
                    if($request->avatar) {
                        $userChange['avatar'] = $this->service->uploadAvatar($request, '/media/user/');
                    }
                    
                    $userChange->email = $request->email;
                    $userChange->name = $request->name;
                    $userChange->type = $request->type;
                    $userChange->phone = $request->phone;
                    $userChange->address = $request->address;
                    $userChange->birthday = $request->birthday;
                    $userChange->gender = $request->gender;
                    $userChange->note = $request->note;
                    $userChange->save();
                    $request = collect($request);
                    $this->service->updateUserProfile($request, $userChange);
                    return redirect()->back()->with('win', 'Thông tin thay đổi thành công');
                }
            }
        }

    }

    public function getAddUser()
    {
        return view('admin.users.add');
    }
    public function postAddUser(UserRequest $request)
    {
        
        $attributes = $this->service->createUser($request, '/media/user/');
        $user = User::create($attributes);
        $request = collect($request);
        
        $this->service->updateUserProfile($request, $user);
        return redirect()->back()->with('win', 'Tạo tài khoản thành công');
    }

    const PER_PAGE = 10;

    public function admin()
    {
        $users = User::orderBy('id')->Paginate(self::PER_PAGE);
        return view('admin.users.user', compact('users'));
    }

    public function delete(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->delete();
        return redirect()->back()->with('win', 'Xóa dữ liệu thành công');
    }

    public function deleteAll(Request $request)
    {
        $users = $request->ids;
        if(empty($users)) {
            return redirect()->back()->with('fail', 'Không có dữ liệu để xóa');
        } else {
            foreach ($users as $user) {
                if($user != Auth::user()->id){
                    User::findOrFail($user)->delete();
                }
            }
            return redirect()->back()->with('win', 'Xóa dữ liệu thành công');
        }
        
    }

    public function check(Request $request)
    {  
        $email = User::where('email', $request->email)->count();
        print_r($email);
    }
}
