<?php

namespace Trazabilidad;

use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    protected $table='obra';
	protected $primaryKey="idObra";
	
	public $timestamps=false;
	
	
	protected $fillable=[
	'nombreObra',
	'Responsable',
	'idObra',
	'estadoObra'
	];
}
