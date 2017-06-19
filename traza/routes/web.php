<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
	
	
});
Route::resource('traza/vehiculos','VehiculoController');
Route::resource('traza/choferes','ConductorController');
Route:: resource('traza/abscisas','AbscisaController');
Route:: resource('traza/vehiculosTransporte','VehiculoTransporteController');
Route::resource('traza/materiales','MaterialController');
Route::resource('traza/materialProduccion','MaterialProduccionController');
Route::resource('traza/empresas','EmpresaController');
Route::get('vehiculos/create','VehiculoController@create');
Route::resource('traza/listas','VehiculoProduccionController');
Route::resource('traza/empresaProduccion','EmpresaProduccionController');
Route::resource('traza/canteras','CanteraController');
Route:: get('/getExport','ExcelController@getExport');
Route:: get('/getExportNominaVehiculos','ExcelController@getExportNominaVehiculos');
Route:: get('/getExportNominaMateriales','ExcelController@getExportNominaMateriales');
Route:: get('/getExportNominaCanteras','ExcelController@getExportNominaCanteras');
Route:: get('/getExportNominaEmpresas','ExcelController@getExportNominaEmpresas');
Route:: get('/createCantera','AbscisaController@createCantera');
