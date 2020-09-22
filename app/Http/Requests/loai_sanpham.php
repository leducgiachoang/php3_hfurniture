<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loai_sanpham extends FormRequest
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
            'tenloai'=>'required|min:6',
            'anhdanhmuc'=>'required|image'
        ];
    }
    public function messages()
    {
        return[
            'tenloai.required'=>'Vui lòng không được để trống',
            'tenloai.min'=>'Vui lòng nhập tối thiểu 6 ký tự !',
            'anhdanhmuc.required'=>'Vui lòng không được để trống',
            'anhdanhmuc.image' => 'vui lòng chọn đúng định dạng ảnh !'
        ];
        
    }
}
