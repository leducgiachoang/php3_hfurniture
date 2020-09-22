<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Check_Sua_nguoi_dung extends FormRequest
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
            'hoten' => 'required',
            'username' => 'required',
            'matkhau' => 'required|min:5',
            'email' => 'required|email',
            'sodienthoai' => 'required',
            'anhdaidienx'=>'image'
        ];
    }

    public function messages()
    {
        return [
            'hoten.required' => 'Làm ơn không được để trống !',
            'username.required' => 'Làm ơn không được để trống !',
            'matkhau.required' => 'Làm ơn không được để trống !',
            'matkhau.min' => 'Làm ơn nhập tối thiểu 5 ký tự !',
            'email.required' => 'Làm ơn không được để trống !',
            'email.email' => 'Làm ơn nhập đúng định dạng email !',
            'sodienthoai.required' => 'Làm ơn không được để trống !',
            'anhdaidienx.image'=>'Vui lòng nhọn định dạng là ảnh'
        ];
    }
}
