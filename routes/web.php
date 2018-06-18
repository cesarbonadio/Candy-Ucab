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

Route::resource('administrar/producto','ProductoController');
Route::resource('administrar/tienda','TiendaController');
Route::resource('administrar/punto','PuntoController');
Route::resource('cliente/natural','NaturalController');
Route::resource('cliente/juridico','JuridicoController');
Route::resource('cliente/contacto','ContactoController');

Route::get('cliente/medio/createNatural','MedioController@createNatural');
Route::get('cliente/medio/createJuridico','MedioController@createJuridico');
Route::resource('cliente/medio','MedioController');

Route::resource('promocion/descuento','DescuentoController');

Route::get('cliente/presupuesto/createNatural','PresupuestoController@createNatural');
Route::get('cliente/presupuesto/createJuridico','PresupuestoController@createJuridico');
Route::resource('cliente/presupuesto','PresupuestoController');
