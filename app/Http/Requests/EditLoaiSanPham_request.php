<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditLoaiSanPham_request extends FormRequest
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
            'tenloai' => 'required',
            'anhdanhmucx' => 'image'
        ];
    }
    public function messages()
    {
        return [
            'tenloai.required' => 'Làm ơn không được để trống !',
            'anhdanhmucx.image' => 'Vui lòng chọn đúng định dạng hình ảnh !'
        ];
    }
}
