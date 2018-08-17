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
    public function createOrEdit()
    {
    	//
        return view('registros');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOrUpdate(Request $request)
    {
        $aux = Registro::find($request->id_registro);
        if($aux == null)
        {
            $registro = new Registro();
            $registro->updateOrCreate([
                'fecha_registro' => $request->fecha_registro,
                'tipo_transaccion' => $request->tipo_transaccion,
                'subtotal_registro' => $request->subtotal_registro,
                'id_usuario' => $request->id_usuario,
            ],[]);
        }
        else
        {
            $registro = new Fondo();
            $registro->updateOrCreate([
                'id_registro' => $request->id_registro,
            ], [
                'fecha_registro' => $request->fecha_registro,
                'tipo_transaccion' => $request->tipo_transaccion,
                'subtotal_registro' => $request->subtotal_registro,
                'id_usuario' => $request->id_usuario,
            ]);
        }
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
