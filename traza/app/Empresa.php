<?php

namespace Trazabilidad;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //protected $table='choferes';
	protected $primaryKey="idEmpresa";
	
	public $timestamps=false;
	
	
	protected $fillable=[
	'nombre',
	'direccion'
	];
}
