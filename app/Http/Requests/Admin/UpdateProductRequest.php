<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => "required|unique:products,name,{$this->productId}",
            'avatar' => 'nullable|sometimes|image',
            'sku' => "sometimes|unique:products,sku,{$this->productId}",
            'slug' => "sometimes|unique:products,slug,{$this->productId}",
        ];
    }
}
