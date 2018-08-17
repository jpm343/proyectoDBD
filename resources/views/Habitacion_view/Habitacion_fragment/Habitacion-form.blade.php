<div class = "form-group">
	{!! Form::label('numero_habitacion', 'Número de la habitacion') !!}
	{!! Form::number('numero_habitacion', $value = null) !!}
</div>

<div class = "form-group">
	{!! Form::label('capacidad_habitacion', 'Capacidad de la habitacion') !!}
	{!! Form::number('capacidad_habitacion', $value = null) !!}
</div>

<div class = "form-group">
	{!! Form::label('precio_noche_habitacion', 'precio de la habitacion') !!}	
	{!! Form::number('precio_noche_habitacion', $value = null) !!}
</div>

<div class = "form-group">
	{!! Form::label('tipo_habitacion', 'tipo de habitacion') !!}
	{!! Form::text('tipo_habitacion', $value=null, ['class' => 'form-control']) !!}
</div>

<div class = "form-group">
	{!! Form::submit('ENVIAR', ['class' => 'btn btn-primary']) !!}
</div>