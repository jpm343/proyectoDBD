@extends('layouts.formulario')

@section('titulo', 'Alojamientos')

@section('formulario')
    <form action="/alojamientos_search" method="get"> 
      <div class="form-inline" role="form" class="form-group">
        <label for="Destino">Destino </label>
        <input type="text" class="form-control" name="destino" placeholder="Ingrese Ciudad Destino">         
      </div>
      <div class="form-inline" class="form-group">
        <label for="ida">Fechas</label>
        <input id="ida" class="form-control" type="date" name="fechaIda">
        <input id="vuelta" class="form-control" type="date" name="fechaVuelta">
      </div>
      <div class="form-inline" class="form-group">
          <label for="especificaciones">Especificaciones</label>
          <input id="ida" class="form-control" type="number" value="1" name="cantidadHabitaciones">
        <input id="vuelta" class="form-control" type="number" value="2" name="cantidadPersonasMayores">
        <input id="vuelta" class="form-control" type="number" value="0" name="cantidadPersonasMenores">
      </div>
      <div >
        <input type="submit" class="btn btn-info" value="Buscar">
      </div>
    </form>
@endsection
