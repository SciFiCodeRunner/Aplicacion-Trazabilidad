<?php

namespace Trazabilidad\Http\Controllers;

use Illuminate\Http\Request;
use Trazabilidad\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Trazabilidad\VehiculoTransporte;

use Trazabilidad\Abscisa;

use
Trazabilidad\Http\Requests\AbscisaFormRequest;
use Illuminate\Support\Collection as Collection;
use
Trazabilidad\Http\Requests\VehiculoTransporteFormRequest;
use DB;
use Carbon\Carbon;
class CanteraController extends Controller
{
	public function __construct(){
		
		
	}
	public function index(Request $request){
		if ($request){
			$query=trim($request->get('searchText'));
			if ($query!='') {
				$num = (int)$query;


				$material=DB::select(db::raw("SELECT vtm.fecha,
					(SELECT count(*) FROM vehiculo_transporte_material vtm2
					WHERE vtm.id_abscisa_cargue=vtm2.id_abscisa_cargue AND vtm2.idMaterial=1) AS SubRasante,
					(SELECT count(*) FROM vehiculo_transporte_material vtm2
					WHERE vtm.id_abscisa_cargue=vtm2.id_abscisa_cargue AND vtm2.idMaterial=2) AS Base,
					(SELECT count(*) FROM vehiculo_transporte_material vtm2
					WHERE vtm.id_abscisa_cargue=vtm2.id_abscisa_cargue AND vtm2.idMaterial=3) AS Subbase,
					(SELECT count(*) FROM vehiculo_transporte_material vtm2
					WHERE vtm.id_abscisa_cargue=vtm2.id_abscisa_cargue AND vtm2.idMaterial=4) AS Filtrante,
					(SELECT count(*) FROM vehiculo_transporte_material vtm2
					WHERE vtm.id_abscisa_cargue=vtm2.id_abscisa_cargue AND vtm2.idMaterial=7) AS Pedraplen,
					(SELECT count(*) FROM vehiculo_transporte_material vtm2
					WHERE vtm.id_abscisa_cargue=vtm2.id_abscisa_cargue AND vtm2.idMaterial=5) AS Terraplen,
					(SELECT count(*) FROM vehiculo_transporte_material vtm2
					WHERE vtm.id_abscisa_cargue=vtm2.id_abscisa_cargue AND vtm2.idMaterial=6) AS MaterialComun
					FROM vehiculo_transporte_material vtm WHERE vtm.id_abscisa_cargue=$num 
					GROUP BY vtm.id_abscisa_cargue"));

				$collection = Collection::make($material);

				$abscisa1= DB::table('abscisas as abs')
				->join('vehiculo_transporte_material as vtm','vtm.id_abscisa_cargue','=','abs.idAbscisa')
				->join('vehiculos_transporte as vht','vtm.idVehiculo','=','vht.idVehiculo')
				->join('materiales as mat','mat.idMaterial','=','vtm.idMaterial')
				->select('abs.nombre','vtm.fecha','vtm.numeroRecibo','vht.placa','vtm.cantidadMaterial','mat.nombre as matnombre','mat.precio')
				->where('abs.estadoAbscisa','=',3)
				->where('abs.idAbscisa','=',$query)
					->orwhere('abs.nombre','like',$query)
				->orderBy('abs.nombre','asc')
				->groupBy('abs.nombre','vtm.fecha','vtm.numeroRecibo','vht.placa','vtm.cantidadMaterial','mat.nombre') 
				->paginate(1000);

				$abscisa2= DB::table('abscisas as abs')
				->join('vehiculo_transporte_material as vtm','vtm.id_abscisa_descargue','=','abs.idAbscisa')
				->join('vehiculos_transporte as vht','vtm.idVehiculo','=','vht.idVehiculo')
				->join('materiales as mat','mat.idMaterial','=','vtm.idMaterial')
				->select('abs.nombre','vtm.fecha','vtm.numeroRecibo','vht.placa','vtm.cantidadMaterial','mat.nombre as matnombre','mat.precio')
				->where('abs.estadoAbscisa','=',3)
				->where('abs.idAbscisa','=',$query)
						->orwhere('abs.nombre','like',$query)
				->orderBy('abs.nombre','asc')
				->groupBy('abs.nombre','vtm.fecha','vtm.numeroRecibo','vht.placa','vtm.cantidadMaterial','mat.nombre') 
				->paginate(1000);

				
				return view('traza.canteras.index2',["abscisa1"=>$abscisa1,"searchText"=>$query,"materialk"=>$material,"abscisa2"=>$abscisa2]);

			}else{
				$query=trim($request->get('searchText'));



				$cantera= DB::table('vehiculo_transporte_material as vtm')
				->join('abscisas as abs','vtm.id_abscisa_cargue','=','abs.idAbscisa')
				->join('materiales as mat','mat.idMaterial','=','vtm.idMaterial')
				->select('abs.nombre','vtm.fecha','vtm.numeroRecibo','vtm.cantidadMaterial','mat.nombre as matnombre','abs.estadoAbscisa','abs.descripcion','abs.idAbscisa',db::raw(' count(*) as contador'),db::raw('sum(vtm.cantidadMaterial*mat.precio) AS preciomat'),db::raw('sum(vtm.cantidadMaterial)as cantmaterial'))

				->where('abs.estadoAbscisa','=',3)
				->where('abs.nombre','LIKE','%'.$query.'%')
				->groupby('abs.nombre')->get();
			

				return view('traza.canteras.index',["cantera"=>$cantera,"searchText"=>$query]);








			}


		}
	}



}


