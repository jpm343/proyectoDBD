@extends('layouts.formulario')

@section('titulo', 'Traslados')

@section('formulario')
    <form action="{{route('Traslado_opciones')}}" method="GET">
        <div class="form-group row">
            <div class="col-6">
                <label>Fecha traslado</label>
                <input type="date" class="form-control" name="fecha_traslado" required/>
            </div>
            <div class="col-6">
                <label>Hora traslado</label>
                <input type="time" class="form-control" name="hora_traslado" required/>
            </div>
        </div>
        <div class="form-group">
            <label >Nombre del aeropuerto</label>
            <input type="text" class="form-control" name="aeropuerto_traslado" required/>
        </div>
        <div class="form-group">
            <label >Nombre del hotel</label>
            <input type="text" class="form-control" name="hotel_traslado" required/>
        </div>
        <div class="form-group" required>
            <label >¿Desde dónde hasta dónde?</label>
            <select class="custom-select custom-select-sm" name="sentido_traslado"/>
              <option selected>De aeropuerto a hotel</option>
              <option value="1">De hotel a aeropuerto</option>
            </select>
        </div>
        <div class="form-group">
            <label >Cantidad de pasajeros</label>
            <input class="form-control" type="number" min="1" step="1" value="1" name="cantidad_pasajeros" required/>
        </div>
        <div class="form-group">
            <label >Precio traslado máximo</label>
            <input class="form-control" type="number" min="0" step="1" value="0" name="precio_traslado" required/>
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
    </form>
@endsection
