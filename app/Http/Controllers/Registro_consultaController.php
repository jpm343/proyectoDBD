<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RegistroConsulta;

class Registro_consultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rConsulta = RegistroConsulta::all();
        return $rConsulta;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createOrEdit()
    {
       return view('registroConsulta');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  public function storeOrUpdate(Request $request)
    {
        $rConsulta = new RegistroConsulta();
        $rConsulta->updateOrCreate(['tipo_consulta' =>  $request->tipo_consulta,],['tabla_modificada' => $request->tabla_modificada,
        'estado_anterior' => $request->estado_anterior,'estado_actual' => $request->estado_actual,'id_modificado' => $request->id_modificado,
        'id_usuario' => $request->id_usuario]);
        return RegistroConsulta::all();
    }
        
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rConsulta = RegistroConsulta::find($id);
        return $rConsulta;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rConsulta = RegistroConsulta::find($id);
        $rConsulta->delete();

        return RegistroConsulta::all();
    }
}
