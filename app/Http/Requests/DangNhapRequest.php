<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangNhapRequest extends FormRequest
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
            'email' => 'required|email',
            'mat_khau' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Làm ơn không được để trống !',
            'email.email' => 'Vui lòng điền đúng định dạng Email',
            'mat_khau.required' => 'Làm ơn không được để trống !'
        ];
    }
}
