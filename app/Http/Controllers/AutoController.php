<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Auto;
use App\CompaniaAuto;
use App\Reserva;

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
        $ciudad_inicio = $request->ciudad_inicio;
        $ciudad_fin = $request->ciudad_fin;
        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = $request->fecha_fin;

        // lista de compañías que sirven en ambas ciudades
        $companias = array();
        foreach (CompaniaAuto::all() as $compania) {
            $en_ciudad_inicio = false;
            $en_ciudad_fin = false;
            foreach ($compania->ciudades_de_atencion as $ciudad_atencion) {
                if (strpos($ciudad_atencion, $ciudad_inicio) !== false) {
                    $en_ciudad_inicio = true;
                }
                if (strpos($ciudad_atencion, $ciudad_fin) !== false) {
                    $en_ciudad_fin = true;
                }
                if ($en_ciudad_inicio AND $en_ciudad_fin) {
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
        //     en ambas ciudades y están libres en el intervalo consultado
        $autos = Auto::whereIn('patente_auto', $patentes)
            ->whereNotIn('patente_auto', $reservados)
            ->get();

        // presentar los autos disponibles en una tabla
        return view('resultados_autos')
            ->with('autos', $autos)
            ->with('request', $request);
    }
}
