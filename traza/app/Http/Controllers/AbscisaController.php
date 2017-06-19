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
				$num = (int)$query;
				$abscisa3= DB::select(DB::raw("SELECT
					abs.idAbscisa ,abs.nombre,abs.volumen_llenado_teorico,abs.volumen_excavado_teorico,abs.volumen_llenado_obra,abs.volumen_excavado_obra,
					CASE WHEN (SELECT COUNT(*) FROM vehiculo_transporte_material AS vtm WHERE vtm.id_abscisa_cargue=abs.idAbscisa)>0 THEN (SELECT SUM(vtm.cantidadMaterial) FROM vehiculo_transporte_material AS vtm WHERE vtm.id_abscisa_cargue=abs.idAbscisa) ELSE 0 END AS volumenExcavado,
					CASE WHEN (SELECT COUNT(*) FROM vehiculo_transporte_material AS vtm WHERE vtm.id_abscisa_descargue=abs.idAbscisa)>0 THEN (SELECT SUM(vtm.cantidadMaterial) FROM vehiculo_transporte_material AS vtm WHERE vtm.id_abscisa_descargue=abs.idAbscisa) ELSE 0 END AS volumenLlenado

					FROM abscisas AS abs  WHERE abs.idAbscisa=$num"));


				$material=DB::select(db::raw("SELECT vtm.fecha,vtm.id_abscisa_descargue as des,
					(SELECT SUM(vtm2.cantidadMaterial) FROM vehiculo_transporte_material vtm2
					WHERE vtm.id_abscisa_descargue=vtm2.id_abscisa_descargue AND vtm2.idMaterial=1) AS SubRasante,
					(SELECT SUM(vtm2.cantidadMaterial) FROM vehiculo_transporte_material vtm2
					WHERE vtm.id_abscisa_descargue=vtm2.id_abscisa_descargue AND vtm2.idMaterial=2) AS Base,
					(SELECT SUM(vtm2.cantidadMaterial) FROM vehiculo_transporte_material vtm2
					WHERE vtm.id_abscisa_descargue=vtm2.id_abscisa_descargue AND vtm2.idMaterial=3) AS Subbase,
					(SELECT SUM(vtm2.cantidadMaterial) FROM vehiculo_transporte_material vtm2
					WHERE vtm.id_abscisa_descargue=vtm2.id_abscisa_descargue AND vtm2.idMaterial=4) AS Filtrante,
					(SELECT SUM(vtm2.cantidadMaterial) FROM vehiculo_transporte_material vtm2
					WHERE vtm.id_abscisa_descargue=vtm2.id_abscisa_descargue AND vtm2.idMaterial=7) AS Pedraplen,
					(SELECT SUM(vtm2.cantidadMaterial) FROM vehiculo_transporte_material vtm2
					WHERE vtm.id_abscisa_descargue=vtm2.id_abscisa_descargue AND vtm2.idMaterial=5) AS Terraplen,
					(SELECT SUM(vtm2.cantidadMaterial) FROM vehiculo_transporte_material vtm2
					WHERE vtm.id_abscisa_descargue=vtm2.id_abscisa_descargue AND vtm2.idMaterial=6) AS MaterialComun
					FROM vehiculo_transporte_material vtm where vtm.id_abscisa_descargue=$num
					GROUP BY vtm.id_abscisa_descargue"));


				$material2=DB::select(db::raw("SELECT vtm.fecha,vtm.id_abscisa_cargue as des,
					(SELECT SUM(vtm2.cantidadMaterial) FROM vehiculo_transporte_material vtm2
					WHERE vtm.id_abscisa_cargue=vtm2.id_abscisa_cargue AND vtm2.idMaterial=6) AS MaterialComun
					From vehiculo_transporte_material vtm where vtm.id_abscisa_cargue=$num
					group by vtm.id_abscisa_cargue"));



				$collectionComun=Collection::make($material2);

				$variable =$collectionComun->first();
	
				$collection = Collection::make($material);
				/*Material Terraplen LLeno*/
				$materialTerraplen=DB::select(db::raw("SELECT vtm.fecha,vtm.id_abscisa_descargue as des,
					(SELECT SUM(vtm2.cantidadMaterial) FROM vehiculo_transporte_material vtm2
					WHERE vtm.id_abscisa_descargue=vtm2.id_abscisa_descargue AND vtm2.idMaterial=5) AS Terraplen
					FROM vehiculo_transporte_material vtm where vtm.id_abscisa_descargue=$num
					GROUP BY vtm.id_abscisa_descargue"));
				$collection1 = Collection::make($materialTerraplen);


				$materialComun=DB::select(db::raw("SELECT vtm.fecha,vtm.id_abscisa_cargue as des,
					(SELECT SUM(vtm2.cantidadMaterial) FROM vehiculo_transporte_material vtm2
					WHERE vtm.id_abscisa_cargue=vtm2.id_abscisa_cargue AND vtm2.idMaterial=6) AS Comun
					FROM vehiculo_transporte_material vtm where vtm.id_abscisa_cargue=$num
					GROUP BY vtm.id_abscisa_cargue"));
				$collection2 =Collection::make($materialComun);

				if(count($collection1)>0){
					
					$var1=$collection1[0]->Terraplen;
				}
				else{
					$var1=0.00;
				}
				


				if(count($collection2)>0){

					$var2=$collection2[0]->Comun;


				}
				else{
					$var2=0.00;
				}	



				$abscisa2= DB::table('abscisas as abs')
				->join('vehiculo_transporte_material as vtm','vtm.id_abscisa_descargue','=','abs.idAbscisa')
				->join('vehiculos_transporte as vht','vtm.idVehiculo','=','vht.idVehiculo')
				->join('materiales as mat','mat.idMaterial','=','vtm.idMaterial')
				->select('abs.nombre','vtm.fecha','vtm.numeroRecibo','vht.placa','vtm.cantidadMaterial','mat.nombre as matnombre')
				->where('abs.estadoAbscisa','=',1)
				->where('abs.idAbscisa','LIKE','%'.$query.'%')
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
				->orderBy('abs.nombre','asc')
				->groupBy('abs.nombre','vtm.fecha','vtm.numeroRecibo','vht.placa','vtm.cantidadMaterial','mat.nombre') 
				->paginate(1000);
				return view('traza.abscisas.index2',["abscisa2"=>$abscisa2,"abscisa"=>$abscisa3,"abscisa1"=>$abscisa1,"searchText"=>$query,"materialk"=>$material,"Terraplen"=>$var2,"Comun"=>$var1,"material2"=>$variable]);

			}else{
				$abscisas= DB::select(DB::raw("SELECT
					abs.idAbscisa ,abs.nombre,abs.volumen_llenado_teorico,abs.volumen_excavado_teorico,abs.volumen_llenado_obra,abs.volumen_excavado_obra,
					CASE WHEN (SELECT COUNT(*) FROM vehiculo_transporte_material AS vtm WHERE vtm.id_abscisa_cargue=abs.idAbscisa)>0 THEN (SELECT SUM(vtm.cantidadMaterial) FROM vehiculo_transporte_material AS vtm WHERE vtm.id_abscisa_cargue=abs.idAbscisa) ELSE 0 END AS volumenLlenado,
					CASE WHEN (SELECT COUNT(*) FROM vehiculo_transporte_material AS vtm WHERE vtm.id_abscisa_descargue=abs.idAbscisa)>0 THEN (SELECT SUM(vtm.cantidadMaterial) FROM vehiculo_transporte_material AS vtm WHERE vtm.id_abscisa_descargue=abs.idAbscisa) ELSE 0 END AS volumenExcavado

					FROM abscisas AS abs  WHERE abs.estadoAbscisa=1 order by abs.nombre"));


				/*dd($abscisas);
				var_dump($abscisas);*/
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
		$abscisa->volumen_llenado_obra=$request->get('volumen_llenado_obra');
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
		$abscisa->volumen_llenado_obra=$request->get('volumen_llenado_obra');
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


