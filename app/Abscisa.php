<?php

namespace Trazabilidad;

use Illuminate\Database\Eloquent\Model;

class Abscisa extends Model
{
    protected $table='abscisas';
	
	protected $primaryKey="idAbscisa";
	
	public $timestamps=false;
	
	
	protected $fillable=[
	'nombre',
	'volumen_llenado_teorico',
	'volumen_excavado_teorico',
	'descripcion'
	];
}
