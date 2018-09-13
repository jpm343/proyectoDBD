<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fondo;
use Redirect;
use Validator;
use Auth;

class FondoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$fondo = Fondo::All();
    	return $fondo;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createOrEdit()
    {
    	//
        return view('fondos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOrUpdate(Request $request)
    {
        $aux = Fondo::find($request->id_fondos);
        if($aux == null)
        {
            $fondo = new Fondo();
            $fondo->updateOrCreate([
                'cuenta_origen' => $request->cuenta_origen,
                'monto_actual' => $request->monto_actual,
                'banco_origen' => $request->banco_origen,
                'id_usuario' => $request->id_usuario,
            ],[]);
        }
        else
        {
            $fondo = new Fondo();
            $fondo->updateOrCreate([
                'id_fondos' => $request->id_fondos,
            ], [
                'cuenta_origen' => $request->cuenta_origen,
                'monto_actual' => $request->monto_actual,
                'banco_origen' => $request->banco_origen,
                'id_usuario' => $request->id_usuario,
            ]);
        }

        $todos = Fondo::All();
        return $todos;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aerolinea  $aerolinea
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$fondo = Fondo::find($id);
    	return $fondo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aerolinea  $aerolinea
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$fondo = Fondo::find($id);
    	$fondo->delete();

    	return Fondo::all();
    }

    public function agregarFondos(Request $request, $id)
    {
        $fondo = Fondo::find($id);
        $monto_a_agregar = $request->monto;
        $monto_actual = Fondo::where('id_fondos', $id)->pluck('monto_actual');

        if($monto_a_agregar > 0)
        {
            $fondo->monto_actual = $monto_actual[0] + $monto_a_agregar;
            $fondo->save();
            return Redirect::back()->withErrors(['Fondos agregados!']);
        }
    }

    public function metodoDePagoForm()
    {
        return view('metodo_de_pago_form');
    }

    public function anadirMetodoDePago(Request $request)
    {
        //validacion
        $validator = Validator::make($request->all(), [
            'cuenta_origen'=> 'digits_between:0,2147483647',
            'monto_actual' => 'digits_between:0,2147483647',
            'banco_origen' => 'required',
        ]);

        if($validator->fails())
        {
            return Redirect::back()->withErrors(['Ingresa valores válidos']);
        }

        $fondo = new Fondo([
            'cuenta_origen' => $request->cuenta_origen,
            'monto_actual'  => random_int(0, 1000000),
            'banco_origen'  => $request->banco_origen,
            'id_usuario'    => Auth::id(),
        ]);

        if(count(Fondo::where('cuenta_origen', '=', $request->cuenta_origen)->get()))
            return Redirect::back()->withErrors(['Error, esa cuenta ya está ingresada para el usuario actual']);

        $fondo->save();
        return Redirect::back()->withErrors(['Fondos agregados!']);
    }
}
