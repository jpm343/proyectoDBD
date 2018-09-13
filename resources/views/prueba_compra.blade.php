@if(isset($reserva))
	<?php
		//array_push($_SESSION['carro'], $reserva);
		$_SESSION['carro'][] = $reserva;
		//var_dump($_SESSION['carro']);
		header('Refresh: 1; URL=/carrito');
	?>
	Agregado al carro, redireccionando al inicio 1
@endif
@if(isset($reservaTraslado))
	<?php
		//array_push($_SESSION['carro'], $reserva);
		$_SESSION['carro'][] = $reservaTraslado;
		//var_dump($_SESSION['carro']);
		header('Refresh: 1; URL=/carrito');
	?>
	Agregado al carro, redireccionando al inicio 2
@endif