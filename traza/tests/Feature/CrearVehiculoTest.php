<?php

namespace Tests\Feature;

use Tests\BrowserKitTestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Illuminate\Support\Facades\Response;
use Laracasts\Integrated\Extensions\Laravel;
class CrearVehiculoTest extends BrowserKitTestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {

    	$this->visit('traza/vehiculos/create')
    	->type('yyy789','placa')
    	->type('60','costo_acarreo')
    	->type('90.7','volumen_carga')
    	->type('2','cantidad_viajes')
    	->type('34','volumen_transportado')
    	->press('guardar')
    	->seePageIs('traza/vehiculos')
    	->see('yyy789');
    }
}
