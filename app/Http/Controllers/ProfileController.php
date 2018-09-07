<?php

namespace App\Http\Controllers;

use Auth;
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
}
