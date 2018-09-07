<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/personalizado.css">
    <title>Launching.com</title>
</head>
<body>
    @include('navbar.navbar')
    <div class="container">
        <h2 style="margin: 50px 0">Resultados de la consulta</h2>
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
                @foreach($autos as $auto)
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
    </div>
</body>

<script src="/js/jquery-slim.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

</html>
