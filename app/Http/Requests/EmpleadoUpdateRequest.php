<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoUpdateRequest extends FormRequest
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
            'apellidoMaterno' => 'required|regex:/^[\pL\s\-]+$/u|max:100',
            //'numeroDocumento' => 'required|digits_between:8,20|numeric|unique:Empleado,numeroDocumento',
            'fechaNacimiento' => 'required|date',
                       
            'correo' => 'email|max:100',
            'licencia' => 'max:50',
            //'fechaIngreso' => 'required|date',

            //'idTipoDocumento' => 'required|numeric',
            'idCargo' => 'required|numeric'
        ];
    }
}
