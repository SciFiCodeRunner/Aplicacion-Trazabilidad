<?php

namespace Trazabilidad\Http\Controllers;

use Illuminate\Http\Request;
use Trazabilidad\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Trazabilidad\Vehiculo;
use DB;
use Excel;
class ExcelController extends Controller
{
    public function getExport(){
$vehiculos=DB::table('vehiculos_transporte as vh')
			->join('choferes as ch','vh.Choferes_idChofer','=','ch.idChofer')
			->join('empresas as emp','vh.Empresa_idEmpresa','=','emp.idEmpresa')
			->select('vh.idVehiculo','vh.placa','vh.costo_acarreo','vh.volumen_carga','vh.cantidad_viajes','vh.volumen_transportado','emp.nombre as Empresa','ch.nombre as Conductor')
			->where('estado','=',1);

			 foreach ($vehiculos as $vehi){
        $data[] = array(
            "idVehiculo"=> $vehi->idVehiculo,
            "placa" => $vehi->placa,
            "last_name"=> $vehi->costo_acarreo,
            "address"=> $vehi->volumen_carga,
            "address1"=> $vehi->cantidad_viajes,
            "state"=> $vehi->volumen_transportado,
            "zipcode"=> $vehi->Empresa,
            "city"=> $vehi->conductor,
        );
      
      }

Excel::create ('Export Model',function($excel) use($data){
	$excel-> sheet('Sheet 1',function($sheet)  use($data){
		$sheet->fromArray($data);

	});
})->export('xls');

    }
}
