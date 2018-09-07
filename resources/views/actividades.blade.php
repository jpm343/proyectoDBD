<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href=/css/bootstrap.min.css>
    <link rel="stylesheet" href=  /css/personalizado.css>
    <title>Reserva actividades</title>
</head>
<body>
    <div class="container">
        @include('navbar.navbar')
        <div class="row align-items-center">
            <div class="col-8">
                @include('carousel.carousel')
            </div>
            <div class="col-4">
                <form action="/actividades_search" method="get">
                @csrf
                    <div class="col md-12-3">
                        <label for="ciudadDestino">Destino </label>
                        <input type="text" name="ciudad_destino" class="form-control" id="ciudadDestino" placeholder="Ciudad" required>
                        <br>
                        <button class="btn btn-default" type="submit">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script src="/js/jquery-slim.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

</html>
