<?php

namespace Trazabilidad\Http\Controllers;

use Illuminate\Http\Request;
use Trazabilidad\Http\Requests;
use Trazabilidad\Vehiculo;
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
			->join('empresas as emp','vh.Empresa_idEmpresa','=','emp.idEmpresa')
			->select('vh.idVehiculo','vh.placa','vh.costo_acarreo','vh.volumen_transportado','emp.nombre as Empresa','ch.nombre as Conductor')
			->where('estado','=',1)
			->where('vh.placa','LIKE','%'.$query.'%')

			->paginate(100);
			return view('traza.vehiculos.index',["vehiculos"=>$vehiculos,"searchText"=>$query]);
		}
	}
	public function create(){
		$empresas= DB::table('empresas')->get();
		$choferes=DB::table('choferes')->get();
		return view("traza.vehiculos.create",["empresa"=>$empresas],["chofer"=>$choferes]);
		
	}
	public function store(VehiculoFormRequest $request){
		$vehiculo= new Vehiculo;
		$vehiculo->placa=$request->get('placa');
		$vehiculo->costo_acarreo=$request->get('costo_acarreo');
		$vehiculo->volumen_carga=$request->get('volumen_carga');
		$vehiculo->cantidad_viajes=$request->get('cantidad_viajes');
		$vehiculo->volumen_transportado=$request->get('volumen_transportado');
		$vehiculo->Choferes_idChofer=$request->get('Choferes_idChofer');
		$vehiculo->Empresa_idEmpresa=$request->get('Empresa_idEmpresa');
		$vehiculo->save();
		return Redirect::to('traza/vehiculos');
		
	}
	public function update(VehiculoFormRequest $request,$id){
		$vehiculo=Vehiculo::findOrFail($id);
		$vehiculo->placa=$request->get('placa');
		$vehiculo->costo_acarreo=$request->get('costo_acarreo');
		$vehiculo->volumen_carga=$request->get('volumen_carga');
		$vehiculo->cantidad_viajes=$request->get('cantidad_viajes');
		$vehiculo->volumen_transportado=$request->get('volumen_transportado');
		$vehiculo->Choferes_idChofer=$request->get('Choferes_idChofer');
		$vehiculo->Empresa_idEmpresa=$request->get('Empresa_idEmpresa');
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
		$empresas2= DB::table('empresas')->get();
		$choferes2=DB::table('choferes')->get();
		return view('traza.vehiculos.edit',["empresa"=>$empresas2,"chofer"=>$choferes2,"vehiculo"=>Vehiculo::findOrFail($id)]);

		
	}
	

}
