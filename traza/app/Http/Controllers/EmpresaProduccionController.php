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
class EmpresaProduccionController extends Controller
{
	public function __construct(){
		
		
	}
	public function index(Request $request){
		if ($request){
			$query=trim($request->get('searchText'));
			if ($query!='') {
				$num = (int)$query;

				$abscisa1=DB::table('vehiculo_transporte_material as vh')
			    ->join('abscisas as abs','abs.idAbscisa','=','vh.id_abscisa_cargue')
			    ->join('abscisas as abs2','abs2.idAbscisa','=','vh.id_abscisa_descargue')
				->join('vehiculos_transporte as vht','vh.idVehiculo','=','vht.idVehiculo')
				->join('empresas as emp','vht.idEmpresa','=','emp.idEmpresa')
				->join('materiales as mat','mat.idMaterial','=','vh.idMaterial')
				->select('vh.fecha','abs.nombre as cargue','vh.fecha','vh.numeroRecibo','vht.placa','vh.cantidadMaterial','mat.nombre as matnombre','emp.nombre as empnombre','abs2.nombre as descargue','vht.costo_acarreo','vht.cantidad_viajes')
				->where('emp.estadoEmpresa','=',1)
				->where('emp.idEmpresa','=',$num)
				->orderBy('vh.fecha','asc')
				->paginate(1000);



				return view('traza.empresaProduccion.index2',["abscisa1"=>$abscisa1,"searchText"=>$query]);

			}else{
				$query=trim($request->get('searchText'));

					$empresa= DB::table('abscisas as abs')
				->join('vehiculo_transporte_material as vtm','vtm.id_abscisa_cargue','=','abs.idAbscisa')
				->join('vehiculos_transporte as vht','vtm.idVehiculo','=','vht.idVehiculo')
				->join('empresas as emp','vht.idEmpresa','=','emp.idEmpresa')
				->join('materiales as mat','mat.idMaterial','=','vtm.idMaterial')
				->select('emp.nombre','emp.direccion','emp.estadoEmpresa','emp.idEmpresa',db::raw(' count(*) as contador'),db::raw('sum(vht.costo_acarreo) AS preciomat'),db::raw('sum(vtm.cantidadMaterial)as totalMaterial'))
				->where('emp.estadoEmpresa','=',1)
				->groupBy('emp.idEmpresa') 
				->paginate(1000);

		

				return view('traza.empresaProduccion.index',["empresa"=>$empresa,"searchText"=>$query]);








			}


		}
	}



}


