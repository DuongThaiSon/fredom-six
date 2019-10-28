<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShowroomRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'required|numeric|digits_between:10,100',
            'email' => 'required|email'
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
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không hợp lệ',
            'phone.digits_between' => 'Số điện thoại phải ít nhất là 10 số',
            'phone.required' => 'Bạn chưa điền vào số điện thoại',
            'phone.numeric' => 'Điện thoại phải là số',
            'name.required' => 'Tiêu đề không được để trống',
        ];
    }
}
