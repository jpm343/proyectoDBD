<?php

namespace App\Http\Controllers;

use Auth;
use App\Fondo;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showUserProfile()
	{
		$usuario = Auth::user()->id;
		return view('Profile_view.profile-index', compact('usuario'));
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
