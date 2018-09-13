@extends('layouts.formulario')

@section('titulo', 'Autos')

@section('formulario')
    <form action="/buscar_autos" method="post">
        @csrf
        <div class="form-group">
            <label for="ciudad">Ciudad de arriendo</label>
            <input type="text" class="form-control" name="ciudad" id="ciudad" required>
        </div>

        <div class="row">
            <div class="form-group col-6">
                <label for="fecha_arriendo">Fecha de arriendo</label>
                <input type="date" class="form-control" name="fecha_arriendo" id="fecha_arriendo" required>
            </div>

            <div class="form-group col-6">
                <label for="fecha_devolucion">Fecha de devolución</label>
                <input type="date" class="form-control" name="fecha_devolucion" id="fecha_devolucion" required>
            </div>
        </div>

        <button type="submit" class="btn btn-default">Buscar</button>
    </form>
@endsection
