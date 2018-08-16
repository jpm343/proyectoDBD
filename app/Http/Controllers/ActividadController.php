<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actividad;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$actividad = Actividad::All();
    	return $actividad;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$actividad = new Actividad();
    	$actividad->puntuacion_actividad= $request->puntuacion_actividad;
    	$actividad->descripcion_actividad = $request->descripcion_actividad;
    	$actividad->ciudad_actividad= $request->ciudad_actividad;
    	$actividad->pais_actividad= $request->pais_actividad;
    	$actividad->fechas_disponibles= $request->fechas_disponibles;
    	$actividad->save();

    	$todos = Actividad::All();
    	return $todos;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aerolinea  $aerolinea
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$actividad = Actividad::find($id);
    	return $actividad;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aerolinea  $aerolinea
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aerolinea  $aerolinea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$actividad = Actividad::find($id);
    	$actividad->puntuacion_actividad= $request->puntuacion_actividad;
    	$actividad->descripcion_actividad = $request->descripcion_actividad;
    	$actividad->ciudad_actividad= $request->ciudad_actividad;
    	$actividad->pais_actividad= $request->pais_actividad;
    	$actividad->fechas_disponibles= $request->fechas_disponibles;
    	$actividad->save();

    	return $actividad;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aerolinea  $aerolinea
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$actividad = Actividad::find($id);
    	$actividad->delete();

    	return Actividad::all();
    }
}
