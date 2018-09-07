<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/personalizado.css">
    <title>Launching.com</title>
</head>
<body>
    <div class="container">
        @include('navbar.navbar')
        <div class="row align-items-center">
            <div class="col-8">
                @include('carousel.carousel')
            </div>
            <div class="col-4">
                <form action="/buscar_autos" method="post">
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
                            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" required>
                        </div>

                        <div class="form-group col-6">
                            <label for="fecha_fin">Fecha de devolución</label>
                            <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-default">Buscar</button>
                </form>
            </div>
        </div>
    </div>
</body>

<script src="/js/jquery-slim.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

</html>
