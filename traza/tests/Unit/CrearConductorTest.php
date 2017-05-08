<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\BrowserKitTestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CrearConductorTest extends BrowserKitTestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->visit('traza/choferes/create')
    	->type('Soto','nombre')
    	->type('106833','cedula')
    	->type('747534','telefono')
    	->type('yulma 3 etapa','direccion')
    	->press('guardar')
    	->seePageIs('traza/choferes')
    	->see('106837633');
    }
    }
