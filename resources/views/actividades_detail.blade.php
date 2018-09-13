@extends('layouts.base')

@section('titulo', 'Actividades')

@section('contenido')
    <div class="row align-items-center">
        <div class="col-lg-6 md-6 xs-12">
            <h1> {{$details->nombre_actividad}} </h1>
            <h3> Puntacion: <?php echo $details->puntuacion_actividad; ?> </h3>
            <h3> Precio: $<?php echo $details->precio_actividad; ?> CLP</h3>
            <br>
            <h5> Descripcion: <h5>
            <p> {{$details->descripcion_actividad}} </p>
            @if(isset($unicodia))
                <small> Disponible los <?php echo $unicodia; ?></small>
            @else
                <small> Disponible de <?php echo $desde; ?> a <?php echo $hasta; ?></small>
            @endif                

        </div>
        <div class="col-lg-6 md-6 xs-12">
        <!--Aqui se supone que se envia el formulario al carrito de compras, deberia tener un controlador encargado de eso-->
        <form action="<?php echo $details->id_actividad; ?>/compra" method="get" name="compra">
            <div class="form-row">
                <label for="datetimepicker4">Elegir fecha </label>
                <div class="col-lg-12 md-12 mb-3">
                    <input type="date" name="fecha_reserva" class="form-control" id='datetimepicker4' required>
                </div>
            </div>
            <div class="form-row">
                <label for="exampleFormControlSelect1">Cantidad de adultos </label>
                <div class="col-lg-12 md-12 mb-3">
                    <select class="form-control" name="cantidad_adultos" id="exampleFormControlSelect1" placeholder="Cantidad adultos">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                      <option>6</option>
                      <option>7</option>
                      <option>8</option>
                      <option>9</option>
                      <option>10</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <label for="exampleFormControlSelect2">Cantidad de niños </label>
                <div class="col-lg-12 md-12 mb-3">
                    <select class="form-control" name="cantidad_ninos" id="exampleFormControlSelect2" placeholder="Cantidad ninos">
                      <option>0</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                      <option>6</option>
                      <option>7</option>
                      <option>8</option>
                      <option>9</option>
                      <option>10</option>
                    </select>
                </div>
            </div>
            @if(Auth::user())
              <button class="btn btn-default" type="submit">Comprar</button>
            @else
              <button class="btn btn-default" disabled>Comprar</button>
              <small>Primero debes iniciar sesión</small>
            @endif
        </form>
        </div>
    </div>
@endsection
