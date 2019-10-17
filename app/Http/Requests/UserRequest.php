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
            'password' => 'min:8',
            'email' => 'unique:users,email',
            'oldpass' => '',
            'newpass' => 'min:8',
            're-newpass' => 'same:newpass'
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
            'password.min' => 'Mật khẩu ít nhất 8 kí tự',
            'email.unique' => 'Email đã được đăng kí',
            'newpass.min' => 'Mật khẩu ít nhất 8 kí tự',
            're-newpass.same' => 'Mật khẩu không trùng khớp' 
        ];
    }
}
