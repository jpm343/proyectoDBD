<?php

namespace App\Http\Controllers;

use Auth;
use App\Fondo;
use App\Registro;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showUserProfile()
	{
		$usuario = Auth::user()->id;

		//se consultan los registros de usuario
		$id = Auth::id();
		$registros_usuario = Registro::where('id_usuario', '=', $id)->get();

		if(empty($registros_usuario))
			return view('Profile_view.profile-index')->withErrors(['Aun no registras compras!']);
		
		else
			return view('Profile_view.profile-index')->withRegistros($registros_usuario);
	}

	public function callDetailReserva()
	{
		return view('Profile_view.Profile-detail');
	}

	public function showUserFondos()
	{
		$usuario = Auth::user();
		$fondos_usuario = Fondo::where('id_usuario', '=', Auth::id())->get();
		//$fondos_usuario = $usuario->fondos();
		return view('Profile_view.user_fondos')->withFondos($fondos_usuario);
	}

	public function showDetailUserFondo($id)
	{
		$fondo = Fondo::find($id);
		return view('Profile_view.user_fondos_details')->withFondo($fondo);
	}
}
