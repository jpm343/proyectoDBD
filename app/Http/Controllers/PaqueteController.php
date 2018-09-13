<?php

namespace App\Http\Controllers;

use App\Asiento;
use App\Vuelo;
use App\CompaniaAuto;
use App\Auto;
use App\Hotel;
use App\Habitacion;
use App\Reserva;
use Auth;
use Validator;
use Illuminate\Http\Request;

class PaqueteController extends Controller
{
    public function buscarPaquetesPaso1(Request $request) {
        $validator = Validator::make($request->all(), [
            'fecha_ida' => 'required|date|after:today',
            'fecha_vuelta' => 'required|date|after:fecha_ida',
            'personas' => 'required|digits_between:1,10',
            'habitaciones' => 'digits_between:1,10',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        $tipo_paquete = $request->tipo_paquete;
        $ciudad_origen = $request->ciudad_origen;
        $ciudad_destino = $request->ciudad_destino;
        $fecha_inicio = $request->fecha_ida;
        $fecha_fin = $request->fecha_vuelta;
        $num_personas = $request->personas;

        if ($tipo_paquete == 'auto') {
            // tantos asientos en vuelo como ocupantes en auto
            // declarar $num_habitaciones para simplificar
            //     siguiente paso en la reserva
            $num_habitaciones = 0;
            $num_asientos = $num_personas;
        } else {
            // tantos asientos en un vuelo como personas se
            //     alojarán en el hotel en total
            $num_habitaciones = $request->habitaciones;
            $num_asientos = $num_personas * $num_habitaciones;
        }

        // id de vuelos con origen y destino indicados
        $id_vuelos = Vuelo::where([
                ['ciudad_origen', 'like', '%'.$ciudad_origen.'%'],
                ['ciudad_destino', 'like', '%'.$ciudad_destino.'%'],
            ])->pluck('id_vuelo');

        // subconjunto de dichos vuelos que tienen suficientes
        //     asientos disponibles
        $id_vuelos_disponibles = Asiento::whereNull('id_reserva')
            ->whereIn('id_vuelo', $id_vuelos)
            ->groupBy('id_vuelo')
            ->havingRaw('count(*) >= ?', [$num_asientos])
            ->pluck('id_vuelo');

        // colección final de vuelos
        $vuelos = Vuelo::whereIn('id_vuelo', $id_vuelos_disponibles)->get();

        return view('resultados_paquete_vuelos')
            ->with('vuelos', $vuelos)
            ->with('request', $request)
            ->with('num_habitaciones', $num_habitaciones);
    }

    public function buscarPaquetesPaso2(Request $request) {
        $id_vuelo = $request->id_vuelo;
        $tipo_paquete = $request->tipo_paquete;
        $ciudad_destino = $request->ciudad_destino;
        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = $request->fecha_fin;
        $num_personas = $request->num_personas;
        $num_habitaciones = $request->num_habitaciones;

        // realizar reserva del vuelo
        $reserva = new Reserva([
            'ciudad_destino' => $ciudad_destino,
            'cantidad_mayores' => $num_personas,
            'cantidad_menores' => 0,
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin,
            'id_usuario' => Auth::id(),
        ]);
        $reserva->save();
        $asiento = Asiento::where('id_vuelo', $id_vuelo)
            ->whereNull('id_reserva')
            ->first()->update([
                'id_reserva' => $reserva->id_reserva,
            ]);

        if ($tipo_paquete == 'auto') {
            // nombres de compañías que ofrecen arriendo de autos
            //     en la ciudad de destino
            $nombre_companias = array();
            foreach (CompaniaAuto::all() as $compania) {
                foreach ($compania->ciudades_de_atencion as $ciudad_atencion) {
                    if (strpos($ciudad_atencion, $ciudad_destino) !== false) {
                        $nombre_companias[] = $compania->nombre_compania;
                        break;
                    }
                }
            }

            // patentes de autos que pertenecen a esas compañías
            //     y tienen capacidad suficiente
            $patentes = Auto::whereIn('nombre_compania', $nombre_companias)
                ->where('capacidad_auto', '>=', $num_personas)
                ->pluck('patente_auto');

            // subconjunto de dichas patentes que tienen reserva
            //     en el período indicado
            $patentes_reservadas = Reserva::join('auto_reserva',
                    'auto_reserva.id_reserva', '=', 'reservas.id_reserva')
                ->whereIn('auto_reserva.patente_auto', $patentes)
                ->where('reservas.fecha_inicio', '<', $fecha_fin)
                ->where('reservas.fecha_fin', '>', $fecha_inicio)
                ->pluck('auto_reserva.patente_auto');

            // colección final de autos
            $autos = Auto::whereIn('patente_auto', $patentes)
                ->whereNotIn('patente_auto', $patentes_reservadas)
                ->get();

            // preparar datos como se recibirán en la vista
            $request->ciudad = $ciudad_destino;
            return view('resultados_autos')
                ->with('autos', $autos)
                ->with('request', $request);

        } else { // hotel

            // id de hoteles en la ciudad de destino
            $id_hoteles = Hotel::where('ciudad_hotel', 'like', '%'.$ciudad_destino.'%')
                ->pluck('id_hotel');

            // id de habitaciones que pertenecen a dichos hoteles
            //     y tienen capacidad suficiente
            $id_habitaciones = Habitacion::whereIn('id_hotel', $id_hoteles)
                ->where('capacidad_habitacion', '>=', $num_personas)
                ->pluck('id_habitacion');

            // subconjunto de dichas habitaciones que están reservadas
            $id_habitaciones_reservadas = Reserva::join('habitacion_reserva',
                    'habitacion_reserva.id_reserva', '=', 'reservas.id_reserva')
                ->whereIn('habitacion_reserva.id_habitacion', $id_habitaciones)
                ->where('reservas.fecha_inicio', '<', $fecha_fin)
                ->where('reservas.fecha_fin', '>', $fecha_inicio)
                ->pluck('habitacion_reserva.id_habitacion');

            // id y precio minimo de hoteles que cumplen con lo solicitado
            $id_precio_hoteles = Habitacion::whereIn('id_habitacion', $id_habitaciones)
                ->whereNotIn('id_habitacion', $id_habitaciones_reservadas)
                ->groupBy('id_hotel')
                ->havingRaw('count(*) >= ?', [$num_habitaciones])
                ->selectRaw('id_hotel, MIN(precio_noche_habitacion)')
                ->get();

            // arreglos de id_hotel->precio_minimo y de id_hotel
            $precios_minimos = array();
            $id_hoteles_disponibles = array();
            foreach ($id_precio_hoteles as $item) {
                $id_hoteles_disponibles[] = $item->id_hotel;
                $precios_minimos[$item->id_hotel] = $item->min;
            }

            // colección final de hoteles
            $hoteles = Hotel::whereIn('id_hotel', $id_hoteles_disponibles)->get();

            // preparar datos como se recibirán en la vista
            return view('resultados_busqueda_alojamientos', compact('precios_minimos'))
                ->withDetails($hoteles)->with('paquete', $request->tipo_paquete);
        }
    }
}
