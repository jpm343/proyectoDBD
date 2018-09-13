<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Reserva;
use App\Auto;
use App\Asiento;
use App\Traslado;
use App\Habitacion;
use App\Actividad;
use App\Fondo;
use Carbon\Carbon;
use Auth;
use Redirect;

class CarroController extends Controller
{
    //
    public function eliminarDelCarro($id)
    {
    	$_SESSION['carro'] = unserialize(serialize($_SESSION['carro']));
    	$reserva = Reserva::find($id);
    	//se verifica que haya un carro
    	if(isset($_SESSION['carro']))
    	{
    		//llaves reales
    		$keys = array_keys($_SESSION['carro']);
    		
    		//llave relativa a la reserva que se quiere borrar
    		$key = array_search($id, array_column($_SESSION['carro'], 'id_reserva'));

    		//se borra el elemento
    		unset($_SESSION['carro'][$keys[$key]]);
    	}
    	return redirect()->back();
    }

    public function pagar()
    {
        $_SESSION['carro'] = unserialize(serialize($_SESSION['carro']));

        //si el carro esta vacio, se debe retornar
        if(count($_SESSION['carro']) < 1)
            return Redirect::back()->withErrors(['El carro está vacío!']);
        
        $keys = array_keys($_SESSION['carro']);

        //array para mostrar detalles en la vista
        $array_detalles = array();

        //aqui debo consultar todos los precios de los elementos en el carro.
        $precios = array();
        //$subtotal = array_sum($precios);

        //todos los objetos relacionados a reservas
        //autos, habitacion, vuelo, actividad, traslado
        for($i=0; $i<sizeof($_SESSION['carro']); $i++)
        {
            //sub array por cada reserva
            $subarray_detalles = array();
            $tipo = "";

            //verdadero indice
            $j = $keys[$i];

            //reserva y subtotal actual
            $reserva_actual = $_SESSION['carro'][$j];
            $subtotal_actual = 0;

            //cantidad dias de reserva
            $fecha1 = Carbon::parse($reserva_actual->fecha_fin);
            $fecha2 = Carbon::parse($reserva_actual->fecha_inicio);
            $cantidad_dias = $fecha1->diffInDays($fecha2);//verificar esto porque puede ser 0
            

            //consultas
            $autos = DB::table('auto_reserva')->where('id_reserva', '=', $reserva_actual->id_reserva)->pluck('patente_auto')
                                                                                                     ->toArray();

            $habitaciones = DB::table('habitacion_reserva')->where('id_reserva', '=', $reserva_actual->id_reserva)->pluck('id_habitacion')
                                                                                                                  ->toArray();

            $asientos = Asiento::where('id_reserva', '=', $reserva_actual->id_reserva)->get();

            $traslado = Traslado::where('id_reserva', '=', $reserva_actual->id_reserva)->get()->toArray();

            //para cada auto de la reserva (si es que hay)
            $sumador_precio_autos = 0;
            if(!empty($autos))
            {
                foreach($autos as $patente)
                {
                    $sumador_precio_autos += Auto::find($patente)->precio_dia_auto;
                }
                $sumador_precio_autos *= $cantidad_dias;

                $tipo = 'auto';
            }

            //para cada habitacion de la reserva (si es que hay)
            $sumador_precio_habitaciones = 0;
            if(!empty($habitaciones))
            {
                foreach($habitaciones as $id_habitacion)
                {
                    $sumador_precio_habitaciones += Habitacion::find($id_habitacion)->precio_noche_habitacion;
                }
                //se multiplica por cantidad de dias de estadia
                $sumador_precio_habitaciones *= $cantidad_dias;

                $tipo = 'alojamiento';
            }

            //para cada asiento de la reserva
            $sumador_precio_asientos = 0;
            if(!empty($asientos))
            {
                foreach($asientos as $asiento)
                {
                    $sumador_precio_asientos += $asiento->precio;
                }
                //se multiplica por cantidad de pasajeros
                $sumador_precio_asientos *= ($reserva_actual->cantidad_mayores + $reserva_actual->cantidad_menores);

                $tipo = 'vuelo';
            }

            //el traslado y la actividad son 1 solo
            $sumador_precio_traslado = 0;
            $sumador_precio_actividad = 0;

            if(!empty($traslado))
            {
                $sumador_precio_traslado += $traslado[0]->precio_traslado;
                $tipo = 'traslado';
            }

            if($reserva_actual->id_actividad != null)
            {
                $actividad_actual = Actividad::find($reserva_actual->id_actividad);
                $sumador_precio_actividad += $actividad_actual->precio_actividad;
                //se multiplica por cantidad de adultos
                $sumador_precio_actividad *= $reserva_actual->cantidad_mayores;
                $tipo = 'actividad';
            }

            //se suma el total
            $subtotal_actual = $sumador_precio_actividad + $sumador_precio_autos + $sumador_precio_asientos + $sumador_precio_habitaciones + $sumador_precio_traslado;

            $subarray_detalles = array(
                "id"       => $reserva_actual->id_reserva,
                "tipo"     => $tipo,
                "subtotal" => $subtotal_actual,
            );

            array_push($precios, $subtotal_actual);
            array_push($array_detalles, $subarray_detalles);

        }

        $fondos_usuario = Fondo::where('id_usuario', '=', Auth::id())->get();

        return view('pagar')->withSubtotal(array_sum($precios))
                            ->withDetails($array_detalles)
                            ->withFondos($fondos_usuario);
        
        /*traza
        foreach($precios as $precio)
        {
            echo $precio;
            echo ", ";
        }
        echo array_sum($precios);
        fin traza*/
    }
}
