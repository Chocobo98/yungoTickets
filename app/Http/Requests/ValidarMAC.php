<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarMAC extends FormRequest
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
            'marca'=>'required',
            'tipoEquipo'=>'required',
            'modelo'=>'required',
            'mac'=>'required|regex:/^([0-9A-Fa-f]{2}[:-]){6}([0-9A-Fa-f]{2})$/'
        ];
    }
}
