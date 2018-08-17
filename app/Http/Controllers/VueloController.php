<?php

namespace App\Http\Controllers;

use App\Vuelo;
use Illuminate\Http\Request;

class VueloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vuelos = Vuelo::all();
        return $vuelos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createOrEdit()
    {
        return view('vuelos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOrUpdate(Request $request)
    {
        $aux = Vuelo::find($request->id_vuelo);
        if($aux == null){
            $vuelo = new Vuelo();
            $vuelo->updateOrCreate([
                'fecha_salida' => $request->fecha_salida,
                'fecha_llegada' => $request->fecha_llegada,
                'ciudad_origen' => $request->ciudad_origen,
                'ciudad_destino' => $request->ciudad_destino,
                'aeropuerto_origen' => $request->aeropuerto_origen,
                'aeropuerto_destino' => $request->aeropuerto_destino,
                'pais_origen' => $request->pais_origen,
                'pais_destino' => $request->pais_destino,
                'nombre_aerolinea' => $request->nombre_aerolinea
            ], []);
        }
        else{
            $vuelo = new Vuelo();
            $vuelo->updateOrCreate([
                'id_vuelo' => $request->id_vuelo,
            ], [
                'fecha_salida' => $request->fecha_salida,
                'fecha_llegada' => $request->fecha_llegada,
                'ciudad_origen' => $request->ciudad_origen,
                'ciudad_destino' => $request->ciudad_destino,
                'aeropuerto_origen' => $request->aeropuerto_origen,
                'aeropuerto_destino' => $request->aeropuerto_destino,
                'pais_origen' => $request->pais_origen,
                'pais_destino' => $request->pais_destino,
                'nombre_aerolinea' => $request->nombre_aerolinea
            ]);
        }
        $todos = Vuelo::all();
        return $todos;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vuelo  $vuelo
     * @return \Illuminate\Http\Response
     */
    public function show(Vuelo $vuelo)
    {
        $vueloSolicitado = Vuelo::find($vuelo->vuelo_id);
        return $vueloSolicitado;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vuelo  $vuelo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vuelo $vuelo)
    {
        $vueloADestruir = Vuelo::find($vuelo->vuelo_id);
        $vueloADestruir->delete();
        $todos = Vuelo::all();
        return $todos;
    }
}
