<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Habitacion;
use App\Reserva;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hoteles = Hotel::orderBy('id_hotel', 'DESC')->paginate();
        return view("Hotel_view.hotel-index", compact('hoteles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Hotel_view.hotel-create',compact('hotel')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hotel                      = new Hotel;
        $hotel->nombre_hotel        = $request->nombre_hotel;
        $hotel->puntuacion_hotel    = $request->puntuacion_hotel;
        $hotel->descripcion_hotel   = $request->descripcion_hotel;
        $hotel->direccion_hotel     = $request->direccion_hotel;
        $hotel->ciudad_hotel        = $request->ciudad_hotel;
        $hotel->save(); 
        return redirect()->route("Hotel.index")->with('info','El hotel fue actualizado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show($id_hotel)
    {
        $hotel = Hotel::find($id_hotel);
        return view('Hotel_view.hotel-show',compact('hotel')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit($id_hotel)
    {
        $hotel = Hotel::find($id_hotel);
        return view('Hotel_view.hotel-edit',compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_hotel)
    {
        $hotel                      = Hotel::find($hotel_id);
        $hotel->nombre_hotel        = $request->nombre_hotel;
        $hotel->puntuacion_hotel    = $request->puntuacion_hotel;
        $hotel->descripcion_hotel   = $request->descripcion_hotel;
        $hotel->direccion_hotel     = $request->direccion_hotel;
        $hotel->ciudad_hotel        = $request->ciudad_hotel;
        $hotel->save(); 
        return redirect()->route("Hotel.index")->with('info','El hotel fue actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_hotel)
    {
        $hotel = Hotel::find($id_hotel);
        $hotel->delete();
        return back()->with('info','El hotel ha sido eliminado');
    }

    public function buscarAlojamientos(Request $request){
        $hoteles = Hotel::where('ciudad_hotel', 'like', "%".$request->destino."%")->pluck('id_hotel');
        $habitaciones = Habitacion::where('id_hotel', '=', $hoteles[0])->pluck('id_habitacion');
        for ($i= 1; $i < sizeof($hoteles)  ; $i++) { 
            $habitaciones = $habitaciones . Habitacion::where('id_hotel', '=', $hoteles[i])->pluck('id_habitacion');
        }
        $reservasAsociadas = DB::table('habitacion_reserva')->where('id_habitacion', '=', $habitaciones[0])->pluck('id_reserva')->toArray();
        for ($i = 1; $i < sizeof($habitaciones); $i++) {
            $reservasEncontradas = DB::table('habitacion_reserva')->where('id_habitacion', '=', $habitaciones[$i])->pluck('id_reserva')->toArray();
            foreach ($reservasEncontradas as $reservaEncontrada) {
                array_push($reservasAsociadas, $reservaEncontrada);
            }
        }
        $habitacionesDisponibles = array();
        foreach ($reservasAsociadas as $reservaAsociada) {
            $reservaEncontrada = Reserva::find($reservaAsociada);
            if($request->fechaVuelta <= $reservaEncontrada->fecha_inicio ||
               $request->fechaIda >= $reservaEncontrada->fecha_fin){
                array_push($habitacionesDisponibles, DB::table('habitacion_reserva')->where('id_reserva', '=', $reservaEncontrada->id_reserva)->pluck('id_habitacion')->toArray()[0]);
            }
        }
        $habitacionesPorCapacidad = array();
        foreach ($habitacionesDisponibles as $habitacionDisponible) {
            $habitacionEncontrada = Habitacion::find($habitacionDisponible);
            if(($request->cantidadMayores + $request->cantidadMenores) <= $habitacionEncontrada->capacidad_habitacion){
                array_push($habitacionesPorCapacidad, $habitacionEncontrada->id_habitacion);
            }
        }
        $hotelesDisponibles = array();
        foreach ($habitacionesPorCapacidad as $habitacionPorCapacidad) {
            $hotelEncontrado = Habitacion::find($habitacionPorCapacidad)->id_hotel;;
            array_push($hotelesDisponibles, $hotelEncontrado);
        }
        $hotelesPorHabitaciones = array();
        $contador = 0;
        foreach ($hotelesDisponibles as $hotelDisponible) {
            foreach ($habitacionesPorCapacidad as $habitacionPorCapacidad) {
                if(Habitacion::find($habitacionPorCapacidad)->where('id_hotel', '=', $hotelDisponible) != NULL){
                    $contador++;
                }
            }
            if($contador >= $request->cantidadHabitaciones){
                array_push($hotelesPorHabitaciones, $hotelDisponible);
            }
        }
        return $hotelesPorHabitaciones;
    }
}
