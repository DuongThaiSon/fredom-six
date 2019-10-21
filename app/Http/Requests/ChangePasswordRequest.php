<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'oldpass' => 'required',
            'newpass' => 'required|min:8',
            're-newpass' => 'required|same:newpass'
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
            'newpass.min' => 'Mật khẩu ít nhất 8 kí tự',
            're-newpass.same' => 'Mật khẩu không trùng khớp', 
            'oldpass.required' => 'Vui lòng nhập mật khẩu cũ',
            'newpass.required' => 'Vui lòng nhập mật khẩu mới',
            're-newpass.required' => 'Vui lòng nhập lại mật khẩu mới'
        ];
    }
}
