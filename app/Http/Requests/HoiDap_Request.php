<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HoiDap_Request extends FormRequest
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
            'noidung'=>'required|min:20'
        ];
    }
    public function messages()
    {
        return [
            'noidung.required'=>'Làm ơn không được để trống !',
            'noidung.min'=>'Vui lòng nhập tối thiểu 20 ký tự !'
        ]; 
    }
}
