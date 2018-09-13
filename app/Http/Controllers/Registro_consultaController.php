<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RegistroConsulta;

class Registro_consultaController extends Controller
{
    

    public function index()
    {
        $rConsulta = RegistroConsulta::all();
        return $rConsulta;
    }

    

    public function create()
    {
       return view('registroConsulta');
       
    }

    public function store(Request $request) 
    {
        RegistroConsulta::create([
            'id_registroConsulta' => $request->id_registroConsulta,
            'tipo_consulta' =>  $request->tipo_consulta,
            'tabla_modificada' => $request->tabla_modificada,
            'estado_anterior' => json_decode($request->estado_anterior),
            'estado_actual' => json_decode($request->estado_actual),
            'id_modificado' => $request->id_modificado,
            'id_usuario' => $request->id_usuario]);
        return RegistroConsulta::all();
    }
   
    public function show($id)
    {
        $rConsulta = RegistroConsulta::find($id);
        return $rConsulta;
    }


    public function edit($id)
    {
         $rConsulta = RegistroConsulta::find($id);
         return view('editar_rConsulta')->with('registroConsulta',$rConsulta);

    }

   
    public function Update(Request $request, $id)
    {
        RegistroConsulta::find($id)->update([
            'id_registroConsulta' => $request->id_registroConsulta,
            'tipo_consulta' =>  $request->tipo_consulta,
            'tabla_modificada' => $request->tabla_modificada,
            'estado_anterior' => json_decode($request->estado_anterior),
            'estado_actual' => json_decode($request->estado_actual),
            'id_modificado' => $request->id_modificado,
            'id_usuario' => $request->id_usuario]);
        return RegistroConsulta::all();
    }

    public function destroy($id)
    {
        $rConsulta = RegistroConsulta::find($id);
        $rConsulta->delete();
        return RegistroConsulta::all();
    }
}
