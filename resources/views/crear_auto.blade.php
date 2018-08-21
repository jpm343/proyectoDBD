<html>
    <head>
        <title>Crear auto</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <form action="/api/autos" method= "post" style="display:flex;padding-top:5vh">
            @csrf
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="patente">Patente:</label>
                    <input type="text" class="form-control" name="patente_auto" id="patente" required>
                </div>

                <div class="form-group">
                    <label for="modelo">Modelo:</label>
                    <input type="text" class="form-control" name="modelo_auto" id="modelo" required>
                </div>

                <div class="form-group">
                    <label for="capacidad">Capacidad:</label>
                    <input type="text" class="form-control" name="capacidad_auto" id="capacidad" required>
                </div>

                <div class="form-group">
                    <label for="precio">Precio por día:</label>
                    <input type="text" class="form-control" name="precio_dia_auto" id="precio" required>
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea class="form-control" rows="4" id="descripcion" name="descripcion_auto" required></textarea>
                </div>

                <div class="form-group">
                    <label for="transmision">Transmisión:</label>
                    <div id="transmision">
                        <label>
                            <input type="radio" name="transmision_auto" value="A" required> Automático
                        </label><br />
                        <label>
                            <input type="radio" name="transmision_auto" value="M" required> Manual
                        </label>
                </div>

                <div class="form-group">
                    <label for="compania">Nombre de Compañía:</label>
                    <input type="text" class="form-control" name="nombre_compania" id="compania" required>
                </div>

                <div style="float:right">
                    <button type="submit" class="btn btn-default">Crear auto</button>
                </div>
            </div>
        </form>
    </body>
</html>
