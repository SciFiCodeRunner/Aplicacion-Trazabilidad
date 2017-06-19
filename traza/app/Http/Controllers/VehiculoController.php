<?php

namespace Trazabilidad\Http\Controllers;

use Illuminate\Http\Request;
use Trazabilidad\Http\Requests;
use Trazabilidad\Vehiculo;
use Trazabilidad\Empresa;
use Trazabilidad\Conductor;
use Illuminate\Support\Facades\Redirect;
use
Trazabilidad\Http\Requests\VehiculoFormRequest;
use DB;
class VehiculoController extends Controller
{
	public function __construct(){
		
		
	}
	public function index(Request $request){
		if ($request){
			$query=trim($request->get('searchText'));
			$vehiculos=DB::table('vehiculos_transporte as vh')
			->join('choferes as ch','vh.Choferes_idChofer','=','ch.idChofer')
			->join('empresas as emp','vh.idEmpresa','=','emp.idEmpresa')
			->select('vh.idVehiculo','vh.placa','vh.costo_acarreo','emp.nombre as Empresa','ch.nombre as Conductor','vh.volumen_carga')
			->where('estado','=',1)
			->where('vh.placa','LIKE','%'.$query.'%')

			->paginate(100);
			return view('traza.vehiculos.index',["vehiculos"=>$vehiculos,"searchText"=>$query]);
		}
	}
	public function create(){
		$empresas= DB::table('empresas')
		->where('estadoEmpresa','=',1)->get();
		$choferes=DB::table('choferes')
		->where('estadoChofer','=',1)
		->get();
		return view("traza.vehiculos.create",["empresa"=>$empresas],["chofer"=>$choferes]);
		
	}
	public function store(VehiculoFormRequest $request){
		$vehiculo= new Vehiculo;
		$vehiculo->placa=$request->get('placa');
		$vehiculo->costo_acarreo=$request->get('costo_acarreo');
		$vehiculo->volumen_carga=$request->get('volumen_carga');
		$vehiculo->cantidad_viajes=$request->get('cantidad_viajes');
	
		$vehiculo->Choferes_idChofer=$request->get('Choferes_idChofer');
		$vehiculo->idEmpresa=$request->get('idEmpresa');
		$vehiculo->save();
		return Redirect::to('traza/vehiculos');
		
	}
	public function update(VehiculoFormRequest $request,$id){
		$vehiculo=Vehiculo::findOrFail($id);
		$vehiculo->placa=$request->get('placa');
		$vehiculo->costo_acarreo=$request->get('costo_acarreo');
		$vehiculo->volumen_carga=$request->get('volumen_carga');
		$vehiculo->cantidad_viajes=$request->get('cantidad_viajes');
			$vehiculo->Choferes_idChofer=$request->get('Choferes_idChofer');
		$vehiculo->idEmpresa=$request->get('idEmpresa');
		$vehiculo->update();
		return Redirect::to('traza/vehiculos');
		
		
	}public function destroy($id){
		$vehiculo=Vehiculo::findOrFail($id);
		$vehiculo->estado= 0;
		$vehiculo->update();
		return Redirect::to('traza/vehiculos');
		
	}
	public function show($id){
		return view("traza.vehiculos.show",["vehiculo"=>Vehiculo::findOrFail($id)]);
		
	}

	public function edit($id){

		$consulta=Vehiculo::findOrFail($id);

		$consulta2=Empresa::findOrFail($consulta->idEmpresa);
		$consulta3=Conductor::findOrFail($consulta->Choferes_idChofer);
		$empresas2= DB::table('empresas')
		->where('estadoEmpresa','=',1)
		->get();
		$choferes2=DB::table('choferes')
		->where('estadoChofer','=',1)
		->get();
		return view('traza.vehiculos.edit',["empresas2"=>$empresas2,"choferes2"=>$choferes2,"vehiculo"=>Vehiculo::findOrFail($id),"consulta2"=>$consulta2,"consulta3"=>$consulta3]);

		
	}
	

}
