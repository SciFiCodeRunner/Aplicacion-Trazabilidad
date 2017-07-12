<?php

namespace Trazabilidad\Http\Requests;
use Trazabilidad\Http\Requests\Request;
class VehiculoFormRequest extends Request{
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
            'placa'=>'required|max:6',
			'costo_acarreo'=>'required',
			'volumen_carga'=>'required|max:10',
            'Choferes_idChofer'=>'required',
            'idEmpresa'=>'required'
        ];
    }
}
