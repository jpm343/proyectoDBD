<?php

namespace App\Http\Controllers;

use DateTime;
use \Auth;
use \Validator;
use App\Asiento;
use App\Reserva;
use App\Vuelo;
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

        $clase = $request->boleto;
        $mayores = intval($request->cAdulto);
        $menores = intval($request->cMenor);
        $tPersonas = $mayores + $menores;
        $cVuelo = $request->viajes;


        if ($cVuelo === "idaVuelta" || $cVuelo === "soloIda") {

            $validator = Validator::make($request->all(), [
            'fechaIda' => 'required|date|after:yesterday',
            ]);

            if($validator->fails())
            {        
                return redirect()->back()
                                 ->withErrors($validator);
            }

            $cOrigen = $request->origen;
            $cDestino = $request->destino;
            $ida = $request->fechaIda;
            $vuelta = $request->fechaVuelta;

        //Vuelos entre los destinos en el dia indicado
            $vuelosIda = Vuelo::where('ciudad_origen','like',"%".$cOrigen."%")
                            ->where('ciudad_destino','like',"%".$cDestino."%")->whereDate('fecha_salida',$ida)->pluck('id_vuelo');


            $vuelosIdaDisponibles = Asiento::whereNull('id_reserva')->whereIn('id_vuelo', $vuelosIda)
                                            /*->where('clase_asiento','=',$clase)*/->groupBy('id_vuelo')
                                            ->havingRaw('count(*) >= ?', [$tPersonas])
                                            ->pluck('id_vuelo');

            $vuelosI = Vuelo::whereIn('id_vuelo',$vuelosIdaDisponibles)->get();
            if ($cVuelo === "idaVuelta" ) {

                $validator = Validator::make($request->all(), [
                            'fechaIda' => 'required|date|after:yesterday',
                            'fechaVuelta' => 'date|after:ida',
                            ]);
                    if($validator->fails())
                    {
                         return redirect()->back()->withErrors($validator)
                             ->withInput();//falta notificar este error en la vista
                    }
                //Vuelos entre los destinos en el dia indicado
                $vuelosVuelta = Vuelo::where('ciudad_origen','like',"%".$cDestino."%")
                                ->where('ciudad_destino','like',"%".$cOrigen."%")->whereDate('fecha_salida',$vuelta)
                                ->pluck('id_vuelo');

                $vuelosVueltaDisponibles = Asiento::whereNull('id_reserva')->whereIn('id_vuelo', $vuelosVuelta)
                                                /*->where('clase_asiento','=',$clase)*/->groupBy('id_vuelo')
                                                ->havingRaw('count(*) >= ?', [$tPersonas])->pluck('id_vuelo');

                $vuelosV = Vuelo::whereIn('id_vuelo',$vuelosVueltaDisponibles)->get();
                  

                if(count($vuelosI) > 0 && count($vuelosV) > 0)
                    return view('resultado_busqueda_vuelo', compact('vuelosI','vuelosV','tPersonas', 'menores', 'mayores'));
                return view('resultado_busqueda_vuelo')->withMessage("No hay vuelos disponibles para su busqueda");
            }
        }
        if($cVuelo === "multidestino"){
            //Multidestino
            $validator = Validator::make($request->all(), [
            'origen1' => 'required',
            'destino1' => 'required',
            'fechaIda1' => 'required|date|after:yesterday',
            'CiudadO2' => 'required',
            'CiudadD2' => 'required',
            'fechaIda2' => 'required|date|after:yesterday',
            'CiudadO3' => 'required',
            'CiudadD3' => 'required',
            'fechaIda3' => 'required|date|after:yesterday',
            ]);

            if($validator->fails())
            {
                 
                return redirect()->back()
                                 ->withErrors($validator);
            }

            $cOrigen1 = $request->origen1;
            $cDestino1 = $request->destino1;
            $ida1 = $request->fechaIda1;
            $cOrigen2 = $request->CiudadO2;
            $cDestino2 = $request->CiudadD2;
            $ida2 = $request->fechaIda2;
            $cOrigen3 = $request->CiudadO3;
            $cDestino3 = $request->CiudadD3;
            $ida3 = $request->fechaIda3;

            $vuelosIda1 = Vuelo::where('ciudad_origen','like',"%".$cOrigen1."%")
                        ->where('ciudad_destino','like',"%".$cDestino1."%")->where('fecha_salida','>',$ida.' 00:00:00')->pluck('id_vuelo');


            $vuelosIdaDisponibles1 = Asiento::whereNull('id_reserva')->whereIn('id_vuelo', $vuelosIda1)
                                                ->groupBy('id_vuelo')
                                                ->havingRaw('count(*) >= ?', [$tPersonas])
                                                ->pluck('id_vuelo');

            $vuelosI1 = Vuelo::whereIn('id_vuelo',$vuelosIdaDisponibles)->get();
            //Vuelos entre los destinos en el dia indicado
            ///segundo vuelo
            $vuelosIda2 = Vuelo::where('ciudad_origen','like',"%".$cOrigen2)
                        ->where('ciudad_destino','like',"%".$cDestino2)->where('fecha_salida','>',$ida.' 00:00:00')->pluck('id_vuelo');


            $vuelosIdaDisponibles2 = Asiento::whereNull('id_reserva')->whereIn('id_vuelo', $vuelosIda2)
                                            ->groupBy('id_vuelo')
                                            ->havingRaw('count(*) >= ?', [$tPersonas])
                                            ->pluck('id_vuelo');

            $vuelosI2 = Vuelo::whereIn('id_vuelo',$vuelosIdaDisponibles2)->get();
            //
            $vuelosIda3 = Vuelo::where('ciudad_origen','like',"%".$cOrigen3."%")
                        ->where('ciudad_destino','like',"%".$cDestino3."%")->where('fecha_salida','>',$ida.' 00:00:00')->pluck('id_vuelo');


            $vuelosIdaDisponibles3 = Asiento::whereNull('id_reserva')->whereIn('id_vuelo', $vuelosIda3)
                                                ->groupBy('id_vuelo')
                                                ->havingRaw('count(*) >= ?', [$tPersonas])
                                                ->pluck('id_vuelo');

            $vuelosI3 = Vuelo::whereIn('id_vuelo',$vuelosIdaDisponibles3)->get();


            if(count($vuelosI1) > 0)
            return view('resultado_busqueda_vuelo', compact('vuelosI1', 'vuelosI2', 'vuelosI3','tPersonas', 'menores', 'mayores'));
        return view('resultado_busqueda_vuelo')->withMessage("No hay vuelos disponibles para su busqueda");
        }

        if(count($vuelosI) > 0)
            return view('resultado_busqueda_vuelo', compact('vuelosI', 'cVuelo','tPersonas', 'menores', 'mayores'));
        return view('resultado_busqueda_vuelo')->withMessage("No hay vuelos disponibles para su busqueda");
    }

    public function reserva($id, $mayores, $menores)
    {
        
        $vuelo = Vuelo::find($id);

        if(Auth::user())
        {
            $vueloReserva = new Reserva(['cantidad_menores' => $menores,
                                        'cantidad_mayores' => $mayores,
                                        'ciudad_destino'   => $vuelo->ciudad_destino,
                                        'fecha_inicio'     => $vuelo->fecha_salida,
                                        'fecha_fin'        => $vuelo->fecha_llegada,
                                        'id_usuario'       => Auth::id()
                                    ]);
            $vueloReserva->save();
            return view('prueba_compra')->withReserva($vueloReserva);
        }


        
    }

}
