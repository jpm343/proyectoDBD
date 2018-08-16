<?php

namespace App\Http\Controllers;

use App\Aerolinea;
use Illuminate\Http\Request;

class AerolineaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aerolinea = Aerolinea::all();
        return $aerolinea;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
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
        $aerolinea = new Aerolinea();
        $aerolinea->nombre_aerolinea = $request->nombre_aerolinea;
        $aerolinea->puntuacion_aerolinea = $request->puntuacion_aerolinea;
        $aerolinea->tipo_aerolinea = $request->tipo_aerolinea;
        $aerolinea->save();
        //Con la nueva aerolinea guardada, se procede a mostrar todas las aerolinas
        $todas = Aerolinea::all();
        return $todas;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aerolinea  $aerolinea
     * @return \Illuminate\Http\Response
     */
    public function show(Aerolinea $aerolinea)
    {
        $aerolineaEncontrada = Aerolinea::find($aerolinea->nombre_aerolinea);
        return $aerolineaEncontrada;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aerolinea  $aerolinea
     * @return \Illuminate\Http\Response
     */
    public function edit(Aerolinea $aerolinea){
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aerolinea  $aerolinea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aerolinea $aerolinea)
    {
        $aerolineaEncontrada = Aerolinea::find($aerolinea->nombre_aerolinea);
        $aerolineaEncontrada->puntuacion_aerolinea = $request->puntuacion_aerolinea;
        $aerolineaEncontrada->tipo_aerolinea = $request->tipo_aerolinea;
        $aerolineaEncontrada->save();
        $todas = Aerolinea::all();
        return $todas;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aerolinea  $aerolinea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aerolinea $aerolinea)
    {
        $aerolineaADestruir = Aerolinea::find($aerolinea->nombre_aerolinea);
        $aerolineaADestruir->delete();
        //Con la aerolinea destruida, se procede a retornar todas las aerolineas guardadas.
        $todas = Aerolinea::all();
        return $todas;
    }
}
