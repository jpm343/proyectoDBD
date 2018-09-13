<?php

namespace App;

class Carro{
    public $items;
    public $cantidadTotal = 0;
    public $precioTotal = 0;

    public function __construct($carroAntiguo){

        if($carroAntiguo){
            $this->items = $carroAntiguo->items;
            $this->cantidadTotal = $carroAntiguo->cantidadTotal;
            $this->precioTotal = $carroAntiguo->precioTotal;
        }

    }

    public function add($item, $id){
        $itemAgregado = ['cantidad' => 0, 'precio' => $item->precio_noche_habitacion, 'item' => $item];
        if($this->items) {
            if(array_key_exists($id, $this->items)) {
                $itemAgregado = $this->items[$id];
            }
        }
        $itemAgregado['cantidad']++;
        $itemAgregado['precio'] = $item->precio_noche_habitacion * $itemAgregado['cantidad'];
        $this->items[$id] = $itemAgregado;
        $this->cantidadTotal++;
        $this->precioTotal += $item->precio_noche_habitacion; 
    }
}