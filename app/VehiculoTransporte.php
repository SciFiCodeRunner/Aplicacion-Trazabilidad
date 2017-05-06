<?php

namespace Trazabilidad;

use Illuminate\Database\Eloquent\Model;

class VehiculoTransporte extends Model
{
    	protected $table='vehiculo_transporte_material';
	
	protected $primaryKey="numeroRecibo";
	
	public $timestamps=false;
	
	
	protected $fillable=[
	'fecha',
	'numeroRecibo',
	'observaciones',
	'idVehiculo',
	'idMaterial',
	'id_abcisa_cargue',
	'id_abcisa_descargue',
	'cantidadMaterial'
	];
    //
}
