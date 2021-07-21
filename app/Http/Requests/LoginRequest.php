<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
        $rules = [
            'email' => 'required|email',
            'password' =>'required'
        ];

        return $rules;
    }

//    public function messages()
//    {
//        return [
//            'email.required' => 'Vui lòng nhập đúng định dạng',
//            'email.email' => 'Vui lòng nhâp đúng định dạng email',
//            'password.required' => 'Vui lòng nhập password',
//        ];
//    }
}
