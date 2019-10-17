<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Auth;

class ChangePasswordController extends Controller
{
    public function getChangePassword()
    {
        return view('admin.user.changePassword');
    }
    public function postChangePassword(UserRequest $request)
    {
        $email = Auth::user()->email;
        $credentials = array('email'=> $email, 'password'=>$request->oldpass);
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $user->password = bcrypt($request['newpass']);
            $user->save();
            Auth::logout();
            return redirect()->route('admin.login.showLoginForm')->with('win', 'Mật khẩu thay đổi thành công, vui lòng đăng nhập lại hệ thống');
        }else{
            return redirect()->back()->with('fail', 'Mật khẩu cũ không đúng');
        }
    }
}
