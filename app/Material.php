<?php

namespace Trazabilidad;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table='materiales';
	protected $primaryKey="idMaterial";
	
	public $timestamps=false;
	
	
	protected $fillable=[
	'nombre',
	'descripcion',
	'compactacion',
	'cantidadStock',
	'precio'
	];
}
