@if(isset($reserva))
	<?php
		//array_push($_SESSION['carro'], $reserva);
		$_SESSION['carro'][] = $reserva;
		//var_dump($_SESSION['carro']);
		header('Refresh: 1; URL=/');
	?>
	Agregado al carro, redireccionando al inicio
@endif