<?php

namespace Trazabilidad\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoTransporteFormRequest extends FormRequest
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

        'numeroRecibo'=>'required',
        'idVehiculo'=>'required',
        'idMaterial'=>'required',
        'id_abscisa_cargue'=>'required',
        'id_abscisa_descargue'=>'required',
        'cantidadMaterial'=>'required'
            //
        ];
    }
}
