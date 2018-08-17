<div class = "form-group">
	{!! Form::label('fecha_traslado', 'Fecha del traslado ') !!}
	{!! Form::date('fecha_traslado', \Carbon\Carbon::now()) !!}
</div>

<div class = "form-group">
	{!! Form::label('descripcion_traslado', 'Descripción del traslado') !!}
	{!! Form::textarea('descripcion_traslado', $value=null, $attributes=['class' => 'form-control']) !!}
</div>

<div class = "form-group">
	{!! Form::label('origen_traslado', 'Lugar de origen') !!}
	{!! Form::text('origen_traslado', $value=null, $attributes=['class' => 'form-control']) !!}
</div>

<div class = "form-group">
	{!! Form::label('destino_traslado', 'Lugar de destino') !!}
	{!! Form::text('destino_traslado', $value=null, $attributes=['class' => 'form-control'])!!}
</div>

<div class = "form-group">
	{!! Form::label('precio_traslado', 'Precio del viaje') !!}
	{!! Form::number('precio_traslado', $value=null, $attributes=['class' => 'form-control']); !!}
</div>

<div class = "form-group">
	{!! Form::submit('ENVIAR', ['class' => 'btn btn-primary']) !!}
</div>