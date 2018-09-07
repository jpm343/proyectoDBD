<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href=/css/bootstrap.min.css>
    <link rel="stylesheet" href=/css/personalizado.css>
    <title>Launching.com</title>
</head>
<body>
    @include('navbar.navbar')
    <div class="container">
        <h2 style="margin: 50px 0">Resultados de la consulta</h2>
        <h3>Vuelos</h3>
        <table class="table table-stripped" style="margin-bottom:50px">
            <thead>
                <tr>
                    <th>Aerolínea</th>
                    <th>Fecha salida</th>
                    <th>Fecha llegada</th>
                    <th>Aeropuerto origen</th>
                    <th>Aeropuerto destino</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vuelos as $vuelo)
                <tr>
                    <td>{{ $auto->nombre_aerolinea }}</td>
                    <td>{{ $auto->fecha_salida }}</td>
                    <td>{{ $auto->fecha_llegada }}</td>
                    <td>{{ $auto->aeropuerto_origen }}</td>
                    <td>{{ $auto->aeropuerto_destino }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if (isset($autos))
        <h3>Autos</h3>
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>Patente</th>
                    <th>Modelo</th>
                    <th>Capacidad</th>
                    <th>Transmisión</th>
                    <th>Precio por día</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($autos as $auto)
                <tr>
                    <td>{{ $auto->patente_auto }}</td>
                    <td>{{ $auto->modelo_auto }}</td>
                    <td>{{ $auto->capacidad_auto }} personas</td>
                    <td>
                        @if ($auto->transmision_auto == 'A')
                        Automático
                        @else
                        Manual
                        @endif
                    </td>
                    <td>${{ $auto->precio_dia_auto }}</td>
                    <td>{{ $auto->descripcion_auto }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h3>Hoteles</h3>
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Puntuación</th>
                    <th>Dirección</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hoteles as $hotel)
                <tr>
                    <td>{{ $hotel->nombre_hotel }}</td>
                    <td>{{ $hotel->puntuacion_hotel }}</td>
                    <td>{{ $hotel->direccion_hotel }}</td>
                    <td>{{ $hotel->descripcion_hotel }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</body>

<script src="./js/jquery-slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>

</html>
