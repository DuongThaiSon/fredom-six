<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;
use Auth;

class UserController extends Controller
{
    public function info($id)
    {
        $user = User::findOrFail($id);
        foreach ($user->profiles()->get() as $profile) {
            $name = $profile->name;
            $user->$name = $profile->pivot->value;
        }
        return view('admin.user.info', compact('user'));
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
                    if ($request->hasFile('avatar')) {
                        $destinationDir = public_path('media/user');
                        $fileName = time().'.'.$request->avatar->extension();
                        $request->avatar->move($destinationDir, $fileName);
                        $user['avatar'] = '/media/user/'.$fileName;
                    }
                    $user->password = bcrypt($request['password']);
                    $user->name = $request->name;
                    $user->save();
                    $request = $request->only([
                        'position',
                        'phone',
                        'address',
                        'skype',
                        'birthday'
                    ]);
                    $this->handleAttributeExistance(array_keys($request));
                    $listAttribute = Profile::whereIn('name', array_keys($request))->get();
                    $syncData = [];
                    foreach ($listAttribute as $item) {
                        $syncData[$item->id] = ['value' => $request[$item->name]];
                    }
                    $userChange->profiles()->syncWithoutDetaching($syncData);
                    Auth::logout();
                    return redirect()->route('admin.login.showLoginForm')->with('win', 'Thông tin thay đổi thành công, vui lòng đăng nhập lại hệ thống');
                }else {                         // nếu user đang sửa là user đang đăng nhập và không sửa email và không thay đổi pass
                    $this->validate($request,
                    [
                        'avatar' => 'nullable|sometimes|image'
                    ]);
                    if ($request->hasFile('avatar')) {
                        $destinationDir = public_path('media/user');
                        $fileName = time().'.'.$request->avatar->extension();
                        $request->avatar->move($destinationDir, $fileName);
                        $user['avatar'] = '/media/user/'.$fileName;
                    }
                    $user->name = $request->name;
                    $user->save();
                    $request = $request->only([
                        'position',
                        'phone',
                        'address',
                        'skype',
                        'birthday'
                    ]);
                    $this->handleAttributeExistance(array_keys($request));
                    $listAttribute = Profile::whereIn('name', array_keys($request))->get();
                    $syncData = [];
                    foreach ($listAttribute as $item) {
                        $syncData[$item->id] = ['value' => $request[$item->name]];
                    }
                    $userChange->profiles()->syncWithoutDetaching($syncData);
                    
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
                    if ($request->hasFile('avatar')) {
                        $destinationDir = public_path('media/user');
                        $fileName = time().'.'.$request->avatar->extension();
                        $request->avatar->move($destinationDir, $fileName);
                        $userChange['avatar'] = '/media/user/'.$fileName;
                    }
                    $userChange->email = $request->email;
                    $userChange->password = bcrypt($request['password']);
                    $userChange->name = $request->name;
                    $userChange->save();
                    $request = $request->only([
                        'position',
                        'phone',
                        'address',
                        'skype',
                        'birthday'
                    ]);
                    $this->handleAttributeExistance(array_keys($request));
                    $listAttribute = Profile::whereIn('name', array_keys($request))->get();
                    $syncData = [];
                    foreach ($listAttribute as $item) {
                        $syncData[$item->id] = ['value' => $request[$item->name]];
                    }
                    $userChange->profiles()->syncWithoutDetaching($syncData);
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
                    if ($request->hasFile('avatar')) {
                        $destinationDir = public_path('media/user');
                        $fileName = time().'.'.$request->avatar->extension();
                        $request->avatar->move($destinationDir, $fileName);
                        $userChange['avatar'] = '/media/user/'.$fileName;
                    }
                    $userChange->email = $request->email;
                    $userChange->name = $request->name;
                    $userChange->save();
                    $request = $request->only([
                        'position',
                        'phone',
                        'address',
                        'skype',
                        'birthday'
                    ]);
                    $this->handleAttributeExistance(array_keys($request));
                    $listAttribute = Profile::whereIn('name', array_keys($request))->get();
                    $syncData = [];
                    foreach ($listAttribute as $item) {
                        $syncData[$item->id] = ['value' => $request[$item->name]];
                    }
                    $userChange->profiles()->syncWithoutDetaching($syncData);
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
                    if ($request->hasFile('avatar')) {
                        $destinationDir = public_path('media/user');
                        $fileName = time().'.'.$request->avatar->extension();
                        $request->avatar->move($destinationDir, $fileName);
                        $userChange['avatar'] = '/media/user/'.$fileName;
                    }
                    $userChange->password = bcrypt($request['password']);
                    $userChange->name = $request->name;
                    $userChange->save();
                    $request = $request->only([
                        'position',
                        'phone',
                        'address',
                        'skype',
                        'birthday'
                    ]);
                    $this->handleAttributeExistance(array_keys($request));
                    $listAttribute = Profile::whereIn('name', array_keys($request))->get();
                    $syncData = [];
                    foreach ($listAttribute as $item) {
                        $syncData[$item->id] = ['value' => $request[$item->name]];
                    }
                    $userChange->profiles()->syncWithoutDetaching($syncData);
                    return redirect()->back()->with('win', 'Thông tin thay đổi thành công');
                }else {                                 // nếu user đang sửa không phải là user đang đăng nhập và không sửa mail và không sửa pass
                    $this->validate($request,
                    [
                        'avatar' => 'nullable|sometimes|image'
                    ]);
                    if ($request->hasFile('avatar')) {
                        $destinationDir = public_path('media/user');
                        $fileName = time().'.'.$request->avatar->extension();
                        $request->avatar->move($destinationDir, $fileName);
                        $userChange['avatar'] = '/media/user/'.$fileName;
                    }
                    $userChange->name = $request->name;
                    $userChange->save();
                    $request = $request->only([
                        'position',
                        'phone',
                        'address',
                        'skype',
                        'birthday'
                    ]);
                    $this->handleAttributeExistance(array_keys($request));
                    $listAttribute = Profile::whereIn('name', array_keys($request))->get();
                    $syncData = [];
                    foreach ($listAttribute as $item) {
                        $syncData[$item->id] = ['value' => $request[$item->name]];
                    }
                    $userChange->profiles()->syncWithoutDetaching($syncData);
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
                    if ($request->hasFile('avatar')) {
                        $destinationDir = public_path('media/user');
                        $fileName = time().'.'.$request->avatar->extension();
                        $request->avatar->move($destinationDir, $fileName);
                        $userChange['avatar'] = '/media/user/'.$fileName;
                    }
                    $userChange->email = $request->email;
                    $userChange->password = bcrypt($request['password']);
                    $userChange->name = $request->name;
                    $userChange->save();
                    $request = $request->only([
                        'position',
                        'phone',
                        'address',
                        'skype',
                        'birthday'
                    ]);
                    $this->handleAttributeExistance(array_keys($request));
                    $listAttribute = Profile::whereIn('name', array_keys($request))->get();
                    $syncData = [];
                    foreach ($listAttribute as $item) {
                        $syncData[$item->id] = ['value' => $request[$item->name]];
                    }
                    $userChange->profiles()->syncWithoutDetaching($syncData);
                    return redirect()->back()->with('win', 'Thông tin thay đổi thành công');
                }else {                             // nếu user đang sửa không phải là user đang đăng nhập và sửa mail và không sửa pass
                    $this->validate($request,
                    [
                        'email' => 'unique:users,email',
                        'avatar' => 'nullable|sometimes|image'
                    ],[
                        'email.unique' => 'Email đã được đăng kí'
                    ]);
                    if ($request->hasFile('avatar')) {
                        $destinationDir = public_path('media/user');
                        $fileName = time().'.'.$request->avatar->extension();
                        $request->avatar->move($destinationDir, $fileName);
                        $userChange['avatar'] = '/media/user/'.$fileName;
                    }
                    $userChange->email = $request->email;
                    $userChange->name = $request->name;
                    $userChange->save();
                    $request = $request->only([
                        'position',
                        'phone',
                        'address',
                        'skype',
                        'birthday'
                    ]);
                    $this->handleAttributeExistance(array_keys($request));
                    $listAttribute = Profile::whereIn('name', array_keys($request))->get();
                    $syncData = [];
                    foreach ($listAttribute as $item) {
                        $syncData[$item->id] = ['value' => $request[$item->name]];
                    }
                    $userChange->profiles()->syncWithoutDetaching($syncData);
                    return redirect()->back()->with('win', 'Thông tin thay đổi thành công');
                }
            }
        }

    }

    private function handleAttributeExistance($attributes)
    {
        foreach ($attributes as $attribute) {
            if (!Profile::where('name', $attribute)->first()) {
                Profile::create(['name' => $attribute]);
            }
        }
    }

    public function getAddUser()
    {
        return view('admin.user.add');
    }
    public function postAddUser(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'name' => 'required',
        ],[
            'email.unique' => 'Email đã được đăng kí',
            'password.min' => 'Mật khẩu ít nhất 8 kí tự'
        ]);   
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =  bcrypt($request['password']);
        if ($request->hasFile('avatar')) {
            $destinationDir = public_path('media/user');
            $fileName = time().'.'.$request->avatar->extension();
            $request->avatar->move($destinationDir, $fileName);
            $user['avatar'] = '/media/user/'.$fileName;
        }
        $user->save();
        $request = $request->only([
            'position',
            'phone',
            'address',
            'skype',
            'birthday'
        ]);
        $this->handleAttributeExistance(array_keys($request));
        $listAttribute = Profile::whereIn('name', array_keys($request))->get();
        $syncData = [];
        foreach ($listAttribute as $item) {
            $syncData[$item->id] = ['value' => $request[$item->name]];
        }
        $user->profiles()->syncWithoutDetaching($syncData);
        return redirect()->back()->with('win', 'Tạo tài khoản thành công');
    }

    const PER_PAGE = 10;

    public function admin()
    {
        $users = User::orderBy('id')->Paginate(self::PER_PAGE);
        return view('admin.user.user', compact('users'));
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('win', 'Xóa dữ liệu thành công');
    }

    public function deleteAll(Request $request)
    {
        $users = $request->id;
        if(empty($users)) {
            return redirect()->back()->with('fail', 'Không có dữ liệu để xóa');
        } else {
            foreach ($users as $user) {
                if($user != Auth::user()->id){
                    User::findOrFail($user)->delete();
                }
            }
        }
        return redirect()->back()->with('win', 'Xóa dữ liệu thành công');
    }
}
