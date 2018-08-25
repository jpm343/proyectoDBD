<?php

namespace App\Http\Controllers;

use App\Traslado;
use Illuminate\Http\Request;

class TrasladoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $traslados = Traslado::orderBy('id_traslado', 'DESC')->paginate();
        return view("Traslado_view.traslado-index", compact('traslados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Traslado_view.traslado-create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return "traslado guardado";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Traslado  $traslado
     * @return \Illuminate\Http\Response
     */
    public function show($id_traslado)
    {
        $traslado = Traslado::find($id_traslado);
        return view('Traslado_view.traslado-show',compact('traslado')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Traslado  $traslado
     * @return \Illuminate\Http\Response
     */
    public function edit($id_traslado)
    {
        $traslado = Traslado::find($id_traslado);
        return view('Traslado_view.traslado-edit',compact('traslado')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Traslado  $traslado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_traslado)
    {
        $traslado                       = Traslado::find($id_traslado);
        $traslado->fecha_traslado       = $request->fecha_traslado;
        $traslado->descripcion_traslado = $request->descripcion_traslado;
        $traslado->origen_traslado      = $request->origen_traslado;
        $traslado->destino_traslado     = $request->destino_traslado;
        $traslado->precio_traslado      = $request->precio_traslado;
        $traslado->save();
        return view('Traslado_view.traslado-index',compact('traslado'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Traslado  $traslado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_traslado)
    {
        $traslado = Traslado::find($id_traslado);
        $traslado->delete();
        return back()->with('info','El traslado ha sido eliminado');
    }
}
