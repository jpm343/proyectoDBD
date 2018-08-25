<?php

namespace App\Http\Controllers;

use App\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hoteles = Hotel::orderBy('id_hotel', 'DESC')->paginate();
        return view("Hotel_view.hotel-index", compact('hoteles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Hotel_view.hotel-create',compact('hotel')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hotel                      = new Hotel;
        $hotel->nombre_hotel        = $request->nombre_hotel;
        $hotel->puntuacion_hotel    = $request->puntuacion_hotel;
        $hotel->descripcion_hotel   = $request->descripcion_hotel;
        $hotel->direccion_hotel     = $request->direccion_hotel;
        $hotel->ciudad_hotel        = $request->ciudad_hotel;
        $hotel->save(); 
        return redirect()->route("Hotel.index")->with('info','El hotel fue actualizado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show($id_hotel)
    {
        $hotel = Hotel::find($id_hotel);
        return view('Hotel_view.hotel-show',compact('hotel')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit($id_hotel)
    {
        $hotel = Hotel::find($id_hotel);
        return view('Hotel_view.hotel-edit',compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_hotel)
    {
        $hotel                      = Hotel::find($hotel_id);
        $hotel->nombre_hotel        = $request->nombre_hotel;
        $hotel->puntuacion_hotel    = $request->puntuacion_hotel;
        $hotel->descripcion_hotel   = $request->descripcion_hotel;
        $hotel->direccion_hotel     = $request->direccion_hotel;
        $hotel->ciudad_hotel        = $request->ciudad_hotel;
        $hotel->save(); 
        return redirect()->route("Hotel.index")->with('info','El hotel fue actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_hotel)
    {
        $hotel = Hotel::find($id_hotel);
        $hotel->delete();
        return back()->with('info','El hotel ha sido eliminado');
    }
}
