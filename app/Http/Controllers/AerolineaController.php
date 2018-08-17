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
    public function createOrEdit(){
        return view('aerolineas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOrUpdate(Request $request)
    {   
        $aerolinea = new Aerolinea();
        $aerolinea->updateOrCreate([
            'nombre_aerolinea' => $request->nombre_aerolinea,
        ],[
            'puntuacion_aerolinea' => $request->puntuacion_aerolinea,
            'tipo_aerolinea' => $request->tipo_aerolinea
        ]);
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
