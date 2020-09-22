<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class san_pham extends FormRequest
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
            'anhsp'=>'required|image',
            'giasp'=>'required|integer|min:1000',
            'soluong'=>'required|integer|min:1',
            'id_loai_san_pham'=>'required',
            'mota'=>'required|min: 20',
            'anh1'=>'required|image',
            'anh2'=>'required|image',
            'anh3'=>'required|image',

        ];
    }

    public function messages()
    {
        return[
          'tensp.required'=>'Vui lòng không được để trống !',
          'anhsp.required'=>'Vui lòng không được để trống !',
          'giasp.required'=>'Vui lòng không được để trống !',
          'soluong.required'=>'Vui lòng không được để trống !',
          'id_loai_san_pham.required'=>'Vui lòng không được để trống !',
          'mota.required'=>'Vui lòng không được để trống !',
          'anh1.required'=>'Vui lòng không được để trống !',
          'anh2.required'=>'Vui lòng không được để trống !',
          'anh3.required'=>'Vui lòng không được để trống !',
          'tensp.min'=>'Vui lòng ghi ít nhất 5 ký tự !',
          'anhsp.image'=>'Vui lòng chọn đúng định dạng hình ảnh',
          'anh1.image'=>'Vui lòng chọn đúng định dạng hình ảnh',
          'anh2.image'=>'Vui lòng chọn đúng định dạng hình ảnh',
          'anh3.image'=>'Vui lòng chọn đúng định dạng hình ảnh',
          'giasp.integer'=>'Vui lòng điền đúng định dạng là số !',
          'giasp.min'=>'Vui lòng nhập giá tiền tối thiểu là 1000 VND',
          'soluong.integer'=>'Vui lòng điền đúng định dạng là số !',
          'soluong.min'=>'Vui lòng nhập số lượng tối thiểu 1 đơn vị !',
          'mota.min'=>'vui lòng viết ít nhất 20 ký tự !'        
        ];
    }
}
