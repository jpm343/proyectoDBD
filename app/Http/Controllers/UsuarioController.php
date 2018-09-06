<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usuario;

class UsuarioController extends Controller
{


    public function index()
    {
        $usuario = Usuario::all();
        return $usuario;
    }


   public function create(){
        return view('usuarios');
    }


     public function store(Request $request, $id)
    {
        Usuario::create([
            'id_usuario' => $request->id_usuario,
            'correo_usuario' => $request->correo_usuario,
            'nombre_usuario' => $request->nombre_usuario,
            'password_usuario' => $request->password_usuario,
            'id_rol' => $request->id_rol,
            
        ]);
        return Usuario::all();
    }


   public function update(Request $request, $id)
    {
        Usuario::find($id)->update([
            'id_usuario' => $request->id_usuario,
            'correo_usuario' => $request->correo_usuario,
            'nombre_usuario' => $request->nombre_usuario,
            'password_usuario' => $request->password_usuario,
            'id_rol' => $request->id_rol,
            
        ]);
        return Usuario::all();
    }


    public function show($id)
    {
        $usuario = Usuario::find($id);
        return $usuario;
    }


    public function edit($id) {
        $usuario = Usuario::find($id);
        return view('editar_usuario')->with('usuario', $usuario);
    }
    
    
    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        $usuario->delete();
        return Usuario::all();
    }
}