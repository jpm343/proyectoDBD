@extends('layouts.formulario')

@section('titulo', 'Actividades')

@section('formulario')
    <form action="/actividades_search" method="get">
    @csrf
        <div class="col md-12-3">
            <label for="ciudadDestino">Destino </label>
            <input type="text" name="ciudad_destino" class="form-control" id="ciudadDestino" placeholder="Ciudad" required>
            <br>
            <button class="btn btn-default" type="submit">Buscar</button>
        </div>
    </form>
@endsection
