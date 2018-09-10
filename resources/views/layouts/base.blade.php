<!DOCTYPE html>
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" href="/css/personalizado.css">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <title>@yield('titulo') | Launching.com</title>
    </head>
    <body>
        <div class="container">
            @include('navbar.navbar')
            <h1 class="titulo">@yield('titulo')</h1>
            @yield('contenido')
        </div>
    </body>

    <script src="/js/jquery-slim.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</html>
