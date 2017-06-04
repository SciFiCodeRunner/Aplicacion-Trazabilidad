<?php

namespace Trazabilidad\Http\Controllers;

use Illuminate\Http\Request;
use Trazabilidad\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Collection as Collection;
use Trazabilidad\Vehiculo;
use Illuminate\Contracts\Support\Arrayable;
use DB;
use Excel;
class ExcelController extends Controller
{
  public function getExport(){
     $choferes=DB::table('choferes')
     ->leftJoin('vehiculos_transporte as vt','choferes.idChofer','=','vt.Choferes_idChofer')
     ->select('nombre','cedula','telefono','direccion','vt.placa')
     ->where('estadoChofer','=',1)->get();
    // Initialize the array which will be passed into the Excel
    // generator.
     $paymentsArray=[];
     $paymentsArray[] = ['nombre', 'cedula','telefono','direccion','Vehiculo'];
     foreach ($choferes as $cho) {

      $paymentsArray[]= (array)$cho;
  }
  Excel::create('Trazabilidad obra lineal', function($excel) use($paymentsArray) {
    $excel->sheet('conductores', function($sheet) use($paymentsArray) {
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
  Excel::create(' Trazabilidad Vehiculos', function($excel) use($paymentsArray) {
    $excel->sheet('sheet', function($sheet) use($paymentsArray) {
        $sheet->fromArray($paymentsArray,null);
    });

})->export('xls');




}
public function getExportNominaMateriales(){
      $material=DB::select(db::raw("SELECT vtm.fecha,
(SELECT SUM(vtm2.cantidadMaterial) FROM vehiculo_transporte_material vtm2
WHERE vtm.fecha=vtm2.fecha AND vtm2.idMaterial=1) AS SubRasante,
(SELECT SUM(vtm2.cantidadMaterial) FROM vehiculo_transporte_material vtm2
WHERE vtm.fecha=vtm2.fecha AND vtm2.idMaterial=2) AS base,
(SELECT SUM(vtm2.cantidadMaterial) FROM vehiculo_transporte_material vtm2
WHERE vtm.fecha=vtm2.fecha AND vtm2.idMaterial=3) AS Subbase,
(SELECT SUM(vtm2.cantidadMaterial) FROM vehiculo_transporte_material vtm2
WHERE vtm.fecha=vtm2.fecha AND vtm2.idMaterial=4) AS filtrante,
(SELECT SUM(vtm2.cantidadMaterial) FROM vehiculo_transporte_material vtm2
WHERE vtm.fecha=vtm2.fecha AND vtm2.idMaterial=5) AS terraplen,
(SELECT SUM(vtm2.cantidadMaterial) FROM vehiculo_transporte_material vtm2
WHERE vtm.fecha=vtm2.fecha AND vtm2.idMaterial=6) AS materialComun,
(SELECT SUM(vtm2.cantidadMaterial) FROM vehiculo_transporte_material vtm2
WHERE vtm.fecha=vtm2.fecha AND vtm2.idMaterial=7) AS pedraplen
FROM vehiculo_transporte_material vtm
GROUP BY vtm.fecha"));

$collection = Collection::make($material);
    // Initialize the array which will be passed into the Excel
    // generator.
     $paymentsArray=[];
     $paymentsArray[] = ['fecha','subRasante','base','subBase','filtrante','terraplen','materialComun','pedraplen'];
     foreach ($collection as $mat) {

      $paymentsArray[]= (array)$mat;
  }
  Excel::create('Trazabilidad Materiales', function($excel) use($paymentsArray) {
    $excel->sheet('sheet', function($sheet) use($paymentsArray) {
        $sheet->fromArray($paymentsArray,null);
    });

})->export('xls');




}public function getExportNominaCanteras(){
  $cantera= DB::table('vehiculo_transporte_material as vtm')
        ->join('abscisas as abs','vtm.id_abscisa_cargue','=','abs.idAbscisa')
        ->join('materiales as mat','mat.idMaterial','=','vtm.idMaterial')
        ->select('vtm.fecha','abs.nombre','mat.nombre as matnombre','vtm.cantidadMaterial')


        ->where('abs.estadoAbscisa','=',3)
        ->orderBy('abs.nombre','asc')->get();



          $paymentsArray=[];
     $paymentsArray[] = ['Fecha','nombre Cantera','Material','cantidad Material'];
     foreach ($cantera as $mat) {

      $paymentsArray[]= (array)$mat;
  }
  Excel::create('Trazabilidad Canteras', function($excel) use($paymentsArray) {
    $excel->sheet('sheet', function($sheet) use($paymentsArray) {
        $sheet->fromArray($paymentsArray,null);
    });

})->export('xls');
}

}