<?php

namespace App\Services\Admin;

use App\Models\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ComponentService
{

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function allWithDatatables()
    {
        $list = Component::query();
        return DataTables::of($list)
            ->setRowClass(function ($user) {
                return 'ui-state-default';
            })
            ->make(true);
    }

    public function create(array $attributes)
    {
        $attributes['is_public'] = array_key_exists('is_public', $attributes) ? 1 : 0;
        if (!array_key_exists('key', $attributes) || !$attributes['key']) {
            $attributes['key'] = Str::slug($attributes['name'], '_');
        }
        $attributes['created_by'] = $attributes['updated_by'] = $this->guard()->id();
        $component = Component::create($attributes);
        return $component;
    }

    public function update(array $attributes, $id)
    {
        $component = Component::findOrFail($id);
        $attributes['is_public'] = array_key_exists('is_public', $attributes) ? 1 : 0;
        if (!array_key_exists('key', $attributes) && !$attributes['key']) {
            $attributes['key'] = Str::slug($attributes['name'], '_');
        }
        $attributes['updated_by'] = $this->guard()->id();
        $component->fill($attributes);
        $component->save();
        return $component;
    }

    public function destroy($id)
    {
        Component::destroy($id);
        return true;
    }
}
