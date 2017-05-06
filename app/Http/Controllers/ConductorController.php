<?php

namespace Trazabilidad\Http\Controllers;

use Illuminate\Http\Request;
use Trazabilidad\Http\Requests;
use Trazabilidad\Conductor;
use Illuminate\Support\Facades\Redirect;
use Trazabilidad\Http\Requests\ConductorFormRequest;
use DB;

class ConductorController extends Controller
{
public function __construct(){
		
		
	}
	public function index(Request $request){
		if ($request){
			$query=trim($request->get('searchText'));
			$choferes=DB::table('choferes')
			->leftJoin('vehiculos_transporte as vt','choferes.idChofer','=','vt.Choferes_idChofer')
			->select('nombre','cedula','telefono','direccion','idChofer','vt.placa as placa')
			->where('estadoChofer','=',1)
		
			->paginate(100);
			return view('traza.choferes.index',["choferes"=>$choferes,"searchText"=>$query]);
		}
	}
	public function create(){
	
		return view("traza.choferes.create");
		
	}
	public function store(ConductorFormRequest $request){
		$chofer= new Conductor;
		$chofer->nombre=$request->get('nombre');
		$chofer->cedula=$request->get('cedula');
		$chofer->telefono=$request->get('telefono');
		$chofer->direccion=$request->get('direccion');
		$chofer->save();
		return Redirect::to('traza/choferes');
		
	}
	public function update(ConductorFormRequest $request,$id){
		$chofer=Conductor::findOrFail($id);
		$chofer->nombre=$request->get('nombre');
		$chofer->cedula=$request->get('cedula');
		$chofer->telefono=$request->get('telefono');
		$chofer->direccion=$request->get('direccion');
		$chofer->estado=$request->get('estado');
			$chofer->update();
		return Redirect::to('traza/choferes');
		
		
	}public function destroy($id){
		$chofer=Conductor::findOrFail($id);
		$chofer->estadoChofer=0;
		$chofer->update();
		return Redirect::to('traza/choferes');
		
	}
	public function show($id){
		return view("traza.choferes.show",["chofer"=>Conductor::findOrFail($id)]);
		
	}

	public function edit($id){
		return view('traza.choferes.edit',["chofer"=>Conductor::findOrFail($id)]);

		
	}
	

    }
