<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RegistroConsulta;

class Registro_consultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rConsulta = RegistroConsulta::all();
        return $rConsulta;
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
        $rConsulta = RegistroConsulta::find($id);
        $rConsulta->cantidad_personas_consultada = $request->cantidad_personas_consultada;
        $rConsulta->tipo_consulta = $request->tipo_consulta;
        $rConsulta->fecha_partida_consultada = $request->fecha_partida_consultada;
        $rConsulta->ciudad_origen_consultada = $request->ciudad_origen_consultada;
        $rConsulta->fecha_regreso_consultada = $request->fecha_regreso_consultada;
        $rConsulta->ciudad_destino_consultada = $request->ciudad_destino_consultada;
        $rConsulta->save();

        return RegistroConsulta::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rConsulta = RegistroConsulta::find($id);
        return $rConsulta;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rConsulta = RegistroConsulta::find($id);
        $rConsulta->cantidad_personas_consultada = $request->cantidad_personas_consultada;
        $rConsulta->tipo_consulta = $request->tipo_consulta;
        $rConsulta->fecha_partida_consultada = $request->fecha_partida_consultada;
        $rConsulta->ciudad_origen_consultada = $request->ciudad_origen_consultada;
        $rConsulta->fecha_regreso_consultada = $request->fecha_regreso_consultada;
        $rConsulta->ciudad_destino_consultada = $request->ciudad_destino_consultada;
        $rConsulta->save();
        return $rConsuta;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rConsulta = RegistroConsulta::find($id);
        $rConsulta->delete();

        return RegistroConsulta::all();
    }
}
