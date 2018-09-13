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

Auth::routes();

Route::get('/', function () {
    return redirect('/alojamientos');
});

function return_view($view) {
    return function () use ($view) {
        return view($view);
    };
}

Route::get('/carrito', return_view('carrito'));
Route::get('/alojamientos', return_view('welcome'));
Route::get('/actividades', return_view('actividades'));
Route::get('/autos', return_view('autos'));
Route::get('/traslados', return_view('Traslado_view.traslado-index'));
Route::get('/paquetes', return_view('paquetes'));






Route::resource('Usuarios', 'UsuarioController');
Route::get('/usuarios', 'UsuarioController@createOrEdit');
Route::post('/usuarios_post', 'UsuarioController@storeOrUpdate')->name('formulario_usuario');


Route::resource('Rols','RolController');
Route::get('/rols', 'RolController@createOrEdit');
Route::post('/rols_post', 'RolController@storeOtyree05@example.comrUpdate')->name('formulario_rol');

Route::resource('RegistroConsultas','Registro_consultaController');
Route::get('/registroConsultas', 'Registro_consultaController@createOrEdit');
Route::post('/registroConsultas_post', 'Registro_consultaController@storeOrUpdate')->name('formulario_registroConsulta');

//*********Rutas para Vuelo***********//
Route::resource('vuelo', 'VueloController');
Route::get('/vuelos', 'VueloController@createOrEdit');
Route::post('/vuelos_post', 'VueloController@storeOrUpdate')->name('formulario_vuelo');
Route::get('/vuelos_buscar','VueloController@buscarVuelos');
Route::get('/reserva_vuelo/{id}/{mayores}/{menores}','VueloController@reserva');

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
Route::get('/actividads/{id_actividad}/edit', 'ActividadController@edit');
Route::post('/actividads/{id}','ActividadController@update');
Route::post('/actividads_post', 'ActividadController@storeOrUpdate')->name('formulario_actividad');
Route::get('/actividades_search', 'ActividadController@buscarActividades');
Route::get('/actividades_details/{id}', 'ActividadController@detalleActividades');
Route::get('/actividades_details/{id}/compra', 'ActividadController@agregarReservaActividad');

//*********Rutas para Registro*******//
Route::resource('registro', 'RegistroController');
Route::get('/registros', 'RegistroController@createOrEdit');
Route::post('/registros_post', 'RegistroController@storeOrUpdate')->name('formulario_registro');

////*********Rutas para Fondo*******//
Route::resource('fondo', 'FondoController');
Route::get('/fondos', 'FondoController@createOrEdit');
Route::post('/fondos_post', 'FondoController@storeOrUpdate')->name('formulario_fondo');

// rutas para crear/editar autos
Route::get('/autos/create', 'AutoController@create');
Route::get('/autos/{patente_auto}/edit', 'AutoController@edit');

// rutas para los traslados
Route::get('/Traslado_search/','TrasladoController@TrasladoIndexQuery')->name('Traslado_opciones');
Route::get('/Traslado_reserva/{id}', 'TrasladoController@agregarReservaTraslado')->name('Traslado_reserva');

////************Stored Procedure******//
Route::get('/prueba/{id1}/{id2}', 'AsientoController@disponibilidad');

//********* Rutas para Hotel
Route::resource('Hotel','HotelController');

//********* Rutas para reservas
Route::get('/detalleReserva','ProfileController@callDetailReserva')->name('detalle_reserva');
Route::resource('Traslado','TrasladoController');
Route::post('/alojamientos_search', 'HotelController@buscarAlojamientos');

Route::resource('Habitacion','HabitacionController');
Route::resource('Traslado','TrasladoController');
Route::get('/alojamientos_detail', function (){
	return view('alojamientos_detail');
});
Route::get('/alojamientos_detail/{id}', 'HotelController@detalleAlojamiento');

Route::post('/buscar_paquetes', 'PaqueteController@buscarPaquetesPaso1');
Route::post('/buscar_paquetes/paso_2', 'PaqueteController@buscarPaquetesPaso2');
Route::post('/buscar_autos', 'AutoController@search');
Route::post('/reservar_autos', 'AutoController@reservar');

Route::get('/perfil', 'ProfileController@showUserProfile')->name('mostrar_perfil');
//***********Ruta para fondos de usuario************//
Route::get('/perfil_fondos/', 'ProfileController@showUserFondos');
Route::get('/perfil_fondos_details/{id}', 'ProfileController@showDetailUserFondo');
Route::post('/perfil_fondos/{id}', 'FondoController@agregarFondos');
Route::get('/perfil_fondos_form', 'FondoController@metodoDePagoForm');
Route::post('/perfil_fondos_anadir', 'FondoController@anadirMetodoDePago');

//***********Rutas relacionadas a la compra*********//
Route::get('/carro_remover/{id}', 'CarroController@eliminarDelCarro');
Route::get('/pagar_orden', 'CarroController@pagar');
Route::get('/verificar_pago/{monto}/cuenta/{id}', 'RegistroController@verificarPago');