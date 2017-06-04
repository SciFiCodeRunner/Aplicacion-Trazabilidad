<?php

namespace Trazabilidad\Http\Controllers;

use Illuminate\Http\Request;
use Trazabilidad\Http\Requests;
use Trazabilidad\Abscisa;
use Illuminate\Support\Facades\Redirect;
use
Trazabilidad\Http\Requests\AbscisaFormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection as Collection;
class AbscisaController extends Controller
{
	public function __construct(){
		
		
	}
	public function index(Request $request){
		if ($request){
			$query=trim($request->get('searchText'));
			if ($query!='') {
				$abscisa3= DB::select(DB::raw("SELECT
					abs.idAbscisa ,abs.nombre,abs.volumen_llenado_teorico,abs.volumen_excavado_teorico,abs.volumen_llenado_obra,abs.volumen_excavado_obra,
					CASE WHEN (SELECT COUNT(*) FROM vehiculo_transporte_material AS vtm WHERE vtm.id_abscisa_cargue=abs.idAbscisa)>0 THEN (SELECT SUM(vtm.cantidadMaterial) FROM vehiculo_transporte_material AS vtm WHERE vtm.id_abscisa_cargue=abs.idAbscisa) ELSE 0 END AS volumenExcavado,
					CASE WHEN (SELECT COUNT(*) FROM vehiculo_transporte_material AS vtm WHERE vtm.id_abscisa_descargue=abs.idAbscisa)>0 THEN (SELECT SUM(vtm.cantidadMaterial) FROM vehiculo_transporte_material AS vtm WHERE vtm.id_abscisa_descargue=abs.idAbscisa) ELSE 0 END AS volumenLlenado

					FROM abscisas AS abs  WHERE abs.idAbscisa LIKE '%$query%' or abs.nombre LIKE '%$query%' "));


				$abscisa2= DB::table('abscisas as abs')
				->join('vehiculo_transporte_material as vtm','vtm.id_abscisa_descargue','=','abs.idAbscisa')
				->join('vehiculos_transporte as vht','vtm.idVehiculo','=','vht.idVehiculo')
				->join('materiales as mat','mat.idMaterial','=','vtm.idMaterial')
				->select('abs.nombre','vtm.fecha','vtm.numeroRecibo','vht.placa','vtm.cantidadMaterial','mat.nombre as matnombre')
				->where('abs.estadoAbscisa','=',1)
				->where('abs.idAbscisa','LIKE','%'.$query.'%')
				->orwhere('abs.nombre','LIKE','%'.$query.'%')
				->orderBy('abs.nombre','asc')
				->groupBy('abs.nombre','vtm.fecha','vtm.numeroRecibo','vht.placa','vtm.cantidadMaterial','mat.nombre') 
				->paginate(1000);
				$abscisa1= DB::table('abscisas as abs')
				->join('vehiculo_transporte_material as vtm','vtm.id_abscisa_cargue','=','abs.idAbscisa')
				->join('vehiculos_transporte as vht','vtm.idVehiculo','=','vht.idVehiculo')
				->join('materiales as mat','mat.idMaterial','=','vtm.idMaterial')
				->select('abs.nombre','vtm.fecha','vtm.numeroRecibo','vht.placa','vtm.cantidadMaterial','mat.nombre as matnombre')
				->where('abs.estadoAbscisa','=',1)
				->where('abs.idAbscisa','LIKE','%'.$query.'%')
				->orwhere('abs.nombre','LIKE','%'.$query.'%')
				->orderBy('abs.nombre','asc')
				->groupBy('abs.nombre','vtm.fecha','vtm.numeroRecibo','vht.placa','vtm.cantidadMaterial','mat.nombre') 
				->paginate(1000);
				return view('traza.abscisas.index2',["abscisa2"=>$abscisa2,"abscisa"=>$abscisa3,"abscisa1"=>$abscisa1,"searchText"=>$query]);
			}else{
				$abscisas= DB::select(DB::raw("SELECT
					abs.idAbscisa ,abs.nombre,abs.volumen_llenado_teorico,abs.volumen_excavado_teorico,abs.volumen_llenado_obra,abs.volumen_excavado_obra,
					CASE WHEN (SELECT COUNT(*) FROM vehiculo_transporte_material AS vtm WHERE vtm.id_abscisa_cargue=abs.idAbscisa)>0 THEN (SELECT SUM(vtm.cantidadMaterial) FROM vehiculo_transporte_material AS vtm WHERE vtm.id_abscisa_cargue=abs.idAbscisa) ELSE 0 END AS volumenLlenado,
					CASE WHEN (SELECT COUNT(*) FROM vehiculo_transporte_material AS vtm WHERE vtm.id_abscisa_descargue=abs.idAbscisa)>0 THEN (SELECT SUM(vtm.cantidadMaterial) FROM vehiculo_transporte_material AS vtm WHERE vtm.id_abscisa_descargue=abs.idAbscisa) ELSE 0 END AS volumenExcavado

					FROM abscisas AS abs  WHERE abs.idAbscisa LIKE '%$query%' and abs.estadoAbscisa=1"));


				
				return view('traza.abscisas.index',["abscisa"=>$abscisas,"searchText"=>$query]);
			}
		}
	}
	public function create(){
	
	
		return view("traza.abscisas.create");
		
	}
	public function createCantera(){
	
	
		return view("traza.abscisas.createCantera");
		
	}
	public function store(AbscisaFormRequest $request){
		$abscisa= new Abscisa;
		$abscisa->nombre=$request->get('nombre');
		$abscisa->descripcion=$request->get('descripcion');
		$abscisa->volumen_llenado_teorico=$request->get('volumen_llenado_teorico');
		$abscisa->volumen_excavado_teorico=$request->get('volumen_excavado_teorico');
		$abscisa->volumen_excavado_obra=$request->get('volumen_excavado_obra');
		$abscisa->volumen_llenado_obra=$request->get('volumen_excavado_teorico');
		$abscisa->coef_real_llenado=$request->get('coef_real_llenado');
		$abscisa->coef_real_excavado=$request->get('coef_real_excavado');
		$abscisa->estadoAbscisa=$request->get('estadoAbscisa');


		$abscisa->save();
		return Redirect::to('traza/abscisas');
		
	}
	public function update(AbscisaFormRequest $request,$id){
		$abscisa=Abscisa::findOrFail($id);
		$abscisa->nombre=$request->get('nombre');
		$abscisa->descripcion=$request->get('descripcion');
		$abscisa->volumen_llenado_teorico=$request->get('volumen_llenado_teorico');
		$abscisa->volumen_excavado_teorico=$request->get('volumen_excavado_teorico');
		$abscisa->volumen_excavado_obra=$request->get('volumen_excavado_obra');
		$abscisa->volumen_llenado_obra=$request->get('volumen_excavado_teorico');
		$abscisa->coef_real_llenado=$request->get('coef_real_llenado');
		$abscisa->coef_real_excavado=$request->get('coef_real_excavado');
		$abscisa->estadoAbscisa=$request->get('estadoAbscisa');

		$abscisa->update();
		return Redirect::to('traza/abscisas');
		
		
	}public function destroy($id){
		$abscisa=Abscisa::findOrFail($id);
		$abscisa->estadoAbscisa= 0;
		$abscisa->update();
		return Redirect::to('traza/abscisas');
		
	}
	public function show($id){
		return view("traza.abscisas.show",["abscisas"=>Abscisa::findOrFail($id)]);
		
	}

	public function edit($id){
		return view('traza.abscisas.edit',["abscisa"=>Abscisa::findOrFail($id)]);

		
	}
	

}


