<?php

namespace Trazabilidad\Http\Controllers;

use Illuminate\Http\Request;
use Trazabilidad\Http\Requests;
use Trazabilidad\Abscisa;
use Illuminate\Support\Facades\Redirect;
use
Trazabilidad\Http\Requests\AbscisaFormRequest;
use Illuminate\Support\Facades\DB;
class AbscisaController extends Controller
{
	public function __construct(){
		
		
	}
	public function index(Request $request){
		if ($request){
			$query=trim($request->get('searchText'));
			if ($query!='') {
				$abscisa3= DB::table('abscisas as abs')
				->join('vehiculo_transporte_material as vtm','vtm.id_abscisa_descargue','=','abs.idAbscisa')
				->leftJoin('vehiculo_transporte_material as vtmd','vtmd.id_abscisa_cargue','=',
					'abs.idAbscisa')
				->select('abs.idAbscisa','abs.nombre','abs.volumen_llenado_teorico','abs.volumen_excavado_teorico',DB::raw('sum(vtm.cantidadMaterial) as volumenLlenado'),DB::raw('sum(vtmd.cantidadMaterial) as volumenExcavado'),'abs.volumen_llenado_obra','abs.volumen_excavado_obra')
				->where('abs.idAbscisa','LIKE','%'.$query.'%')
				->where('abs.estadoAbscisa','=',1)
				->orderBy('abs.nombre','asc')
				->groupBy('abs.idAbscisa','abs.nombre','abs.volumen_llenado_teorico','abs.volumen_excavado_teorico','volumen_llenado_obra','volumen_excavado_obra') 
				->paginate(1000) ;
				$abscisa2= DB::table('abscisas as abs')
				->join('vehiculo_transporte_material as vtm','vtm.id_abscisa_descargue','=','abs.idAbscisa')
				->join('vehiculos_transporte as vht','vtm.idVehiculo','=','vht.idVehiculo')
				->join('materiales as mat','mat.idMaterial','=','vtm.idMaterial')
				->select('abs.nombre','vtm.fecha','vtm.numeroRecibo','vht.placa','vtm.cantidadMaterial','mat.nombre as matnombre')
				->where('abs.idAbscisa','LIKE','%'.$query.'%')
				->where('abs.estadoAbscisa','=',1)
				->orderBy('abs.nombre','asc')
				->groupBy('abs.nombre','vtm.fecha','vtm.numeroRecibo','vht.placa','vtm.cantidadMaterial','mat.nombre') 
				->paginate(1000);
				$abscisa1= DB::table('abscisas as abs')
				->join('vehiculo_transporte_material as vtm','vtm.id_abscisa_cargue','=','abs.idAbscisa')
				->join('vehiculos_transporte as vht','vtm.idVehiculo','=','vht.idVehiculo')
				->join('materiales as mat','mat.idMaterial','=','vtm.idMaterial')
				->select('abs.nombre','vtm.fecha','vtm.numeroRecibo','vht.placa','vtm.cantidadMaterial','mat.nombre as matnombre')
				->where('abs.idAbscisa','LIKE','%'.$query.'%')
				->where('abs.estadoAbscisa','=',1)
				->orderBy('abs.nombre','asc')
				->groupBy('abs.nombre','vtm.fecha','vtm.numeroRecibo','vht.placa','vtm.cantidadMaterial','mat.nombre') 
				->paginate(1000);
				return view('traza.abscisas.index2',["abscisa2"=>$abscisa2,"abscisa"=>$abscisa3,"abscisa1"=>$abscisa1,"searchText"=>$query]);
			}else{
				$abscisas= DB::table('abscisas as abs')
				->leftJoin('vehiculo_transporte_material as vtm','vtm.id_abscisa_descargue','=','abs.idAbscisa')
				->leftJoin('vehiculo_transporte_material as vtmd','vtmd.id_abscisa_cargue','=',
					'abs.idAbscisa')
				->select('abs.idAbscisa','abs.nombre','abs.volumen_llenado_teorico','abs.volumen_excavado_teorico',DB::raw('sum(vtm.cantidadMaterial) as volumenLlenado'),DB::raw('sum(vtmd.cantidadMaterial) as volumenExcavado'),'volumen_llenado_obra','volumen_excavado_obra')
				->where('abs.idAbscisa','LIKE','%'.$query.'%')
				->where('abs.estadoAbscisa','=',1)
				->orderBy('abs.nombre','asc')
				->groupBy('abs.idAbscisa','abs.nombre','abs.volumen_llenado_teorico','abs.volumen_excavado_teorico','volumen_excavado_obra','volumen_llenado_obra') 
				->paginate(1000);
				return view('traza.abscisas.index',["abscisa"=>$abscisas,"searchText"=>$query]);
			}
		}
	}
	public function create(){
		return view("traza.abscisas.create");
		
	}
	public function store(AbscisaFormRequest $request){
		$abscisa= new Abscisa;
		$abscisa->nombre=$request->get('nombre');
		$abscisa->descripcion=$request->get('descripcion');
		$abscisa->volumen_llenado_teorico=$request->get('volumen_llenado_teorico');
		$abscisa->volumen_excavado_teorico=$request->get('volumen_excavado_teorico');
		$abscisa->save();
		return Redirect::to('traza/abscisas');
		
	}
	public function update(AbscisaFormRequest $request,$id){
		$abscisa=Abscisa::findOrFail($id);
		$abscisa->nombre=$request->get('nombre');
		$abscisa->volumen_llenado_teorico=$request->get('volumen_llenado_teorico');
		$abscisa->volumen_excavado_teorico=$request->get('volumen_excavado_teorico');
		$abscisa->descripcion=$request->get('descripcion');
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


