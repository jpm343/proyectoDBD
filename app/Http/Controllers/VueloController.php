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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vuelo = new Vuelo();
        $vuelo->vuelo_id = $request->vuelo_id;
        $vuelo->fecha_salida = $request->fecha_salida;
        $vuelo->fecha_llegada = $request->fecha_llegada;
        $vuelo->ciudad_origen = $request->ciudad_origen;
        $vuelo->ciudad_destino = $request->ciudad_destino;
        $vuelo->aeropuerto_origen = $request->aeropuerto_origen;
        $vuelo->aeropuerto_destino = $request->aeropuerto_destino;
        $vuelo->pais_origen = $request->pais_origen;
        $vuelo->pais_destino = $request->pais_destino;
        $vuelo->save();
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vuelo  $vuelo
     * @return \Illuminate\Http\Response
     */
    public function edit(Vuelo $vuelo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vuelo  $vuelo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vuelo $vuelo)
    {
        $vueloEncontrado = Vuelo::find($vuelo->vuelo_id);
        $vueloEncontrado->vuelo_id = $request->vuelo_id;
        $vueloEncontrado->fecha_salida = $request->fecha_salida;
        $vueloEncontrado->fecha_llegada = $request->fecha_llegada;
        $vueloEncontrado->ciudad_origen = $request->ciudad_origen;
        $vueloEncontrado->ciudad_destino = $request->ciudad_destino;
        $vueloEncontrado->aeropuerto_origen = $request->aeropuerto_origen;
        $vueloEncontrado->aeropuerto_destino = $request->aeropuerto_destino;
        $vueloEncontrado->pais_origen = $request->pais_origen;
        $vueloEncontrado->pais_destino = $request->pais_destino;
        $vueloEncontrado->save();
        $todos = Vuelo::all();
        return $todos;
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
