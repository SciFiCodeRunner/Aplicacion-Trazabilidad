<?php

namespace Trazabilidad\Http\Controllers;

use Illuminate\Http\Request;
use Trazabilidad\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use
Trazabilidad\Http\Requests\VehiculoTransporteFormRequest;
use DB;
use Carbon\Carbon;
class VehiculoProduccionController extends Controller
{
	public function __construct(){
		
		
	}
	public function index(Request $request){
		if ($request){
			$query=trim($request->get('searchText'));
			$vehiculos=DB::table('vehiculos_transporte as vt')
			->distinct()
			->join('vehiculo_transporte_material as vtm','vt.idVehiculo','=','vtm.idVehiculo')
			->join('choferes as cho','cho.idChofer','=','vt.Choferes_idChofer')
			->select('vt.idVehiculo','vt.placa','vtm.fecha','vtm.observaciones','vtm.cantidadMaterial','vt.costo_acarreo','vt.cantidad_viajes','vt.volumen_transportado','cho.nombre as nombre',DB::raw('sum(vt.cantidad_viajes)*costo_acarreo as total'))
				->where('vt.idVehiculo','LIKE','%'.$query.'%')
			->where('vt.estado','=',1)
			->orderBy('vt.idVehiculo','asc')
			->groupBy('vt.idVehiculo')
			->orderBy('vt.placa','asc')
			->paginate(10000);
			return view('traza.listas.iindex',["vehiculos"=>$vehiculos,"searchText"=>$query]);
		}
	}
	public function create(){

	}
	public function store(VehiculoTransporteFormRequest $request){
		
	}
	public function update(VehiculoTransporteFormRequest $request,$id){
		
		
		
	}public function destroy($id){
	
	}
	public function show($id){
		return view("traza.vehiculosTransporte.show",["vehiculo"=>Vehiculo::findOrFail($id)]);
		
	}

	public function edit($id){
		
		
	}
	

}
