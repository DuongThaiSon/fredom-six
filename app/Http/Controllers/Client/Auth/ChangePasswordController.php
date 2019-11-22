<?php

namespace App\Http\Controllers\Client\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Auth;

class ChangePasswordController extends Controller
{
    public function change()
    {
        return view('client.auth.changePassword');
    }
    public function update(ChangePasswordRequest $request)
    {
        $email = Auth::user()->email;
        $credentials = array('email'=> $email, 'password'=>$request->oldpass);
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $user->password = bcrypt($request['newpass']);
            $user->save();
            Auth::logout();
            return redirect()->route('client.loginform')->with('success', 'Mật khẩu thay đổi thành công, vui lòng đăng nhập lại hệ thống');
        }else{
            return redirect()->back()->with('fail', 'Mật khẩu cũ không đúng');
        }
    }
}
