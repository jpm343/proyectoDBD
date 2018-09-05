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
        // Se buscan compañías que operen en la ciudad donde se
        //     arrienda el auto y donde se devolverá
        $ciudad_inicio = $request->ciudad_inicio;
        $ciudad_fin = $request->ciudad_fin;
        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = $request->fecha_fin;

        $companias = CompaniaAuto::select('nombre_compania', 'ciudades_de_atencion')->get();
        $companias_en_ciudades = array();
        foreach ($companias as $compania) {
            if (in_array($ciudad_inicio, $compania->ciudades_de_atencion) AND
                in_array($ciudad_fin, $compania->ciudades_de_atencion)) {
                    $companias_en_ciudades[] = $compania->nombre_compania;
            }
        }

        $patentes = Auto::whereIn('nombre_compania', $companias_en_ciudades)
            ->pluck('patente_auto');

        $reservados = Reserva::join('auto_reserva', 'auto_reserva.id_reserva',
                                               '=', 'reservas.id_reserva')
            ->whereIn('auto_reserva.patente_auto', $patentes)
            ->where(function ($query) use ($fecha_inicio, $fecha_fin) {
                $query->where('reservas.fecha_inicio', '<', $fecha_fin)
                      ->orWhere('reservas.fecha_fin', '>', $fecha_inicio);
            })->pluck('auto_reserva.patente_auto');

        $autos = Auto::whereIn('patente_auto', $patentes)
            ->whereNotIn('patente_auto', $reservados)
            ->get();

        return $autos;
    }
}
