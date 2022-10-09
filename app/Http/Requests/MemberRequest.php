<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'names' => 'required',
            'lastnames' => 'required',
            'birthday' => 'required',
            'emergency' => 'required',
            'picture' => 'image|max:1024',
            'email' => 'email|nullable'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'names.required' => 'Nombre(s) es requerido',
            'lastnames.required' => 'Apellido(s) es requerido',
            'birthday.required' => 'Fecha de nacimiento es requerido',
            'emergency.required' => 'Emergencia es requerido',
            'picture.image' => 'Fotografia debe ser formato JPG',
            'picture.image' => 'Fotografia debe ser tamaño maximo de 1MB',
            'email.email' => 'Email debe ser formato de correo electrónico',
        ];
    }
}
