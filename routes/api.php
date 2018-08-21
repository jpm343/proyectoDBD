<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// CRUD Autos
Route::get('/autos', 'AutoController@index');
Route::post('/autos', 'AutoController@store');
Route::get('/autos/{patente_auto}', 'AutoController@show');
Route::put('/autos/{patente_auto}', 'AutoController@update');
Route::delete('/autos/{patente_auto}', 'AutoController@destroy');

// CRUD CompaniaAutos
Route::get('/compania_autos', 'CompaniaAutoController@index');
Route::post('/compania_autos', 'CompaniaAutoController@store');
Route::get('/compania_autos/{nombre_compania}', 'CompaniaAutoController@show');
Route::put('/compania_autos/{nombre_compania}', 'CompaniaAutoController@update');
Route::delete('/compania_autos/{nombre_compania}', 'CompaniaAutoController@destroy');

//fondos
Route::resource('fondo', 'FondoController');
Route::resource('actividad', 'ActividadController');
