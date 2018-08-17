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


Route::resource('Usuarios', 'UsuarioController');
Route::get('/usuarios', 'UsuarioController@createOrEdit');
Route::post('/usuarios_post', 'UsuarioController@storeOrUpdate')->name('formulario_usuario');

Route::resource('Rols','RolController');
Route::get('/rols', 'RolController@createOrEdit');
Route::post('/rols_post', 'RolController@storeOrUpdate')->name('formulario_rol');


Route::resource('RegistroConsultas','Registro_consultaController');
Route::get('/registroConsultas', 'Registro_consultaController@createOrEdit');
Route::post('/registroConsultas_post', 'Registro_consultaController@storeOrUpdate')->name('formulario_registroConsulta');

//*********Rutas para Vuelo***********//
Route::resource('vuelo', 'VueloController');
Route::get('/vuelos', 'VueloController@createOrEdit');
Route::post('/vuelos_post', 'VueloController@storeOrUpdate')->name('formulario_vuelo');
//*********Rutas para Aerolinea*******//
Route::resource('aerolinea', 'AerolineaController');
Route::get('/aerolineas', 'AerolineaController@createOrEdit');
Route::post('/aerolineas_post', 'AerolineaController@storeOrUpdate')->name('formulario_aerolinea');
////*********Rutas para Asiento*******//
Route::resource('asiento', 'AsientoController');
Route::get('/asientos', 'AsientoController@createOrEdit');
Route::post('/asiento_post', 'AsientoController@storeOrUpdate')->name('formulario_asiento');


//*********Rutas para Actividad***********//
Route::resource('actividad', 'ActividadController');
Route::get('/actividads', 'ActividadController@createOrEdit');
Route::post('/actividads_post', 'ActividadController@storeOrUpdate')->name('formulario_actividad');
//*********Rutas para Registro*******//
Route::resource('registro', 'RegistroController');
Route::get('/registros', 'RegistroController@createOrEdit');
Route::post('/registros_post', 'RegistroController@storeOrUpdate')->name('formulario_registro');
////*********Rutas para Fondo*******//
Route::resource('fondo', 'FondoController');
Route::get('/fondos', 'FondoController@createOrEdit');
Route::post('/fondos_post', 'FondoController@storeOrUpdate')->name('formulario_fondo');

////************Stored Procedure******//
Route::get('/prueba/{id1}/{id2}', 'AsientoController@disponibilidad');