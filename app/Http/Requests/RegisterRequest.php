<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username.required' => 'Họ tên là bắt buộc',
            'password.required',
            'nd_hoten.required',
            'nd_email.required',
            'nd_sdt.required',
            'nd_namsinh.required',
            'nd_diachi.required',
        ];
    }

    public function attributes(){
        return [
            'username' => 'Tên đăng nhập',
            'password' => 'Mật khẩu',
            'nd_hoten' => 'Họ tên',
            'nd_email' => 'Email',
            'nd_sdt' => 'Số điện thoại',
            'nd_namsinh' => 'Ngày tháng năm sinh',
            'nd_diachi' => 'Địa chỉ',
        ];
        }
}
