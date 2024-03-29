<?php

namespace App\Http\Controllers;

use App\Traslado;
use App\Reserva;
use Illuminate\Http\Request;
use DateTime;
use Validator;
use Auth;

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
        if($request->sentido_traslado == "De aeropuerto a hotel") // aeroperto a hotel
        {
            $traslados = Traslado::orderBy('precio_traslado')->paginate()
                               ->where('fecha_traslado', '>=', $request->fecha_traslado.' '.$request->hora_traslado.':00')
                               ->where('origen_traslado', $request->aeropuerto_traslado)
                               ->where('destino_traslado', $request->hotel_traslado)
                               ->where('cantidad_pasajeros', '>=', intval($request->cantidad_pasajeros))
                               ->where('precio_traslado','<=', intval($request->precio_traslado));
            return view('Traslado_view.traslado-offersQuery', compact('traslados'));
        }   
        else
        {
            $traslados = Traslado::orderBy('precio_traslado')->paginate()
                               ->where('fecha_traslado', '>=', $request->fecha_traslado.' '.$request->hora_traslado.':00')
                               ->where('origen_traslado', $request->hotel_traslado)
                               ->where('destino_traslado', $request->aeropuerto_traslado)
                               ->where('cantidad_pasajeros', '>=', intval($request->cantidad_pasajeros))
                               ->where('precio_traslado','<=', intval($request->precio_traslado));
            return view('Traslado_view.traslado-offersQuery', compact('traslados'));
        }
    }

    public function agregarReservaTraslado($id)
    {
        // Buscamos el traslado
        $reservaTraslado = Traslado::find($id);
        $reserva = new Reserva(['cantidad_menores' => 0,//por mientras
                                'cantidad_mayores' => $reservaTraslado->cantidad_pasajeros,
                                'ciudad_destino'   => $reservaTraslado->destino_traslado,
                                'fecha_inicio'     => $reservaTraslado->fecha_traslado,
                                'fecha_fin'        => $reservaTraslado->fecha_traslado,
                                'id_usuario'       => Auth::id(),
                                'id_actividad'     => null,
                               ]);

        $reserva->save();

        //si la sesion esta iniciada, se agregan los productos al carro
        if($user = Auth::user())
        {
            $reservaTraslado->disponibilidad = false;
            $reservaTraslado->save();
            return view('prueba_compra')->withReservaTraslado($reserva);
        }
    }
}
