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
class VehiculoTransporteController extends Controller
{
	public function __construct(){
		
		
	}
	public function index(Request $request){
		if ($request){
			$query=trim($request->get('searchText'));
			$vehiculos=DB::table('vehiculo_transporte_material as vh')
			->join('vehiculos_transporte as vt','vh.idVehiculo','=','vt.idVehiculo')
			->join('materiales as mat','vh.idMaterial','=','mat.idMaterial')
			->join('abscisas as abs','abs.idAbscisa','=','vh.id_abscisa_cargue')
			->join('abscisas as abs2','abs2.idAbscisa','=','vh.id_abscisa_descargue')
			->select('vt.placa as placa','vh.fecha','vh.numeroRecibo','vh.observaciones','mat.nombre as material','abs.nombre as abscargue','abs2.nombre as absdescargue','vh.cantidadMaterial')
			->where('vh.numeroRecibo','LIKE','%'.$query.'%')

			->paginate(1000000);
			return view('traza.vehiculosTransporte.index',["vehiculos"=>$vehiculos,"searchText"=>$query]);
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
		$categorias = $request->input("idVehiculo");
		DB::update("update vehiculos_transporte SET cantidad_viajes=cantidad_viajes+1 where idVehiculo=$categorias");
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
