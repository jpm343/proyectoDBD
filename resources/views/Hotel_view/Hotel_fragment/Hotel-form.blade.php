<div class = "form-group">
	{!! Form::label('nombre_hotel', 'Nombre del hotel ') !!}
	{!! Form::text('nombre_hotel', null, ['class' => 'form-control']) !!}
</div>

<div class = "form-group">
	{!! Form::label('puntuacion_hotel', 'Puntuacion del hotel') !!}
	{!! Form::number('puntuacion_hotel', null, ['class' => 'form-control']) !!}
</div>

<div class = "form-group">
	{!! Form::label('descripcion_hotel', 'Descripción del hotel') !!}
	{!! Form::textarea('descripcion_hotel', null, ['class' => 'form-control']) !!}
</div>

<div class = "form-group">
	{!! Form::label('direccion_hotel', 'Dirección del hotel') !!}
	{!! Form::text('direccion_hotel', null, ['class' => 'form-control']) !!}
</div>

<div class = "form-group">
	{!! Form::label('ciudad_hotel', 'ciudad del hotel') !!}
	{!! Form::text('ciudad_hotel', null, ['class' => 'form-control']) !!}
</div>

<div class = "form-group">
	{!! Form::submit('ENVIAR', ['class' => 'btn btn-primary']) !!}
</div>