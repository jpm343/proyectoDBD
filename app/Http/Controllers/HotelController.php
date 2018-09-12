<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Habitacion;
use App\Reserva;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator;
use Auth;

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
        $habitaciones = array();
        for ($i= 0; $i < sizeof($hoteles)  ; $i++) { 
            $auxiliar = Habitacion::where('id_hotel', '=', $hoteles[$i])->pluck('id_habitacion')->toArray();
            foreach ($auxiliar as $a) {
                array_push($habitaciones, $a);
            }
        }
        $reservasAsociadas = array();
        for ($i = 0; $i < sizeof($habitaciones); $i++) {
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
        if($reservasAsociadas == NULL){
            for ($i=0; $i < sizeof($habitaciones); $i++) { 
                $habitacionesDisponibles[$i] = $habitaciones[$i];
            }
        }
        $habitacionesPorCapacidad = array();
        foreach ($habitacionesDisponibles as $habitacionDisponible) {
            $habitacionEncontrada = Habitacion::find($habitacionDisponible);
            if(($request->cantidadMayores + $request->cantidadMenores) <= $habitacionEncontrada->capacidad_habitacion){
                array_push($habitacionesPorCapacidad, $habitacionEncontrada->id_habitacion);
            }
        }
        $arreglo = Habitacion::whereIn('id_habitacion', $habitacionesPorCapacidad)
            ->groupBy('id_hotel')
            ->selectRaw('id_hotel, MIN(precio_noche_habitacion)')->get();
        $precios_minimos = array();
        foreach ($arreglo as $a) {
            $precios_minimos[$a->id_hotel] = $a->min;
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
                if(!in_array($hotelDisponible, $hotelesPorHabitaciones)){
                    array_push($hotelesPorHabitaciones, $hotelDisponible);
                }
            }
        }
        $hotelesFinal = array();
        foreach ($hotelesPorHabitaciones as $hotelPorHabitacion) {
            array_push($hotelesFinal, Hotel::find($hotelPorHabitacion));
        }
        return view('resultados_busqueda_alojamientos', compact('precios_minimos'))->withDetails($hotelesFinal);
    }

    public function detalleAlojamiento($id){
        $hotel = Hotel::find($id);
        $habitaciones = Habitacion::where('id_hotel', '=', $id)->get();
        return view('alojamientos_detail', compact('hotel'))->withDetails($habitaciones);
    }
}
