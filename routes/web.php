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

//*********Rutas para Vuelo***********//

Route::resource('vuelo', 'VueloController');

Route::get('/vuelos', 'VueloController@create');

Route::post('/vuelos_post', 'VueloController@store')->name('formulario_vuelo');

//*********Rutas para Aerolinea*******//

Route::resource('aerolinea', 'AerolineaController');

Route::get('/aerolineas', 'AerolineaController@createOrEdit');

Route::post('/aerolineas_post', 'AerolineaController@storeOrUpdate')->name('formulario_aerolinea');

////*********Rutas para Asiento*******//

Route::resource('asiento', 'AsientoController');

Route::get('/asientos', 'AsientoController@create');

Route::post('/asiento_post', 'AsientoController@store')->name('formulario_asiento');
