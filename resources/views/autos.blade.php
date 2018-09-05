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
            <div class="dos-columnas col-md-4 col-sm-12" style="padding: 20% 0">
                <form action="/FIXMEFIXMEFIXME" method= "post">
                    @csrf
                    <div class="form-group">
                        <label for="lugar-inicio">Lugar de entrega</label>
                        <input type="text" class="form-control" name="lugar-inicio" id="lugar-inicio" required>
                    </div>

                    <div class="form-group">
                        <label for="lugar-fin">Lugar de devolución</label>
                        <input type="text" class="form-control" name="lugar-fin" id="lugar-fin" required>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="fecha-inicio">Fecha de arriendo</label>
                            <input type="text" class="form-control" name="fecha-inicio" id="fecha-inicio" required>
                        </div>

                        <div class="form-group col-6">
                            <label for="fecha-fin">Fecha de devolución</label>
                            <input type="text" class="form-control" name="fecha-fin" id="fecha-fin" required>
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
