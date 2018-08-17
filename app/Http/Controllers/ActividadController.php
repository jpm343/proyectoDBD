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
    public function createOrEdit()
    {
        return view('actividads');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOrUpdate(Request $request)
    {
        $aux = Actividad::find($request->id_actividad);
        if($aux == null)
        {
            $actividad = new Actividad();
            $actividad->updateOrCreate([
                'puntuacion_actividad' => $request->puntuacion_actividad,
                'nombre_actividad' => $request->nombre_actividad,
                'descripcion_actividad' => $request->descripcion_actividad,
                'ciudad_actividad' => $request->ciudad_actividad,
                'pais_actividad' => $request->pais_actividad,
                'fechas_disponibles' => json_decode($request->fechas_disponibles)
            ],[]);
        }
        else
        {
            $actividad = new Actividad();
            $actividad->updateOrCreate([
                'id_actividad' => $request->id_actividad,
            ], [
                'puntuacion_actividad' => $request->puntuacion_actividad,
                'nombre_actividad' => $request->nombre_actividad,
                'descripcion_actividad' => $request->descripcion_actividad,
                'ciudad_actividad' => $request->ciudad_actividad,
                'pais_actividad' => $request->pais_actividad,
                'fechas_disponibles' => json_decode($request->fechas_disponibles)
            ]);
        }

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
