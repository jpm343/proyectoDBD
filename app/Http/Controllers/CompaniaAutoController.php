<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CompaniaAuto;

class CompaniaAutoController extends Controller
{
    public function index() {
        return CompaniaAuto::all();
    }

    public function create() {
        return view('crear_compania_auto');
    }

    public function store(Request $request) {
        // return CompaniaAuto::create([
        CompaniaAuto::create([
            'nombre_compania' => $request->nombre_compania,
            'paises_de_atencion' => json_decode($request->paises_de_atencion),
            'ciudades_de_atencion' => json_decode($request->ciudades_de_atencion),
        ]);
        // segun Salazarkss se nos recomendo asi (en store, update, destroy)
        return CompaniaAuto::all();
    }

    public function show($nombre_compania) {
        CompaniaAuto::find($nombre_compania);
    }

    public function edit($nombre_compania) {
        $compania_auto = CompaniaAuto::find($nombre_compania);
        return view('editar_compania_auto')->with('compania_auto', $compania_auto);
    }

    public function update(Request $request, $nombre_compania) {
        // return CompaniaAuto::find($nombre_compania)->update([
        CompaniaAuto::find($nombre_compania)->update([
            'nombre_compania' => $request->nombre_compania,
            'paises_de_atencion' => json_decode($request->paises_de_atencion),
            'ciudades_de_atencion' => json_decode($request->ciudades_de_atencion),
        ]);
        return CompaniaAuto::all();
    }

    public function destroy($nombre_compania) {
        CompaniaAuto::find($nombre_compania)->delete();
        // return '{}';
        return CompaniaAuto::all();
    }
}
