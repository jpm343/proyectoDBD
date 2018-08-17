<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre_hotel'      => 'required',
            'puntuacion_hotel'  => 'required',
            'descripcion_hotel' => 'required',
            'direccion_hotel'   => 'required',
            'ciudad_hotel'      => 'required'
        ];
    }
}
