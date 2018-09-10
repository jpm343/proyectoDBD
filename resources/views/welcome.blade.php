@extends('layouts.formulario')

@section('titulo', 'Alojamientos')

@section('formulario')
    <form action="/alojamientos_search" method="get"> 
      <div class="form-group">
        <label for="Destino">Destino </label>
        <input type="text" class="form-control" name="destino" required>
      </div>
      <div class="form-group row">
        <div class="col-6">
          <label for="ida">Fecha de ida</label>
          <input id="ida" class="form-control" type="date" name="fechaIda" required>
        </div>
        <div class="col-6">
          <label for="vuelta">Fecha de vuelta</label>
          <input id="vuelta" class="form-control" type="date" name="fechaVuelta" required>
        </div>
      </div>
      <div class="form-group">
        <label for="cantidadHabitaciones">Habitaciones</label>
        <input id="cantidadHabitaciones" class="form-control" type="number" value="1" name="cantidadHabitaciones" required>
      </div>
      <div class="form-group row">
        <div class="col-12">
          <label>Personas por habitación</label>
        </div>
        <div class="col-6">
          <label for="cantidadPersonasMayores">Mayores de edad</label>
          <input id="cantidadPersonasMayores" class="form-control" type="number" value="2" name="cantidadPersonasMayores" required>
        </div>
        <div class="col-6">
          <label for="cantidadPersonasMenores">Menores de edad</label>
          <input id="cantidadPersonasMenores" class="form-control" type="number" value="0" name="cantidadPersonasMenores" required>
        </div>
      </div>
      <input type="submit" class="btn btn-default" value="Buscar">
    </form>
@endsection
