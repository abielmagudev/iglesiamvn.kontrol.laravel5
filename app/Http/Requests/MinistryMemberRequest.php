<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MinistryMemberRequest extends FormRequest
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
        // $user = User::find($this->users);
        // switch($this->method()){ case 'GET': }

        return [
            'member_fullname' => 'required',
            'position'        => 'required|integer',
            'description'     => 'required',          
        ];
    }

    public function messages()
    {
        return array(
            'member_fullname.required' => __('Selecciona un miembro para agregar'),
            'position.required' => __('Selecciona la posicion del miembro'),
            'position.integer'  => __('Selecciona una posicion valida'),
            'description.required' => __('Describe la funcion del miembro en el ministerio'),
        );
    }
}
