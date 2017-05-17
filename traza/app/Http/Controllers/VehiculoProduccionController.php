<?php

namespace Trazabilidad\Http\Controllers;

use Illuminate\Http\Request;
use Trazabilidad\Http\Requests;
use Trazabilidad\VehiculoTransporte;
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
			->select('vt.idVehiculo','vt.placa','vtm.fecha','vtm.observaciones','vtm.cantidadMaterial','vt.costo_acarreo','vt.cantidad_viajes','vt.volumen_transportado','cho.nombre as nombre',DB::raw('sum(vtm.cantidadMaterial) as VolumenTransportado'))
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
		$materiales=DB::table('materiales')->get();
		$choferes=DB::table('choferes')->get();
		$abscisa=DB::table('abscisas')->get();
		$vehiculo=DB::table('vehiculos_transporte')->get();
		return view("traza.vehiculosTransporte.create",["chofer"=>$choferes,"vehiculos"=>$vehiculo,"materiales"=>$materiales,"abscisas"=>$abscisa]);
		
	}
	public function store(VehiculoTransporteFormRequest $request){
		$vehiculo= new VehiculoTransporte;


		$date = Carbon::now('America/Bogota');

		$date->format('d-m-Y');
		$vehiculo->fecha=$date->toDateTimeString();
		$vehiculo->numeroRecibo=$request->get('numeroRecibo');
		$vehiculo->observaciones=$request->get('observaciones');
		$vehiculo->idVehiculo=$request->get('idVehiculo');
		$vehiculo->idMaterial=$request->get('idMaterial');
		$vehiculo->id_abscisa_cargue=$request->get('id_abscisa_cargue');
		$vehiculo->id_abscisa_descargue=$request->get('id_abscisa_descargue');
		$vehiculo->cantidadMaterial=$request->get('cantidadMaterial');
		$vehiculo->save();
		return Redirect::to('traza/vehiculosTransporte');
		
	}
	public function update(VehiculoTransporteFormRequest $request,$id){
		$vehiculo=VehiculoTransporte::findOrFail($id);
		$date = Carbon::now();
		$vehiculo->fecha=$date->toDateTimeString();
		$vehiculo->numeroRecibo=$request->get('numeroRecibo');
		$vehiculo->observaciones=$request->get('observaciones');
		$vehiculo->idVehiculo=$request->get('idVehiculo');
		$vehiculo->idMaterial=$request->get('idMaterial');
		$vehiculo->id_abscisa_cargue=$request->get('id_abscisa_cargue');
		$vehiculo->id_abscisa_descargue=$request->get('id_abscisa_descargue');
		$vehiculo->cantidadMaterial=$request->get('cantidadMaterial');
		$vehiculo->update();
		return Redirect::to('traza/vehiculosTransporte');
		
		
	}public function destroy($id){
		$vehiculo=VehiculoTransporte::findOrFail($id);
		$vehiculo->update();
		return Redirect::to('traza/vehiculosTransporte');
		
	}
	public function show($id){
		return view("traza.vehiculosTransporte.show",["vehiculo"=>Vehiculo::findOrFail($id)]);
		
	}

	public function edit($id){
		$materiales=DB::table('materiales')->get();
		$empresas= DB::table('empresas')->get();
		$abscisa=DB::table('abscisas')->get();
		$vehiculos=DB::table('vehiculos_transporte')->get();
		return view('traza.vehiculosTransporte.edit',["materiales"=>$materiales,"abscisas"=>$abscisa,"vehiculo"=>VehiculoTransporte::findOrFail($id),"vehiculos"=>$vehiculos]);

		
	}
	

}
