<?php

namespace Trazabilidad\Http\Controllers;

use Illuminate\Http\Request;
use Trazabilidad\Http\Requests;
use Trazabilidad\Material;
use Illuminate\Support\Facades\Redirect;
use Trazabilidad\Http\Requests\MaterialFormRequest;
use DB;
class MaterialController extends Controller
{
  public function __construct(){
		
		
	}
	public function index(Request $request){
		if ($request){
			$query=trim($request->get('searchText'));
			$materiales=DB::table('materiales')
			->select('nombre','descripcion','compactacion','precio','idMaterial')
		->where('nombre','LIKE','%'.$query.'%')
			->paginate(100);
			return view('traza.materiales.index',["materiales"=>$materiales,"searchText"=>$query]);
		}
	}
	public function create(){
	
		return view("traza.materiales.create");
		
	}

	public function store(MaterialFormRequest $request){
		$material= new Material;
		$material->nombre=$request->get('nombre');
		$material->descripcion=$request->get('descripcion');
		$material->compactacion=$request->get('compactacion');
		$material->precio=$request->get('precio');
		$material->save();
		return Redirect::to('traza/materiales');
		
	}
	public function update(MaterialFormRequest $request,$id){
		$material=Material::findOrFail($id);
		$material->nombre=$request->get('nombre');
		$material->descripcion=$request->get('descripcion');
		$material->compactacion=$request->get('compactacion');
		$material->precio=$request->get('precio');
			$material->update();
		return Redirect::to('traza/materiales');
		
		
	}public function destroy($id){
		$material=Material::findOrFail($id);
		$chofer->update();
		return Redirect::to('traza/materiales');
		
	}
	public function show($id){
		return view("traza.materiales.show",["material"=>Material::findOrFail($id)]);
		
	}

	public function edit($id){
		return view('traza.materiales.edit',["material"=>Material::findOrFail($id)]);

		
	}
}
