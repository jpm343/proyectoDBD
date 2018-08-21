<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Usuario::all();
        return $usuario;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function createOrEdit(){
        return view('usuarios');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOrUpdate(Request $request)
    {   
        $aux = Usuario::find($request->id_usuario);
        if($aux == null){
            $usuario = new Usuario();
            $usuario->updateOrCreate(['id_rol' =>  $request->id_rol,'nombre_usuario' => $request->nombre_usuario,
            'correo_usuario' => $request->correo_usuario,
            'password_usuario' => $request->password_usuario],[]);
            return Usuario::all();
        }
        else{
            $usuario = new Usuario();
            $usuario->updateOrCreate(['nombre_usuario' => $request->nombre_usuario,'correo_usuario' => $request->correo_usuario,],
                ['id_rol' =>  $request->id_rol,'password_usuario' => $request->password_usuario]);
        }
        return Usuario::all();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuario::find($id);
        return $usuario;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        $usuario->delete();
        return Usuario::all();
    }
}