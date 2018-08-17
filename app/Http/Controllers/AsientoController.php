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
    public function createOrEdit()
    {
        return view('asientos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOrUpdate(Request $request)
    {
        $aux = Asiento::find($request->id_asiento);
        if($aux == null){
            $asiento = new Asiento();
            $asiento->updateOrCreate([
                'rut_pasajero' => $request->rut_pasajero,
                'clase_asiento' => $request->clase_asiento,
                'numero_asiento' => $request->numero_asiento,
                'nombre_pasajero' => $request->nombre_pasajero,
                'id_vuelo' => $request->id_vuelo
            ],[]);
        }
        else{
            $asiento = new Asiento();
            $asiento->updateOrCreate([
                'id_asiento' => $request->id_asiento,
            ], 
                ['rut_pasajero' => $request->rut_pasajero,
                'clase_asiento' => $request->clase_asiento,
                'numero_asiento' => $request->numero_asiento,
                'nombre_pasajero' => $request->nombre_pasajero,
                'id_vuelo' => $request->id_vuelo
            ]);   
        }
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
