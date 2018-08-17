<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HabitacionRequest extends FormRequest
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
            'numero_habitacion'         => 'required', 
            'capacidad_habitacion'      => 'required',
            'precio_noche_habitacion'   => 'required',
            'tipo_habitacion'           => 'required',
        ];
    }
}
