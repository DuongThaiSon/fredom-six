<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGalleryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => 'required|numeric|min:0',
            'name' => "required|unique:galleries,name,{$this->gallery->id}",
            'avatar' => 'nullable|sometimes|image',
            'slug' => "sometimes|unique:galleries,slug,{$this->gallery->id}",
        ];
    }
}
