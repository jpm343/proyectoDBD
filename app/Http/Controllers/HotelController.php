<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Http\Requests\HotelRequest;
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
        $hoteles = Hotel::orderBy('hotel_id', 'DESC')->paginate();
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
    public function store(HotelRequest $hotel_request)
    {
        return "hotel guardado";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show($hotel_id)
    {
        $hotel = Hotel::find($hotel_id);
        return view('Hotel_view.hotel-show',compact('hotel')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit($hotel_id)
    {
        $hotel = Hotel::find($hotel_id);
        return view('Hotel_view.hotel-edit',compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(HotelRequest $hotel_request, $hotel_id)
    {
        $hotel                      = Hotel::find($hotel_id);
        $hotel->nombre_hotel        = $hotel_request->nombre_hotel;
        $hotel->puntuacion_hotel    = $hotel_request->puntuacion_hotel;
        $hotel->descripcion_hotel   = $hotel_request->descripcion_hotel;
        $hotel->ciudad_hotel        = $hotel_request->ciudad_hotel;
        $hotel->save(); 
        return redirect()->route("Hotel_view.hotel-index")->with('info','El hotel fue actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy($hotel_id)
    {
        $hotel = Hotel::find($hotel_id);
        $hotel->delete();
        return back()->with('info','El hotel ha sido eliminado');
    }
}
