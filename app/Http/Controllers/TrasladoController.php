<?php

namespace App\Http\Controllers;

use App\Traslado;
use App\Http\Requests\TrasladoRequest;
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
        $traslados = Traslado::orderBy('traslado_id', 'DESC')->paginate();
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
    public function store(TrasladoRequest $traslado_request)
    {
        $traslado                       = new Traslado;
        $traslado->fecha_traslado       = $traslado_request->fecha_traslado;
        $traslado->descripcion_traslado = $traslado_request->descripcion_traslado;
        $traslado->origen_traslado      = $traslado_request->origen_traslado;
        $traslado->destino_traslado     = $traslado_request->destino_traslado;
        $traslado->precio_traslado      = $traslado_request->precio_traslado;
        $traslado->save();
        return redirect()->route("Traslado.index")->with('info','El traslado fue creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Traslado  $traslado
     * @return \Illuminate\Http\Response
     */
    public function show($traslado_id)
    {
        $traslado = Traslado::find($traslado_id);
        return view('Traslado_view.traslado-show',compact('traslado')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Traslado  $traslado
     * @return \Illuminate\Http\Response
     */
    public function edit($traslado_id)
    {
        $traslado = Traslado::find($traslado_id);
        return view('Traslado_view.traslado-edit',compact('traslado')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Traslado  $traslado
     * @return \Illuminate\Http\Response
     */
    public function update(TrasladoRequest $traslado_request, $traslado_id)
    {
        $traslado                       = Traslado::find($traslado_id);
        $traslado->fecha_traslado       = $traslado_request->fecha_traslado;
        $traslado->descripcion_traslado = $traslado_request->descripcion_traslado;
        $traslado->origen_traslado      = $traslado_request->origen_traslado;
        $traslado->destino_traslado     = $traslado_request->destino_traslado;
        $traslado->precio_traslado      = $traslado_request->precio_traslado;
        $traslado->save();
        return redirect()->route("Traslado.index")->with('info','El traslado fue actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Traslado  $traslado
     * @return \Illuminate\Http\Response
     */
    public function destroy($traslado_id)
    {
        $traslado = Traslado::find($traslado_id);
        $traslado->delete();
        return back()->with('info','El traslado ha sido eliminado');
    }
}
