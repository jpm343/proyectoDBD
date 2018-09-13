<?php

namespace App\Http\Controllers;

use App\Habitacion;
use App\Carro;
use Illuminate\Http\Request;
use Session;
use Validator;

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

    public function agregarReservaHabitacion(Request $request, $id, $fechaIda, $fechaVuelta)
    {
        return $id;
        $habitacion = Habitacion::find($id);
        $hotel = Hotel::find($habitacion->id_hotel);
        //si la sesion esta iniciada, se agregan los productos al carro
        if($user = Auth::user())
        {
            $reserva = new Reserva(['cantidad_menores' => $request->cantidad_ninos,
                                    'cantidad_mayores' => $request->cantidad_adultos,
                                    'ciudad_destino'   => $hotel->ciudad_hotel,
                                    'fecha_inicio'     => $fechas[0],
                                    'fecha_fin'        => $fechas[1],
                                    'id_usuario'       => Auth::id(),
                                   ]);
            $reserva->save();
            return view('prueba_compra')->withReserva($reserva);
        }
    }
}
