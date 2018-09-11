@extends('layouts.formulario')

@section('titulo', 'Paquetes')

@section('formulario')
    <form action="/buscar_paquetes" method="post">
        @csrf
        <div class="form-group row">
            <label class="col-6" style="text-align:right">
                <input type="radio" name="tipo_paquete" value="hotel" onclick="mostrar_habitaciones()" checked required> Vuelo + Hotel
            </label>
            <label class="col-6">
                <input type="radio" name="tipo_paquete" value="auto" onclick="ocultar_habitaciones()" required> Vuelo + Auto
            </label>
        </div>

        <div class="form-group">
            <label for="ciudad_origen">Ciudad de origen</label>
            <input type="text" class="form-control" name="ciudad_origen" id="ciudad_origen" required>
        </div>

        <div class="form-group">
            <label for="ciudad_destino">Ciudad de destino</label>
            <input type="text" class="form-control" name="ciudad_destino" id="ciudad_destino" required>
        </div>

        <div class="form-group row">
            <div class="col-6">
                <label for="fecha_inicio">Fecha ida</label>
                <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" required>
            </div>
            <div class="col-6">
                <label for="fecha_fin">Fecha vuelta</label>
                <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" required>
            </div>
        </div>

        <div class="form-group row">
            <div id="form_habitaciones" class="col-6">
                <label for="habitaciones">Habitaciones</label>
                <input type="text" class="form-control" name="habitaciones" id="habitaciones" required="true">
            </div>
            <div class="col-6">
                <label for="personas">Personas<span id="span_habitaciones"> por habitación</span></label>
                <input type="text" class="form-control" name="personas" id="personas" required>
            </div>
        </div>

        <button type="submit" class="btn btn-default">Buscar</button>
    </form>

    <script>
        function ocultar_habitaciones() {
            document.getElementById('form_habitaciones').style.display = "none";
            document.getElementById('span_habitaciones').style.display = "none";
            document.getElementById('habitaciones').removeAttribute("required", "");
        }

        function mostrar_habitaciones() {
            document.getElementById('form_habitaciones').style.display = "block";
            document.getElementById('span_habitaciones').style.display = "inline";
            document.getElementById('habitaciones').setAttribute("required", "");
        }
    </script>
@endsection
