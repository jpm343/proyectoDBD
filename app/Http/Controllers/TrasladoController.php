<?php

namespace App\Http\Controllers;

use App\Traslado;
use Illuminate\Http\Request;
use DateTime;

class TrasladoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $traslado = new Traslado();
        return view("Traslado_view.traslado-index", compact('traslado'));
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
        $traslado                       = new Traslado;
        $traslado->fecha_traslado       = $request->fecha_traslado;
        $traslado->descripcion_traslado = $request->descripcion_traslado;
        $traslado->origen_traslado      = $request->origen_traslado;
        $traslado->destino_traslado     = $request->destino_traslado;
        $traslado->cantidad_pasajeros   = $request->cantidad_pasajeros;
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
        return redirect()->route("Traslado.index")->with('info','El traslado fue actualizado');
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

    public function TrasladoIndexQuery(Request $request)
    {
        $fechaTraslado_str = str_finish($request->fecha_traslado, ' ');
        $fechaTraslado_str = str_finish($fechaTraslado_str, $request->hora_traslado);
        $traslados = Traslado::orderBy('precio_traslado')->paginate()
                               ->where('fecha_traslado', '>=', $request->fecha_traslado.' '.$request->hora_traslado.':00')
                               ->where('origen_traslado', $request->origen_traslado)
                               ->where('destino_traslado', $request->destino_traslado)
                               ->where('cantidad_pasajeros', '>=', intval($request->cantidad_pasajeros))
                               ->where('precio_traslado','<=', intval($request->precio_traslado));

        return view('Traslado_view.traslado-offersQuery', compact('traslados'));
    }
}
