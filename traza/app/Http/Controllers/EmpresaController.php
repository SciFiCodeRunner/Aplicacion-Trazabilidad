<?php

namespace Trazabilidad\Http\Controllers;

use Illuminate\Http\Request;
use Trazabilidad\Http\Requests;
use Trazabilidad\Empresa;
use Illuminate\Support\Facades\Redirect;
use Trazabilidad\Http\Requests\EmpresaFormRequest;
use DB;

class EmpresaController extends Controller
{
public function __construct(){
		
		
	}
	public function index(Request $request){
		if ($request){
			$query=trim($request->get('searchText'));
			$empresas=DB::table('empresas')
			->select('nombre','direccion','idEmpresa')
			->where('estadoEmpresa','=',1)
			->where('nombre','LIKE','%'.$query.'%')
			->paginate(100);
			return view('traza.empresas.index',["empresas"=>$empresas,"searchText"=>$query]);
		}
	}
	public function create(){
	
		return view("traza.empresas.create");
		
	}
	public function store(EmpresaFormRequest $request){
		$empresas= new Empresa;
		$empresas->nombre=$request->get('nombre');
			$empresas->direccion=$request->get('direccion');
		$empresas->save();
		return Redirect::to('traza/empresas');
		
	}
	public function update(EmpresaFormRequest $request,$id){
		$empresas=Empresa::findOrFail($id);
		$empresas->nombre=$request->get('nombre');
		$empresas->direccion=$request->get('direccion');
			$empresas->update();
		return Redirect::to('traza/empresas');
		
		
	}public function destroy($id){
		$empresas=Empresa::findOrFail($id);
		$empresas->estadoEmpresa=0;
		$empresas->update();
		return Redirect::to('traza/empresas');
		
	}
	public function show($id){
		return view("traza.empresas.show",["empresas"=>Empresa::findOrFail($id)]);
		
	}

	public function edit($id){
		return view('traza.empresas.edit',["empresas"=>Empresa::findOrFail($id)]);

		
	}
	

    }
