<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'avatar' => 'nullable|sometimes|image',
            'password' => 'required|min:8',
            'email' => 'required|unique:users,email',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'avatar.image' => 'Ảnh không đúng định dạng',
            'password.min' => 'Mật khẩu ít nhất 8 kí tự',
            'email.unique' => 'Email đã được đăng kí',
            'email.required' => 'Vui lòng điền email',
            'password.required' => 'Vui lòng điền mật khẩu'
        ];
    }
}
