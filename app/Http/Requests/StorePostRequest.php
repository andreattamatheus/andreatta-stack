<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'image' => ['required'],
            'content' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O título é obrigatório.',
            'file.required' => 'A capa é obrigatória',
        ];
    }
}
