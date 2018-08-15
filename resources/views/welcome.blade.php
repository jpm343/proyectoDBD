<!DOCTYPE html>
<html>
<head>
    <title>Prueba</title>
</head>
<body>
    <form action="/action_page.php">
      
      <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email text-center" class="form-control" id="email">
      </div>
      
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password text-center" class="form-control" id="pwd">
      </div>
      
      <div class="form-group form-check">
        <label class="form-check-label text-center">
          <input class="form-check-input" type="checkbox"> Remember me
        </label>
      </div>
      
      <div class = "content">
        <div class = "links">
          <a href="{{route('Habitacion.index')}}"> Habitacion index</a>
          <a href="{{route('Hotel.index')}}"> Hotel index</a>
          <a href="{{route('Traslado.index')}}"> Traslado index</a>
        </div> 
      </div>

      <button type="submit" class="btn btn-primary text-center">Submit</button>
    </form>
</body>
</html>