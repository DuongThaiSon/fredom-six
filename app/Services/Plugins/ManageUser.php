<?php

namespace App\Services\Plugins;

use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

trait ManageUser
{
    public function getUserType()
    {
        if (method_exists($this, 'userType')) {
            return $this->userType();
        }

        return property_exists($this, 'userType') ? $this->userType : '';
    }

    public function create(array $attributes)
    {
        if (array_key_exists('avatar', $attributes) && !is_null($attributes['avatar'])) {
            $attributes['avatar'] = $this->uploadImageBase64($attributes['avatar'], $this->getDestinationUploadDir());
        } else {
            $attributes['avatar'] = 'default.jpg';
        }
        $attributes['password'] = bcrypt($attributes['password']);
        $attributes['type'] = $this->getUserType();
        $userStatus = null;
        if (array_key_exists('status', $attributes)) {
            $userStatus = $attributes['status'];
            unset($attributes['status']);
        }
        $user = User::create($attributes);
        $user = $this->updateStatus($userStatus, $user->id);
        return $user;
    }

    public function update(array $attributes, $id)
    {
        $user = $this->findOrFail($id);
        if (array_key_exists('password', $attributes) && !is_null($attributes['password'])) {
            $attributes['password'] = bcrypt($attributes['password']);
        } else {
            unset($attributes['password']);
        }
        if (array_key_exists('avatar', $attributes) && !is_null($attributes['avatar'])) {
            $attributes['avatar'] = $this->uploadImageBase64($attributes['avatar'], $this->getDestinationUploadDir());
        } else {
            unset($attributes['avatar']);
        }
        $userStatus = null;
        if (array_key_exists('status', $attributes)) {
            $userStatus = $attributes['status'];
            unset($attributes['status']);
        }
        $user->fill($attributes);
        $user->save();
        $user = $this->updateStatus($userStatus, $user->id);
        return $user;
    }

    public function find($id)
    {
        return User::whereId($id)->whereType($this->getUserType())->first();
    }

    public function findOrFail($id)
    {
        return User::whereId($id)->whereType($this->getUserType())->firstOrFail();
    }

    public function destroy($id)
    {
        $user = $this->findOrFail($id);
        $user->delete();
        return true;
    }

    public function destroyMany(string $ids)
    {
        $ids = explode(",", $ids);
        $entities = User::whereType($this->getUserType())->whereIn('id', $ids)->get();

        if (!$entities) {
            abort(404);
        }

        foreach ($entities as $value) {
            if ($value->avatar) {
                $this->deleteAvatar($value);
            }
            $value->delete();
        }

        return true;
    }

    public function allWithDatatables()
    {
        $list = User::query()->whereType($this->getUserType());
        return DataTables::of($list)
            ->setRowClass(function ($user) {
                return 'ui-state-default';
            })
            ->make(true);
    }

    public function updateStatus($status, $id)
    {
        $user = $this->findOrFail($id);
        switch ($status) {
            case 'not_verified':
                $user->email_verified_at = null;
                break;
            case 'active':
                if (!$user->email_verified_at) $user->email_verified_at = now();
                $user->is_active = true;
                break;
            case 'disabled':
                if (!$user->email_verified_at) $user->email_verified_at = now();
                $user->is_active = false;
                break;
            default:
                return false;
                break;
        }
        $user->save();
        return $user;
    }
}
