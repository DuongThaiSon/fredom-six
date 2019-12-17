<?php
namespace App\Http\Services\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;

class UserService
{
    public function uploadAvatar($request, $destinationDir)
    {
        if ($request->avatar) {
            $fileName = uniqid('leotive').'.'.$request->avatar->extension();
            $request->avatar->move(public_path($destinationDir), $fileName);
            $avatar = $destinationDir.$fileName;
            return $avatar;
        }
        // else{
        //     $avatar = User::findOrFail($request->id)->avatar;
        //     return $avatar;
        // }
        
    }

    private function handleAttributeExistance($attributes)
    {
        foreach ($attributes as $attribute) {
            if (!Profile::where('name', $attribute)->first()) {
                Profile::create(['name' => $attribute]);
            }
        }
    }

    public function updateUserProfile($request, $userChange)
    {
        $request = $request->only([
            'position',
            'phone',
            'address',
            'skype',
            'birthday',
            'gender',
            'note',
        ]);
        $this->handleAttributeExistance($request->keys());
        $listAttribute = Profile::whereIn('name', $request->keys())->get();
        $syncData = [];
        foreach ($listAttribute as $item) {
            $syncData[$item->id] = ['value' => $request[$item->name]];
        }
        $userChange->profiles()->syncWithoutDetaching($syncData);
    }

    public function createUser($request, $destinationDir)
    {
        $avatar = $this->uploadAvatar($request, $destinationDir);
        $attributes = [
            'name', 'email', 'type', 'phone', 'gender', 'skype', 'note', 'address', 'birthday'
        ];
        $attributes = $request->only($attributes);
        $attributes['password'] = bcrypt($request['password']);
        $attributes['avatar'] = $avatar;
        return $attributes;
    }
}