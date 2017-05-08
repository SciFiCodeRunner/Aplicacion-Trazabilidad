<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\BrowserKitTestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CrearTransporteTest extends BrowserKitTestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->visit('traza/choferes/create')
    	->type('Cristian Soto','nombre')
    	->type('106837633','cedula')
    	->type('7475534','telefono')
    	->type('yulima 3 etapa','direccion')
    	->press('guardar')
    	->seePageIs('traza/choferes')
    	->see('106837633');
    }
    }
