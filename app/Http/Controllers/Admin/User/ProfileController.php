<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Services\Admin\ProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function index()
    {
        $user =  $this->profileService->get();
        return view('admin.users.profile.index', compact('user'));
    }

    public function edit()
    {
        $user =  $this->profileService->get();
        return view('admin.users.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $attributes = $request->only([
            'name', 'avatar', 'phone', 'address', 'birthday', 'gender'
        ]);
        $this->profileService->update($attributes);
        return redirect()->route('admin.users.profile.index')->with('success', 'Profile updated.');
    }

    public function showChangePasswordForm()
    {
        return view('admin.users.profile.password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password_current' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = $this->profileService->get();
        if (!Hash::check($request->password_current, $user->password)) {
            return back()->withErrors(['current_password' => __('Invalid current password.')]);
        }
        if (Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => __('New password cannot be the same with current password.')]);
        }
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('admin.users.profile.index')->with('success', __('Password updated.'));
    }
}
