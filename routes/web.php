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

/*
Route::get('Habitacion','HabitacionController@index');
Route::get('Habitacion','HabitacionController@create');
Route::post('Habitacion','HabitacionController@store');
Route::get('Habitacion/{id}','HabitacionController@show');
Route::get('Habitacion/edit/{id}','HabitacionController@edit');
Route::post('Habitacion/{id}','HabitacionController@update');
Route::post('Habitacion/destroy/{id}','HabitacionController@destroy');
*/
Route::resource('Habitacion','HabitacionController');
Route::resource('Hotel','HotelController');
Route::resource('Traslado','TrasladoController');
