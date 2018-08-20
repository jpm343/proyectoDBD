<?php

namespace App\Http\Controllers;

use App\Habitacion;
use App\Http\Requests\HabitacionRequest;
use Illuminate\Http\Request;

class HabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $habitaciones = Habitacion::orderBy('habitacion_id', 'DESC')->paginate();
        return view("Habitacion_view.habitacion-index", compact('habitaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('Habitacion_view.habitacion-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HabitacionRequest $habitacion_request)
    {
        $habitacion = new Habitacion;
        $habitacion->numero_habitacion          = $habitacion_request->numero_habitacion;
        $habitacion->capacidad_habitacion       = $habitacion_request->capacidad_habitacion;
        $habitacion->precio_noche_habitacion    = $habitacion_request->precio_noche_habitacion;
        $habitacion->tipo_habitacion            = $habitacion_request->tipo_habitacion;
        $habitacion->save();
        return redirect()->route("Habitacion.index")->with('info','la habitación fue actualizada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function show($habitacion_id)
    {
        $habitacion = Habitacion::find($habitacion_id);
        return view('Habitacion_view.habitacion-show',compact('habitacion')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function edit($habitacion_id)
    {
        $habitacion = Habitacion::find($habitacion_id);
        return view('Habitacion_view.habitacion-edit',compact('habitacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function update(HabitacionRequest $habitacion_request,$habitacion_id)
    {
        $habitacion = Habitacion::find($habitacion_id);
        $habitacion->numero_habitacion          = $habitacion_request->numero_habitacion;
        $habitacion->capacidad_habitacion       = $habitacion_request->capacidad_habitacion;
        $habitacion->precio_noche_habitacion    = $habitacion_request->precio_noche_habitacion;
        $habitacion->tipo_habitacion            = $habitacion_request->tipo_habitacion;
        $habitacion->save();
        return redirect()->route("Habitacion.index")->with('info','la habitación fue actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($habitacion_id)
    {
        $habitacion = Habitacion::find($habitacion_id);
        $habitacion->delete();
        return back()->with('info','La habitacion ha sido eliminada');
    }
}
