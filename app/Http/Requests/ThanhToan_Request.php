<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThanhToan_Request extends FormRequest
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
            'email' => 'required|email',
            'sodienthoai' => 'required',
            'noinhan' => 'required',
            'ghichu' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'hoten.required' => 'Làm ơn không được để trống !',
            'email.required' => 'Làm ơn không được để trống !',
            'email.email' => 'Làm ơn nhập đúng định dạng email !',
            'sodienthoai.required' => 'Làm ơn không được để trống !',
            'noinhan.required' => 'Làm ơn không được để trống !',
            'ghichu.required' => 'Làm ơn không được để trống !',
        ];
    }
}
