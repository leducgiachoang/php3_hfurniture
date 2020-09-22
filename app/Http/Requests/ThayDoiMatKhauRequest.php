<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThayDoiMatKhauRequest extends FormRequest
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
            'matkhaucu' => 'required|min:5',
            'matkhaumoi' => 'required|min:5',
            'matkhaumoi2' => 'required|min:5|same:matkhaumoi'
        ];
    }

    public function messages()
    {
        return [
            'matkhaucu.required' => 'Làm ơn không được để trống !',
            'matkhaumoi.required' => 'Làm ơn không được để trống !',
            'matkhaumoi2.required' => 'Làm ơn không được để trống !',
            'matkhaucu.min' => 'Làm ơn nhập tối thiểu 5 ký tự !',
            'matkhaumoi.min' => 'Làm ơn nhập tối thiểu 5 ký tự !',
            'matkhaumoi2.min' => 'Làm ơn nhập tối thiểu 5 ký tự !',
            'matkhaumoi2.same' => 'Làm ơn nhập lại mật khẩu cho đúng !'
        ];
    }
}
