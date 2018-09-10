@extends('layouts.formulario')

@section('titulo', 'Autos')

@section('formulario')
    <form action="/buscar_autos" method="post">
        @csrf
        <div class="form-group">
            <label for="ciudad_inicio">Ciudad de arriendo</label>
            <input type="text" class="form-control" name="ciudad_inicio" id="ciudad_inicio" required>
        </div>

        <div class="form-group">
            <label for="ciudad_fin">Ciudad de devolución</label>
            <input type="text" class="form-control" name="ciudad_fin" id="ciudad_fin" required>
        </div>

        <div class="row">
            <div class="form-group col-6">
                <label for="fecha_inicio">Fecha de arriendo</label>
                <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" required>
            </div>

            <div class="form-group col-6">
                <label for="fecha_fin">Fecha de devolución</label>
                <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" required>
            </div>
        </div>

        <button type="submit" class="btn btn-default">Buscar</button>
    </form>
@endsection
