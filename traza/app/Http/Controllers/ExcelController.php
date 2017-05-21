<?php

namespace Trazabilidad\Http\Controllers;

use Illuminate\Http\Request;
use Trazabilidad\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Trazabilidad\Vehiculo;
use Illuminate\Contracts\Support\Arrayable;
use DB;
use Excel;
class ExcelController extends Controller
{
  public function getExport(){
     $choferes=DB::table('choferes')
     ->leftJoin('vehiculos_transporte as vt','choferes.idChofer','=','vt.Choferes_idChofer')
     ->select('nombre','cedula','telefono','direccion','vt.placa as placa')
     ->where('estadoChofer','=',1)->get();
    // Initialize the array which will be passed into the Excel
    // generator.
     $paymentsArray=[];
     $paymentsArray[] = ['nombre', 'cedula','telefono','direccion','Vehiculo que conduce'];
     foreach ($choferes as $cho) {

      $paymentsArray[]= (array)$cho;
  }
  Excel::create('Trazabilidad obra lineal', function($excel) use($paymentsArray) {
    $excel->sheet('sheet2', function($sheet) use($paymentsArray) {
        $sheet->fromArray($paymentsArray);
    });

})->export('xls');
}

public function getExportNominaVehiculos(){
   $vehiculos=DB::table('vehiculos_transporte as vt')
        ->join('vehiculo_transporte_material as vtm','vt.idVehiculo','=','vtm.idVehiculo')
        ->join('choferes as cho','cho.idChofer','=','vt.Choferes_idChofer')
        ->select('vtm.fecha','vt.placa','cho.nombre','vt.costo_acarreo','vt.cantidad_viajes',DB::raw('vt.cantidad_viajes*vt.costo_acarreo as total'))
        ->where('vt.estado','=',1)
        ->groupBy('vt.idVehiculo')
        ->orderBy('vt.placa','asc')->get();
    // Initialize the array which will be passed into the Excel
    // generator.
     $paymentsArray=[];
     $paymentsArray[] = ['fecha','placa','conductor','costo acarreo',' cantidad_viajes','Total pago'];
     foreach ($vehiculos as $vehi) {

      $paymentsArray[]= (array)$vehi;
  }
  Excel::create('Trazabilidad obra lineal', function($excel) use($paymentsArray) {
    $excel->sheet('sheet', function($sheet) use($paymentsArray) {
        $sheet->fromArray($paymentsArray,null);
    });

})->export('xls');




}

}