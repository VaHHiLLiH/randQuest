<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'name'                  => ['required', 'alpha'],
            'email'                 => ['required', 'email'],
            'password'              => ['required', 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'         =>  'Необходимо заполнить Имя',
            'name.alpha'            =>  'Необходимо заполнить Имя',
            'email.email'           =>  'Несоответствующий Email',
            'email.required'        =>  'Несоответствующий Email',
            'password.required'     =>  'Необходимо заполнить пароль',
            'password.confirmed'    =>  'Пароли не совпадают',
        ];
    }
}
