<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title' => 'required|unique:news|min:3|max:255',
            'content' => 'required|min:5'
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Укажите :attribute Новости',
            'content.required' => 'Напишите :attribute Новости'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Заголовок',
            'content' => 'Текст'
        ];
    }
}
