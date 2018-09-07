<!DOCTYPE html>
<html lang="es"> 
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href=/css/bootstrap.min.css>
    <link rel="stylesheet" href=/css/personalizado.css>
    <title> Traslados </title>
</head>
<body>
<div class="container">
    @include('navbar.navbar')
    <div>
        <div class= "row align-items-center">
            <div class="col-8">
                @include('carousel.carousel')
            </div>
            <div class="col-4">
                <form action="{{route('Traslado_opciones')}}" method="GET">
                    <div class="form-group" align="left" > 
                        <label>Fecha traslado</label>
                        <input type="date" class="form-control" name="fecha_traslado" required/>
                    </div>
                    <div class="form-group" align="left" > 
                        <label>Hora traslado</label>
                        <input type="time" class="form-control" name="hora_traslado" required/>
                    </div>
                    <div class="form-group" align="left" >
                        <label >Nombre del aeropuerto</label>
                        <input type="text" class="form-control" name="aeropuerto_traslado" required/>
                    </div>
                    <div class="form-group" align="left" >
                        <label >Nombre del hotel</label>
                        <input type="text" class="form-control" name="hotel_traslado" required/>
                    </div>
                    <div class="form-group" align="left" required>
                        <label >¿Desde dónde hasta dónde?</label>
                        <select class="custom-select custom-select-sm" name="sentido_traslado"/>
                          <option selected >De aeropuerto a hotel</option>
                          <option value="1">De hotel a aeropuerto</option>
                        </select>
                    </div>
                    <div class="form-group" align="left" >
                        <label >Cantidad de pasajeros</label>
                        <input class="form-control" type="number" min="1" step="1" value="1" name="cantidad_pasajeros" required/>
                    </div>
                    <div class="form-group" align="left" >
                        <label >Precio traslado máximo</label>
                        <input class="form-control" type="number" min="0" step="1" value="0" name="precio_traslado" required/>
                    </div>
                    <button type="submit" class="btn btn-default">Buscar</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

<script src="/js/jquery-slim.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

</html>
