@extends('layouts.formulario')

@section('titulo', 'Actividades')

@section('formulario')
    <form action="/actividades_search" method="get">
    @csrf
        <div class="form-group">
            <label for="ciudadDestino">Ciudad de destino</label>
            <input type="text" name="ciudad_destino" class="form-control" id="ciudadDestino" required>
        </div>
        <button class="btn btn-default" type="submit">Buscar</button>
    </form>
@endsection
