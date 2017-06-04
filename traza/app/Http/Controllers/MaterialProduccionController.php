<?php

namespace Trazabilidad\Http\Controllers;

use Illuminate\Http\Request;
use Trazabilidad\Http\Requests;
use Illuminate\Support\Collection as Collection;
use Illuminate\Support\Facades\Redirect;
use
Trazabilidad\Http\Requests\VehiculoTransporteFormRequest;
use DB;
use Carbon\Carbon;
class MaterialProduccionController extends Controller
{
	public function __construct(){
		
		
	}
	public function index(Request $request){
		if ($request){
			$query=trim($request->get('searchText'));
			
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
WHERE vtm.fecha=vtm2.fecha AND vtm2.idMaterial=7) AS pedraplen,
(SELECT SUM(vtm2.cantidadMaterial) FROM vehiculo_transporte_material vtm2
WHERE vtm.fecha=vtm2.fecha AND vtm2.idMaterial=5) AS terraplen,
(SELECT SUM(vtm2.cantidadMaterial) FROM vehiculo_transporte_material vtm2
WHERE vtm.fecha=vtm2.fecha AND vtm2.idMaterial=6) AS materialComun,
(SELECT SUM(vtm2.cantidadMaterial) FROM vehiculo_transporte_material vtm2
WHERE vtm.fecha=vtm2.fecha AND vtm2.idMaterial=7) AS pedraplen
FROM vehiculo_transporte_material vtm
GROUP BY vtm.fecha"));

$collection = Collection::make($material);

			return view('traza.materiales.indexProduccion',["materialk"=>$material,"searchText"=>$query]);

		}
	}
		public function mostrar(){
	
		return view("traza.listas.index");
		
	}



}
