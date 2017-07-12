<?php

namespace Trazabilidad\Http\Controllers;

use Illuminate\Http\Request;
use Trazabilidad\Http\Requests;
use Trazabilidad\Obra;
use Illuminate\Support\Facades\Redirect;
use Trazabilidad\Http\Requests\ObraFormRequest;
use DB;

class ObraController extends Controller
{
public function __construct(){
		
		
	}
	public function index(Request $request){
		if ($request){
			$query=trim($request->get('searchText'));
			$obra=DB::table('obra')
			->select('nombreObra','Responsable','idObra','estadoObra')
			->where('estadoObra','=',1)
			->paginate(100);
			return view('traza.obra.index',["obra"=>$obra,"searchText"=>$query]);
		}
	}
	public function create(){
	
		return view("traza.obra.create");
		
	}
	public function store(ObraFormRequest $request){
		$obra= new Obra;
		$obra->nombreObra=$request->get('nombreObra');
		$obra->estadoObra=$request->get('estadoObra');
		$obra->Responsable=$request->get('Responsable');
		$obra->save();
		return Redirect::to('traza/obra');
		
	}
	
		
	}

	

