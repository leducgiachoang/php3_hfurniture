<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class sua_san_pham extends FormRequest
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
            'tensp'=>'required|min:5',
            'anhspx'=>'image',
            'giasp'=>'required|integer|min:1000',
            'soluong'=>'required|integer',
            'id_loai_san_pham'=>'required',
            'mota'=>'required|min: 20',
            'anh1x'=>'image',
            'anh2x'=>'image',
            'anh3x'=>'image',
        ];
    }
    public function messages()
    {
        return[
            'tensp.required'=>'Vui lòng không được để trống !',
            'anhspx.image'=>'Vui lòng chọn đúng định dạng ảnh !',
            'giasp.required'=>'Vui lòng không được để trống !',
            'soluong.required'=>'Vui lòng không được để trống !',
            'id_loai_san_pham.required'=>'Vui lòng không được để trống !',
            'mota.required'=>'Vui lòng không được để trống !',
            'anh1x.image'=>'Vui lòng chọn đúng định dạng ảnh !',
            'anh2x.image'=>'Vui lòng chọn đúng định dạng ảnh !',
            'anh3x.image'=>'Vui lòng chọn đúng định dạng ảnh !',
            'tensp.min'=>'Vui lòng ghi ít nhất 5 ký tự !',
            'giasp.integer'=>'Vui lòng điền đúng định dạng là số !',
            'giasp.min'=>'Vui lòng nhập giá tiền tối thiểu là 1000 VND',
            'soluong.integer'=>'Vui lòng điền đúng định dạng là số !',
            'mota.min'=>'vui lòng viết ít nhất 20 ký tự !'
        ];
    }
}
