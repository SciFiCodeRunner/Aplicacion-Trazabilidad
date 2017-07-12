<?php

namespace Trazabilidad\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConductorFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Determina si un susuario  esta autorizado para hacer esta solicitud
     * 
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * Retorna las reglas de validacion aplicadas a la solicitud
     * @return array
     */
    public function rules()
    {
        return [
        'nombre'=> 'required|max:40',
        'cedula'=> 'required|max:12',
        'telefono'=>'required|max:10'
        ];
    }
}
