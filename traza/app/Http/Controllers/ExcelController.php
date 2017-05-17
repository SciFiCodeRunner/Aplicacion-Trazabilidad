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
}