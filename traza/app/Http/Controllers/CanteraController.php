<?php

namespace Trazabilidad\Http\Controllers;

use Illuminate\Http\Request;
use Trazabilidad\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use
Trazabilidad\Http\Requests\VehiculoTransporteFormRequest;
use DB;
use Carbon\Carbon;
class CanteraController extends Controller
{
	public function __construct(){
		
		
	}
	public function index(Request $request){
		if ($request){

			$query=trim($request->get('searchText'));
				$cantera= DB::table('vehiculo_transporte_material as vtm')
				->join('abscisas as abs','vtm.id_abscisa_cargue','=','abs.idAbscisa')
				->join('materiales as mat','mat.idMaterial','=','vtm.idMaterial')
				->select('abs.nombre','vtm.fecha','vtm.numeroRecibo','vtm.cantidadMaterial','mat.nombre as matnombre','abs.estadoAbscisa')

				->where('abs.estadoAbscisa','=',3)
				->where('abs.nombre','LIKE','%'.$query.'%')
				->paginate(1000);

				return view('traza.canteras.index',["cantera"=>$cantera,"searchText"=>$query]);

			}
		}

		
		
	}


