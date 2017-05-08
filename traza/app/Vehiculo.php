<?php

namespace Trazabilidad;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
	protected $table='vehiculos_transporte';
	
	protected $primaryKey="idVehiculo";
	
	public $timestamps=false;
	
	
	protected $fillable=[
	'placa',
	'costo_acarreo',
	'cantidad_viajes',
	'volumen_transportado',
	'volumen_carga',
	];
    //
}
