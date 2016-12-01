<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteUpdateRequest extends FormRequest
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
            'nombres' => 'required|regex:/^[\pL\s\-]+$/u|max:100',
            'apellidoPaterno' => 'required|regex:/^[\pL\s\-]+$/u|max:100',
            'apellidoMaterno' => 'regex:/^[\pL\s\-]+$/u|max:100',
            //'numeroDocumento' => 'required|digits_between:8,20|numeric|unique:cliente,numeroDocumento',
            'fechaNacimiento' => 'date',
            'genero' => 'numeric',
            'telefono' => 'digits_between:4,20|numeric',
            'correo' => 'email|max:100',
            'direccion' => 'max:100',

            //'idTipoDocumento' => 'required|numeric',
            'idZona' => 'numeric'
        ];
    }
}
