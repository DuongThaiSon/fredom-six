<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;

class ChangePasswordController extends Controller
{
    public function getChangePassword()
    {
        return view('admin.user.changePassword');
    }
    public function postChangePassword(Request $request)
    {
        $this->validate($request,
        [
            'oldpass' => 'required',
            'newpass' => 'required|min:8',
            're-newpass' => 'required|same:newpass'
        ],
        [
            'newpass.min' => 'Mật khẩu ít nhất 8 kí tự',
            're-newpass.same' => 'Mật khẩu chưa trùng khớp' 
        ]);
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
