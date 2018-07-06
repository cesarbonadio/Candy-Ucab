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

/*ruta que lleva a la vista usuario*/
Route::get('/', function () {
    return view('/usuario/index/index');
});

/*ruta que lleva a los reportes a nivel administrativo*/
Route::get('/reporte', function(){
    return view('/reporte/index');
});


/*Para los reportes*/
Route::get('reporte/top10punto','ReportesController@top_cliente_punto');
Route::get('reporte/asistencia','ReportesController@asistencia_empleados');
Route::get('reporte/empleado','ReportesController@empleados');
Route::get('reporte/ingrediente','ReportesController@ingrediente_productos');
Route::get('reporte/tarjeta','ReportesController@tarjeta_credito');
Route::get('reporte/factura','ReportesController@factura');
Route::get('reporte/metodo','ReportesController@metodo');//nuevo
Route::get('reporte/productoGeneral','ReportesController@productoGeneral');//nuevo
Route::get('reporte/productoPorTienda','ReportesController@productoPorTienda');//nuevo
Route::get('reporte/top5Clientes','ReportesController@top5Clientes');//nuevo
Route::get('reporte/tienda_ingresos_egresos','ReportesController@tienda_ingresos_egresos');
Route::get('reporte/top_producto_tienda','ReportesController@top_producto_tienda');
Route::get('reporte/top_retraso_estatus','ReportesController@top_retraso_estatus');
Route::get('reporte/balance_puntos_tienda_lugar','ReportesController@balance_puntos_tienda_lugar');
Route::get('reporte/tienda_pago_puntos','ReportesController@tienda_pago_puntos');
Route::get('reporte/ranking_producto_tienda_lugar','ReportesController@ranking_producto_tienda_lugar');
Route::get('reporte/top10compra','ReportesController@top_cliente_compra');



/*Para el aplicativo como tal*/
Route::resource('administrar/producto','ProductoController');
Route::resource('administrar/tienda','TiendaController');

/*para las reposiciones de la fabrica (todavia no las hace automaticamente)*/
Route::resource('inventario/reposicion','ReposicionController');
Route::resource('inventario/alerta','AlertaController');


Route::get('cliente/pedido/{codigo}/pagar_punto','PedidoController@pagar_punto');
Route::resource('cliente/pedido','PedidoController');


Route::resource('cliente/natural','NaturalController');
Route::resource('cliente/juridico','JuridicoController');
Route::resource('usuario/index','uProductoController');
Route::resource('usuario/registroJ','uJuridicoController');
Route::resource('usuario/registroN','uNaturalController');
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

Route::get('nomina/asistencia','AsistenciaController@getimport')->name('asistencia.list');
Route::post('postimport','AsistenciaController@postimport')->name('asistencia.import');

Route::resource('usuario/diario','uDiarioController');
Route::get('usuario/producto','uProductoController@productoIndex');

Route::resource('usuario/iniciar','uUsuarioController');//nuevo
Route::get('usuario/cerrar','uUsuarioController@indexCerrar');//nuevo
Route::resource('promocion/diario','DiarioController');//nuevo
Route::resource('promocion/diario_descuento','Diario_DescuentoController');//nuevo
Route::resource('gestion/privilegio','PrivilegioController');//nuevo
Route::resource('gestion/rol','RolController');//nuevo
Route::resource('gestion/rolprivilegio','RolPrivilegioController');//nuevo
