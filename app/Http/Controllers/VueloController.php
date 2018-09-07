<?php

namespace App\Http\Controllers;

use DateTime;
use App\Asiento;
use App\Vuelo;
use App\CompaniaAuto;
use App\Auto;
use App\Hotel;
use App\Habitacion;
use App\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VueloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vuelos = Vuelo::all();
        return $vuelos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createOrEdit()
    {
        return view('vuelos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOrUpdate(Request $request)
    {
        $aux = Vuelo::find($request->id_vuelo);
        if($aux == null){
            $vuelo = new Vuelo();
            $vuelo->updateOrCreate([
                'fecha_salida' => $request->fecha_salida,
                'fecha_llegada' => $request->fecha_llegada,
                'ciudad_origen' => $request->ciudad_origen,
                'ciudad_destino' => $request->ciudad_destino,
                'aeropuerto_origen' => $request->aeropuerto_origen,
                'aeropuerto_destino' => $request->aeropuerto_destino,
                'pais_origen' => $request->pais_origen,
                'pais_destino' => $request->pais_destino,
                'nombre_aerolinea' => $request->nombre_aerolinea
            ], []);
        }
        else{
            $vuelo = new Vuelo();
            $vuelo->updateOrCreate([
                'id_vuelo' => $request->id_vuelo,
            ], [
                'fecha_salida' => $request->fecha_salida,
                'fecha_llegada' => $request->fecha_llegada,
                'ciudad_origen' => $request->ciudad_origen,
                'ciudad_destino' => $request->ciudad_destino,
                'aeropuerto_origen' => $request->aeropuerto_origen,
                'aeropuerto_destino' => $request->aeropuerto_destino,
                'pais_origen' => $request->pais_origen,
                'pais_destino' => $request->pais_destino,
                'nombre_aerolinea' => $request->nombre_aerolinea
            ]);
        }
        $todos = Vuelo::all();
        return $todos;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vuelo  $vuelo
     * @return \Illuminate\Http\Response
     */
    public function show(Vuelo $vuelo)
    {
        $vueloSolicitado = Vuelo::find($vuelo->vuelo_id);
        return $vueloSolicitado;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vuelo  $vuelo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vuelo $vuelo)
    {
        $vueloADestruir = Vuelo::find($vuelo->vuelo_id);
        $vueloADestruir->delete();
        $todos = Vuelo::all();
        return $todos;
    }

    public function buscarVuelos(Request $request){

        $cOrigen = $request->origen;
        $cDestino = $request->destino;
        $ida = $request->fechaIda;
        $cVuelo = $request->viajes;
        $vuelta = $request->fechaVuelta;
        $clase = $request->boleto;
        $adultos = intval($request->cAdulto);
        $menor = intval($request->cMenor);
        $tPersonas = $adultos + $menor;
        //Multidestino
        $cOrigen1 = $request->origen1;
        $cDestino1 = $request->destino1;
        $ida1 = $request->fechaIda1;
        $cOrigen2 = $request->CiudadO2;
        $cDestino2 = $request->CiudadD2;
        $ida2 = $request->fechaIda2;
        $cOrigen3 = $request->CiudadO3;
        $cDestino3 = $request->CiudadD3;
        $ida3 = $request->fechaIda3;


        //Vuelos entre los destinos en el dia indicado
        $vuelosIda = Vuelo::where('ciudad_origen','=',$cOrigen)
                        ->where('ciudad_destino','=',$cDestino)->where('fecha_salida','>',$ida.' 00:00:00')->pluck('id_vuelo');

        $precio = Asiento::whereIn('id_vuelo', $vuelosIda)->pluck('precio')->random();

        $vuelosIdaDisponibles = Asiento::whereNull('id_reserva')->whereIn('id_vuelo', $vuelosIda)
                                        /*->where('clase_asiento','=',$clase)*/->groupBy('id_vuelo')
                                        ->havingRaw('count(*) >= ?', [$tPersonas])
                                        ->pluck('id_vuelo');

        $vuelosI = Vuelo::whereIn('id_vuelo',$vuelosIdaDisponibles)->get();

        if ($cVuelo === "idaVuelta" ) {
            //Vuelos entre los destinos en el dia indicado
            $vuelosVuelta = Vuelo::where('ciudad_origen','=',$cDestino)
                            ->where('ciudad_destino','=',$cOrigen)->whereDate('fecha_salida',$vuelta)
                            ->pluck('id_vuelo');

            $vuelosVueltaDisponibles = Asiento::whereNull('id_reserva')->whereIn('id_vuelo', $vuelosVuelta)
                                            /*->where('clase_asiento','=',$clase)*/->groupBy('id_vuelo')
                                            ->havingRaw('count(*) >= ?', [$tPersonas])->pluck('id_vuelo');

            $vuelosV = Vuelo::whereIn('id_vuelo',$vuelosVueltaDisponibles)->get();
              

            if(count($vuelosI) > 0 && count($vuelosV) > 0)
                return view('resultado_busqueda_vuelo', compact('vuelosI','vuelosV','precio'));
            return view('resultado_busqueda_vuelo')->withMessage("No hay vuelos disponibles para su busqueda");
        }

        if($cVuelo === "multidestino"){
            $vuelosIda1 = Vuelo::where('ciudad_origen','=',$cOrigen1)
                        ->where('ciudad_destino','=',$cDestino1)->where('fecha_salida','>',$ida.' 00:00:00')->pluck('id_vuelo');


            $vuelosIdaDisponibles1 = Asiento::whereNull('id_reserva')->whereIn('id_vuelo', $vuelosIda1)
                                                ->groupBy('id_vuelo')
                                                ->havingRaw('count(*) >= ?', [$tPersonas])
                                                ->pluck('id_vuelo');

            $vuelosI1 = Vuelo::whereIn('id_vuelo',$vuelosIdaDisponibles)->get();
            //Vuelos entre los destinos en el dia indicado
            ///segundo vuelo
            $vuelosIda2 = Vuelo::where('ciudad_origen','=',$cOrigen2)
                        ->where('ciudad_destino','=',$cDestino2)->where('fecha_salida','>',$ida.' 00:00:00')->pluck('id_vuelo');


            $vuelosIdaDisponibles2 = Asiento::whereNull('id_reserva')->whereIn('id_vuelo', $vuelosIda2)
                                            ->groupBy('id_vuelo')
                                            ->havingRaw('count(*) >= ?', [$tPersonas])
                                            ->pluck('id_vuelo');

            $vuelosI2 = Vuelo::whereIn('id_vuelo',$vuelosIdaDisponibles2)->get();
            //
            $vuelosIda3 = Vuelo::where('ciudad_origen','=',$cOrigen3)
                        ->where('ciudad_destino','=',$cDestino3)->where('fecha_salida','>',$ida.' 00:00:00')->pluck('id_vuelo');


            $vuelosIdaDisponibles3 = Asiento::whereNull('id_reserva')->whereIn('id_vuelo', $vuelosIda3)
                                                ->groupBy('id_vuelo')
                                                ->havingRaw('count(*) >= ?', [$tPersonas])
                                                ->pluck('id_vuelo');

            $vuelosI3 = Vuelo::whereIn('id_vuelo',$vuelosIdaDisponibles3)->get();


            if(count($vuelosI1) > 0)
            return view('resultado_busqueda_vuelo', compact('vuelosI1', 'vuelosI2', 'vuelosI3','precio'));
        return view('resultado_busqueda_vuelo')->withMessage("No hay vuelos disponibles para su busqueda");
        }

        if(count($vuelosI) > 0)
            return view('resultado_busqueda_vuelo', compact('vuelosI', 'cVuelo','precio'));
        return view('resultado_busqueda_vuelo')->withMessage("No hay vuelos disponibles para su busqueda");
    }

    public function buscarPaquetes(Request $request) {
        $tipo_paquete = $request->tipo_paquete;
        $ciudad_origen = $request->ciudad_origen;
        $ciudad_destino = $request->ciudad_destino;
        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = $request->fecha_fin;
        $num_personas = $request->personas;

        if ($tipo_paquete == 'auto') {
            // tantos asientos en vuelo como ocupantes en auto
            $num_asientos = $num_personas;
        } else {
            // tantos asientos en un vuelo como personas se
            //     alojarán en el hotel en total
            $num_habitaciones = $request->habitaciones;
            $num_asientos = $num_personas * $num_habitaciones;
        }

        // id de vuelos con origen y destino indicados
        $id_vuelos = Vuelo::where([
                ['ciudad_origen', $ciudad_origen],
                ['ciudad_destino', $ciudad_destino],
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

        if ($tipo_paquete == 'auto') {
            // nombres de compañías que ofrecen arriendo de autos
            //     en la ciudad de destino
            $nombre_companias = array();
            foreach (CompaniaAuto::all() as $compania) {
                if (in_array($ciudad_destino, $compania->ciudades_de_atencion)) {
                    $nombre_companias[] = $compania->nombre_compania;
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

            return view('resultados_paquete')->with('vuelos', $vuelos)
                ->with('autos', $autos);

        } else { // hotel

            // id de hoteles en la ciudad de destino
            $id_hoteles = Hotel::where('ciudad_hotel', $ciudad_destino)
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

            // id de hoteles que cumplen con lo solicitado
            $id_hoteles_disponibles = Habitacion::whereIn('id_habitacion', $id_habitaciones)
                ->whereNotIn('id_habitacion', $id_habitaciones_reservadas)
                ->groupBy('id_hotel')
                ->havingRaw('count(*) >= ?', [$num_habitaciones])
                ->pluck('id_hotel');

            // colección final de hoteles
            $hoteles = Hotel::whereIn('id_hotel', $id_hoteles_disponibles)->get();

            return view('resultados_paquete')->with('vuelos', $vuelos)
                ->with('hoteles', $hoteles);
        }

}
