<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Auto;
use App\CompaniaAuto;
use App\Reserva;
use Auth;
use Validator;

class AutoController extends Controller
{
    public function index() {
        return Auto::all();
    }

    public function create() {
        return view('crear_auto');
    }

    public function store(Request $request) {
        // return Auto::create([
        Auto::create([
            'patente_auto' => $request->patente_auto,
            'modelo_auto' => $request->modelo_auto,
            'capacidad_auto' => $request->capacidad_auto,
            'precio_dia_auto' => $request->precio_dia_auto,
            'descripcion_auto' => $request->descripcion_auto,
            'transmision_auto' => $request->transmision_auto,
            'nombre_compania' => $request->nombre_compania,
        ]);
        // segun Salazarkss se nos recomendo asi (en store, update, destroy)
        return Auto::all();
    }

    public function show($patente_auto) {
        return Auto::find($patente_auto);
    }

    public function edit($patente_auto) {
        $auto = Auto::find($patente_auto);
        return view('editar_auto')->with('auto', $auto);
    }

    public function update(Request $request, $patente_auto) {
        // return Auto::find($patente_auto)->update([
        Auto::find($patente_auto)->update([
            'patente_auto' => $request->patente_auto,
            'modelo_auto' => $request->modelo_auto,
            'capacidad_auto' => $request->capacidad_auto,
            'precio_dia_auto' => $request->precio_dia_auto,
            'descripcion_auto' => $request->descripcion_auto,
            'transmision_auto' => $request->transmision_auto,
            'nombre_compania' => $request->nombre_compania,
        ]);
        return Auto::all();
    }

    public function destroy($patente_auto) {
        Auto::find($patente_auto)->delete();
        // return '{}';
        return Auto::all();
    }

    public function search(Request $request) {
        $validator = Validator::make($request->all(), [
            'fecha_arriendo' => 'required|date|after:today',
            'fecha_devolucion' => 'required|date|after:fecha_arriendo',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        $ciudad = $request->ciudad;
        $fecha_inicio = $request->fecha_arriendo;
        $fecha_fin = $request->fecha_devolucion;
        $request->num_personas = 1;

        // lista de compañías que sirven en la ciudad
        $companias = array();
        foreach (CompaniaAuto::all() as $compania) {
            foreach ($compania->ciudades_de_atencion as $ciudad_atencion) {
                if (strpos($ciudad_atencion, $ciudad) !== false) {
                    $companias[] = $compania->nombre_compania;
                    break;
                }
            }
        }

        // lista de patentes de autos que pertenecen a esas compañías
        $patentes = Auto::whereIn('nombre_compania', $companias)
            ->pluck('patente_auto');

        // lista de patentes de autos que tienen reservas en el
        //     intervalo de tiempo consultado
        $reservados = Reserva::join('auto_reserva', 'auto_reserva.id_reserva',
                                               '=', 'reservas.id_reserva')
            ->whereIn('auto_reserva.patente_auto', $patentes)
            ->where('reservas.fecha_inicio', '<', $fecha_fin)
            ->where('reservas.fecha_fin', '>', $fecha_inicio)
            ->pluck('auto_reserva.patente_auto');

        // colección final de autos pertenecientes a compañías que sirven
        //     en dicha ciudad y están libres en el intervalo consultado
        $autos = Auto::whereIn('patente_auto', $patentes)
            ->whereNotIn('patente_auto', $reservados)
            ->get();

        // presentar los autos disponibles en una tabla
        return view('resultados_autos')
            ->with('autos', $autos)
            ->with('request', $request);
    }

    public function reservar(Request $request) {
        $reserva = new Reserva([
            'ciudad_destino' => $request->ciudad,
            'cantidad_mayores' => $request->personas,
            'cantidad_menores' => 0,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'id_usuario' => Auth::id(),
        ]);
        $reserva->save();
        $reserva->autos()->attach($request->patente);
        return redirect('/carrito');
    }
}
