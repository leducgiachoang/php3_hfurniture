<?php

namespace App\Http\Requests;
use App\NguoiDungModel;
use Illuminate\Foundation\Http\FormRequest;

class DangKyRequest extends FormRequest
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
            'matkhau2' => 'required|same:matkhau',
            'email' => 'required|email|unique:App\NguoiDungModel,email',
            'sodienthoai' => 'required|unique:App\NguoiDungModel,SoDienThoai',
            'anhdaidien' => 'required|image',

        ];
    }
    public function messages()
    {
        return [
            'hoten.required' => 'Làm ơn không được để trống !',
            'username.required' => 'Làm ơn không được để trống !',
            'matkhau.required' => 'Làm ơn không được để trống !',
            'matkhau.min' => 'Làm ơn nhập tối thiểu 5 ký tự !',
            'matkhau2.required' => 'Làm ơn không được để trống !',
            'matkhau2.same' => 'Làm ơn nhập lại mật khẩu cho đúng !',
            'email.required' => 'Làm ơn không được để trống !',
            'email.email' => 'Làm ơn nhập đúng định dạng email !',
            'email.unique'=>'Email này đã được đăng ký bởi một tài khoản khác !',
            'sodienthoai.required' => 'Làm ơn không được để trống !',
            'sodienthoai.unique' => 'Số điện thoại này đã được đăng ký bởi một tài khoản khác !',
            'anhdaidien.required' => 'Làm ơn không được để trống !',
            'anhdaidien.image' => 'Làm ơn chọn đúng định dạng ảnh !'
        ];
    }
}
