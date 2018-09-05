<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href=./css/bootstrap.min.css>
    <link rel="stylesheet" href=  ./css/personalizado.css>
    <title>Launching.com</title>
</head>
<body>
    @include('navbar.navbar')
    <div class="container">
        <div class="row align-items-center">
            <div class="dos-columnas col-8" align="left">
                @include('carousel.carousel')
            </div>
            <div class="dos-columnas col-md-4 col-sm-12 formulario">
                <form action="/autos/buscar" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="ciudad_inicio">Lugar de entrega</label>
                        <input type="text" class="form-control" name="ciudad_inicio" id="ciudad_inicio" required>
                    </div>

                    <div class="form-group">
                        <label for="ciudad_fin">Lugar de devolución</label>
                        <input type="text" class="form-control" name="ciudad_fin" id="ciudad_fin" required>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="fecha_inicio">Fecha de arriendo</label>
                            <input type="text" class="form-control" name="fecha_inicio" id="fecha_inicio" required>
                        </div>

                        <div class="form-group col-6">
                            <label for="fecha_fin">Fecha de devolución</label>
                            <input type="text" class="form-control" name="fecha_fin" id="fecha_fin" required>
                        </div>
                    </div>

                    <div style="float:right col-6">
                        <button type="submit" class="btn btn-default">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script src="./js/jquery-slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>

</html>
