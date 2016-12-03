<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoRequest extends FormRequest
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
            'idCliente' => 'required|numeric',
            'montoTotal' => 'required|numeric',
            'cantidades' => 'required'
        ];
    }

    public function messages (){
        return [
            'idCliente.required' => 'Debe registrar un cliente válido.',
            'cantidades.required' => 'Debe agregar a la lista al menos un material.'
        ];
    }
}
