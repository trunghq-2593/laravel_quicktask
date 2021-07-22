<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'name' => 'required|max:255',
        ];
    }

    public function messages()
    {
        if (app()->getLocale() == 'vi') {
            return [
                'name.required' => 'Vui lòng không để trống nhiệm vụ.',
                'name.max' => 'Nhiệm vụ không vượt quá 255 ký tự.',
            ];
        }

        return [];
    }
}
