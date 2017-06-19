<?php

namespace Trazabilidad\Http\Controllers;

use Illuminate\Http\Request;
use Trazabilidad\Http\Requests;
use Trazabilidad\VehiculoTransporte;
use Trazabilidad\Material;
use Trazabilidad\Vehiculo;
use Trazabilidad\Abscisa;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Collection as Collection;
use Trazabilidad\Http\Requests\MaterialFormRequest;
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
			->select('vt.placa as placa','vh.fecha','numeroRecibo','vh.observaciones','mat.nombre as material','abs.nombre as abscargue','abs2.nombre as absdescargue','vh.cantidadMaterial','estadoTrans')
			->where('vh.numeroRecibo','LIKE','%'.$query.'%')
	        ->where('vh.estadoTrans','=',1)
	        ->orderBy('vh.fecha','asc')
			->paginate(1000000);
			return view('traza.vehiculosTransporte.index',["vehiculos"=>$vehiculos,"searchText"=>$query]);
		}
	}
	public function create(){
		$materiales=DB::table('materiales')->get();
		$choferes=DB::table('choferes')->where('estadoChofer','=',1)->get();
		$abscisa=DB::table('abscisas')->where('estadoAbscisa','=',1)->orwhere('estadoAbscisa','=',3)->orderBy('nombre','asc')->get();
		$vehiculo=DB::table('vehiculos_transporte')->where('estado','=',1)->get();
		return view("traza.vehiculosTransporte.create",["chofer"=>$choferes,"vehiculos"=>$vehiculo,"materiales"=>$materiales,"abscisas"=>$abscisa]);
		
	}
	public function store(VehiculoTransporteFormRequest $request){

		$vehiculo= new VehiculoTransporte;
		$vehiculo->fecha=$request->get('fecha');
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
			DB::update("update vehiculos_transporte SET cantidad_viajes=cantidad_viajes-1 where idVehiculo=$vehiculo->idVehiculo");
         $vehiculo->delete();
		return Redirect::to('traza/vehiculosTransporte');
		
	}
	public function show($id){
		return view("traza.vehiculosTransporte.show",["vehiculo"=>Vehiculo::findOrFail($id)]);
		
	}

	public function edit($id){
$vehiculoTransMaterial=VehiculoTransporte::findOrFail($id);
/*var_dump($vehiculoTransMaterial);
 dd($vehiculoTransMaterial);*/
 $abscisaDescargue=Abscisa::findOrFail($vehiculoTransMaterial->id_abscisa_descargue);
 $abscisaCargue=Abscisa::findOrFail($vehiculoTransMaterial->id_abscisa_cargue);
$material=Material::findOrFail($vehiculoTransMaterial->idMaterial);
$vehiculo=Vehiculo::findOrFail($vehiculoTransMaterial->idVehiculo);
/*var_dump($vehiculo);
 dd($vehiculo);*/
		$materiales=DB::table('materiales')->get();
		$empresas= DB::table('empresas')->get();
		$abscisa=DB::table('abscisas')->get();

		$vehiculos=DB::table('vehiculos_transporte')->get();

		return view('traza.vehiculosTransporte.edit',["materiales"=>$materiales,"abscisas"=>$abscisa,"vehiculo"=>VehiculoTransporte::findOrFail($id),"vehiculos"=>$vehiculos,"material"=>$material,"vehiculoCombo"=>$vehiculo,"abscargue"=>$abscisaCargue,"absdescargue"=>$abscisaDescargue,"id"=>$id]);

		
	}
	

}
