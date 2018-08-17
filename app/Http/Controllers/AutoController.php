<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Auto;

class AutoController extends Controller
{
    public function index() {
        return Auto::all();
    }

    public function create() {
        // return view('crear_auto');
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
        // return view('editar_auto');
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
}
