<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
            'title' => 'required|max:130',
            'content' => 'required|max:250'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'El titulo es requerido',
            'content.required' => 'El contenido es obligatorio'
        ];
    }
}
