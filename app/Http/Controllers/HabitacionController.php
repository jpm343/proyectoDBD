<?php

namespace App\Http\Controllers;

use App\Habitacion;
use App\Carro;
use Illuminate\Http\Request;
use Session;

class HabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $habitaciones = Habitacion::orderBy('id_habitacion', 'DESC')->paginate();
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
    public function store(Request $request)
    {
        $habitacion = new Habitacion;
        $habitacion->numero_habitacion          = $request->numero_habitacion;
        $habitacion->capacidad_habitacion       = $request->capacidad_habitacion;
        $habitacion->precio_noche_habitacion    = $request->precio_noche_habitacion;
        $habitacion->tipo_habitacion            = $request->tipo_habitacion;
        $habitacion->save();
        return redirect()->route("Habitacion.index")->with('info','la habitación fue actualizada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function show($id_habitacion)
    {
        $habitacion = Habitacion::find($id_habitacion);
        return view('Habitacion_view.habitacion-show',compact('habitacion')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id_habitacion)
    {
        $habitacion = Habitacion::find($id_habitacion);
        return view('Habitacion_view.habitacion-edit',compact('habitacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id_habitacion)
    {
        $habitacion = Habitacion::find($habitacion_id);
        $habitacion->numero_habitacion          = $request->numero_habitacion;
        $habitacion->capacidad_habitacion       = $request->capacidad_habitacion;
        $habitacion->precio_noche_habitacion    = $request->precio_noche_habitacion;
        $habitacion->tipo_habitacion            = $request->tipo_habitacion;
        $habitacion->save();
        return redirect()->route("Habitacion.index")->with('info','la habitación fue actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_habitacion)
    {
        $habitacion = Habitacion::find($id_habitacion);
        $habitacion->delete();
        return back()->with('info','La habitacion ha sido eliminada');
    }

    public function getAddToCart(Request $request, $id){
        $habitacion = Habitacion::find($id);
        $carroAntiguo = Session::has('carro') ? Session::get('carro') : null;
        $carro = new Carro($carroAntiguo);  
        $carro->add($habitacion, $habitacion->id_habitacion);
        $request->session()->put('carro', $carro);
        return redirect('/alojamientos');
    }
}
