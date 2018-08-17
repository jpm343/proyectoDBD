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