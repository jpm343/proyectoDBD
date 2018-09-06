<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actividad;
use Illuminate\Support\Facades\DB;

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
        return view('crear_actividad');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Actividad::create([
            'id_actividad' => $request->id_actividad,
            'puntuacion_actividad' => $request->puntuacion_actividad,
            'nombre_actividad' => $request->nombre_actividad,
            'descripcion_actividad' => $request->descripcion_actividad,
            'ciudad_actividad' => $request->ciudad_actividad,
            'pais_actividad' => $request->pais_actividad,
            'dias_disponibles' => json_decode($request->dias_disponibles),
            'hora_inicio' => $request->hora_inicio,
            'hora_fin' => $request->hora_fin,
        ]);
        return Actividad::all();
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

    public function edit($id)
    {
        $actividad = Actividad::find($id);
        return view('editar_actividad')->with('actividad', $actividad);
    }

    public function update(Request $request, $id)
    {
        Actividad::find($id)->update([
            'id_actividad' => $request->id_actividad,
            'puntuacion_actividad' => $request->puntuacion_actividad,
            'nombre_actividad' => $request->nombre_actividad,
            'descripcion_actividad' => $request->descripcion_actividad,
            'ciudad_actividad' => $request->ciudad_actividad,
            'pais_actividad' => $request->pais_actividad,
            'dias_disponibles' => json_decode($request->dias_disponibles),
            'hora_inicio' => $request->hora_inicio,
            'hora_fin' => $request->hora_fin,
        ]);
        return Actividad::all();
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

    public function buscarActividades(Request $request)
    {
        $query = $request->ciudad_destino;
        //se verifica igual
        if($query != ""){
            $actividades = Actividad::where('ciudad_actividad', 'like', "%".$query."%")
                                        ->orWhere('ciudad_actividad', 'like', "%".ucfirst($query)."%")
                                        ->get();

            if(count($actividades) > 0)
                return view('resultados_busqueda_actividades')->withDetails($actividades)->withQuery($query);
        }
        return view('resultados_busqueda_actividades')->withMessage("No se encontraron actividades en ".$query);
    }

    public function detalleActividades($id)
    {
        $actividad = Actividad::find($id);
        return view('actividades_detail')->withDetails($actividad);
    }
}
