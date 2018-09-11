<!DOCTYPE html>
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" href="/css/personalizado.css">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <title>@yield('titulo') | Launching.com</title>
        <style>
            .heading {
                background-color: #a85f65; /* #57a09a */
                padding: 15px 0;
                box-shadow: 0 7px 0 0 #703f56; /* #8fc0a9; */
                margin-bottom: 50px;
                -webkit-filter: invert(100%);
                filter: invert(100%);
            }

            body {
                background-color: #faf3dd;
            }

            .container input[type=submit], .container button {
                background-color: #8fc0a9;
            }

            .carousel img {
                border-radius: .375rem;
            }

            .content {
                padding-bottom: 25vh;
            }
        </style>
    </head>
    <body>
        <div class="heading">
            <div class="container">
                @include('navbar.navbar')
            </div>
        </div>
        <div class="container content">
            <h1 class="titulo">@yield('titulo')</h1>
            @yield('contenido')
        </div>
    </body>

    <script src="/js/jquery-slim.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</html>
