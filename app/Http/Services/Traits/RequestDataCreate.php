<?php

namespace App\Http\Services\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

trait RequestDataCreate
{
    public function appendCreateData($attributes)
    {
        $attributes = collect($attributes)->only($this->attributes)->toArray();
        $attributes['created_by'] = $attributes['updated_by'] = $this->guard()->id();
        $attributes['is_public'] = array_key_exists('is_public', $attributes)?'1':'0';
        $attributes['is_highlight'] = array_key_exists('is_highlight', $attributes)?'1':'0';
        $attributes['is_new'] = array_key_exists('is_new', $attributes)?'1':'0';
        $attributes['order'] = $this->model->max('order') + 1;
        if (!$attributes['slug']) {
            $slug = Str::slug($attributes['name'], '-');
            while ($this->model->where('slug', $slug)->get()->count() > 0) {
                $slug .= '-'.rand(0, 9);
            }
            $attributes['slug'] = $slug;
        }
        if (isset($this->categoryType)) {
            $attributes['type'] = $this->categoryType;
        }
        if (array_key_exists('avatar', $attributes)) {
            $avatar = $this->uploadImage($attributes['avatar']);
            $attributes['avatar'] = $avatar;
        }

        return $attributes;
    }
}
