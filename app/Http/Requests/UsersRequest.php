<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:10',
            'email' => 'required|email',
            'password' => 'nullable|string|min:3',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (!$this->checkPassword()) {
                $validator->errors()
                    ->add('current_password', 'Пароль указан неверно');
            }
        });
    }

    protected function checkPassword() {
        return Hash::check($this->post('current_password'), Auth::user()->password);
    }
}