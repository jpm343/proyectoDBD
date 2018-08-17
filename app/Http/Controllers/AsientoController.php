<?php

namespace App\Http\Controllers;

use App\Asiento;
use Illuminate\Http\Request;

class AsientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Asiento::all();
        return $todos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asientos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $asiento = new Asiento();
        $asiento->rut_pasajero = $request->rut_pasajero;
        $asiento->clase_asiento = $request->clase_asiento;
        $asiento->numero_asiento = $request->numero_asiento;
        $asiento->nombre_pasajero = $request->nombre_pasajero;
        $asiento->id_vuelo = $request->id_vuelo;
        $asiento->save();
        $todos = Asiento::all();
        return $todos;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asiento  $asiento
     * @return \Illuminate\Http\Response
     */
    public function show(Asiento $asiento)
    {
        $asientoEncontrado = Asiento::find($asiento->asiento_id);
        return $asientoEncontrado;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asiento  $asiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Asiento $asiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asiento  $asiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asiento $asiento)
    {
        $asientoEncontrado = Asiento::find($asiento->asiento_id);
        $asientoEncontrado->asiento_id = $request->asiento_id;
        $asientoEncontrado->rut_pasajero = $request->asiento_id;
        $asientoEncontrado->clase_asiento = $request->clase_asiento;
        $asientoEncontrado->numero_asiento = $request->numero_asiento;
        $asientoEncontrado->nombre_pasajero = $request->nombre_pasajero;
        $asientoEncontrado->save();
        $todos = Asiento::all();
        return $todos;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asiento  $asiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asiento $asiento)
    {
        $asientoADestruir = Asiento::find($asiento->asiento_id);
        $asientoADestruir->delete();
        $todos = Asiento::all();
        return $todos;
    }
}
