<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MinistryRequest extends FormRequest
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
        $method = $this->method();
        if( $method === 'PUT' || $method === 'PATCH')
        {
            return [
                'name' => 'required|min:3|unique:ministries,name,' . $this->route('ministry')
            ];
        }
        else
        {
            return [
                'name' => 'required|min:3|unique:ministries'
            ];            
        }
    }
}
