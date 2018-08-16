<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fondo;

class FondoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$fondo = Fondo::All();
    	return $fondo;
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
    	$fondo = new Fondo();
    	$fondo->cuenta_origen = $request->cuenta_origen;
    	$fondo->monto_actual = $request->monto_actual;
    	$fondo->banco_origen = $request->banco_origen;
    	$fondo->id_usuario = $request->id_usuario;
    	$fondo->save();

    	$todos = Fondo::All();
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
    	$fondo = Fondo::find($id);
    	return $fondo;
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
    	$fondo = Fondo::find($id);
    	$fondo->cuenta_origen = $request->cuenta_origen;
    	$fondo->monto_actual = $request->monto_actual;
    	$fondo->banco_origen = $request->banco_origen;
    	$fondo->id_usuario = $request->id_usuario;
    	$fondo->save();

    	return $fondo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aerolinea  $aerolinea
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$fondo = Fondo::find($id);
    	$fondo->delete();

    	return Fondo::all();
    }
}
