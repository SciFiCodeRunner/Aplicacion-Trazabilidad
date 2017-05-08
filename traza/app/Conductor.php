<?php

namespace Trazabilidad;

use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
	

	protected $table='choferes';
	protected $primaryKey="idChofer";
	
	public $timestamps=false;
	
	
	protected $fillable=[
	'nombre',
	'cedula',
	'telefono',
	'direccion'
	];
    //
}
