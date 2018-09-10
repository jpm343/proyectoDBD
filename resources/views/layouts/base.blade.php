<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" href="/css/personalizado.css">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <title>@yield('titulo') | Launching.com</title>
    </head>
    <body style="background: #f88171">
        <div class="container" style="background: #f8c471">
            @include('navbar.navbar')   
            <h1 class="titulo">@yield('titulo')</h1>
            @yield('contenido')
        </div>
    </body>

    <script src="/js/jquery-slim.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</html>
