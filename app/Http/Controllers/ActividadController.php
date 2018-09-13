<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actividad;
use App\Usuario;
use App\Reserva;
use Illuminate\Support\Facades\DB;
use Validator;
use Auth;
use Redirect;


class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$actividad = Actividad::All();
    	return $actividad;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crear_actividad');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Actividad::create([
            'id_actividad' => $request->id_actividad,
            'puntuacion_actividad' => $request->puntuacion_actividad,
            'nombre_actividad' => $request->nombre_actividad,
            'descripcion_actividad' => $request->descripcion_actividad,
            'ciudad_actividad' => $request->ciudad_actividad,
            'pais_actividad' => $request->pais_actividad,
            'dias_disponibles' => json_decode($request->dias_disponibles),
            'hora_inicio' => $request->hora_inicio,
            'hora_fin' => $request->hora_fin,
            'precio_actividad' => $request->precio_actividad,
        ]);
        return Actividad::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aerolinea  $aerolinea
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$actividad = Actividad::find($id);
    	return $actividad;
    }

    public function edit($id)
    {
        $actividad = Actividad::find($id);
        return view('editar_actividad')->with('actividad', $actividad);
    }

    public function update(Request $request, $id)
    {
        Actividad::find($id)->update([
            'id_actividad' => $request->id_actividad,
            'puntuacion_actividad' => $request->puntuacion_actividad,
            'nombre_actividad' => $request->nombre_actividad,
            'descripcion_actividad' => $request->descripcion_actividad,
            'ciudad_actividad' => $request->ciudad_actividad,
            'pais_actividad' => $request->pais_actividad,
            'dias_disponibles' => json_decode($request->dias_disponibles),
            'hora_inicio' => $request->hora_inicio,
            'hora_fin' => $request->hora_fin,
            'precio_actividad' => $request->precio_actividad,
        ]);
        return Actividad::all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aerolinea  $aerolinea
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$actividad = Actividad::find($id);
    	$actividad->delete();

    	return Actividad::all();
    }

    public function buscarActividades(Request $request)
    {
        $query = $request->ciudad_destino;
        //se verifica igual
        if($query != ""){
            $actividades = Actividad::where('ciudad_actividad', 'like', "%".$query."%")
                                        ->orWhere('ciudad_actividad', 'like', "%".ucfirst($query)."%")
                                        ->get();

            if(count($actividades) > 0)
                return view('resultados_busqueda_actividades')->withDetails($actividades)->withQuery($query);
        }
        return view('resultados_busqueda_actividades')->withMessage("No se encontraron actividades en ".$query);
    }

    public function detalleActividades($id)
    {
        $arreglo_dias = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado", "Domingo"];
        $actividad = Actividad::find($id);
        $intervalo_dias = $actividad->dias_disponibles;
        $dia_desde = $arreglo_dias[$intervalo_dias[0]];
        $dia_hasta = $arreglo_dias[end($intervalo_dias)];

        if($dia_hasta != $dia_desde)
        {
            return view('actividades_detail')->withDetails($actividad)
                                             ->withDesde($dia_desde)
                                             ->withHasta($dia_hasta);
        }
        else
        {
            return view('actividades_detail')->withDetails($actividad)
                                             ->withUnicodia($dia_desde);
        } 
    }


    public function agregarReservaActividad(Request $request, $id)
    {
        //validacion
        $validator = Validator::make($request->all(), [
            'fecha_reserva' => 'required|date|after:today',
            'cantidad_ninos' => 'digits_between:0,10',
            'cantidad_adultos' => 'digits_between:1,10',
        ]);

        if($validator->fails())
        {
            return Redirect::back()->withErrors(['Selecciona una fecha válida!']);
        }

        $actividad = Actividad::find($id);

        //si la sesion esta iniciada, se agregan los productos al carro
        if($user = Auth::user())
        {
            $reserva = new Reserva(['cantidad_menores' => $request->cantidad_ninos,
                                    'cantidad_mayores' => $request->cantidad_adultos,
                                    'ciudad_destino'   => $actividad->ciudad_actividad,
                                    'fecha_inicio'     => $request->fecha_reserva,
                                    'fecha_fin'        => $request->fecha_reserva,
                                    'id_usuario'       => Auth::id(),
                                    'id_actividad'     => $id,
                                   ]);
            $reserva->save();
            return view('prueba_compra')->withReserva($reserva);
        }
    }
}
