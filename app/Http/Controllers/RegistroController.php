<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registro;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$registro = Registro::All();
    	return $registro;
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
    	$registro = new Registro();
    	$registro->fecha_registro = $request->fecha_registro;
    	$registro->tipo_transaccion = $request->tipo_transaccion;
    	$registro->subtotal_registro = $request->subtotal_registro;
    	$registro->id_usuario = $request->id_usuario
    	$registro->save();

    	$todos = Registro::All();
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
    	$registro = Registro::find($id);
    	return $registro;
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
    	$registro = Registro::find($id);
    	$registro->fecha_registro = $request->fecha_registro;
    	$registro->tipo_transaccion = $request->tipo_transaccion;
    	$registro->subtotal_registro = $request->subtotal_registro;
    	$registro->id_usuario = $request->id_usuario
    	$registro->save();

    	return $registro;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aerolinea  $aerolinea
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$registro = Registro::find($id);
    	$registro->delete();

    	return Registro::all();
    }
}
