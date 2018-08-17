<div class = "form-group">
	{!! Form::label('title', 'Fecha del traslado ') !!}
	{!! Form::date('name', \Carbon\Carbon::now()) !!}
</div>

<div class = "form-group">
	{!! Form::label('body', 'Descripción del traslado') !!}
	{!! Form::textarea('body', $value=null, $attributes=['class' => 'form-control']) !!}
</div>

<div class = "form-group">
	{!! Form::label('short', 'Lugar de origen') !!}
	{!! Form::text('short', $value=null, $attributes=['class' => 'form-control']) !!}
</div>

<div class = "form-group">
	{!! Form::label('short', 'Lugar de destino') !!}
	{!! Form::text('short', $value=null, $attributes=['class' => 'form-control'])!!}
</div>

<div class = "form-group">
	{!! Form::label('short', 'Precio del viaje') !!}
	{!! Form::number('name', $value=null, $attributes=['class' => 'form-control']); !!}
</div>

<div class = "form-group">
	{!! Form::submit('ENVIAR', ['class' => 'btn btn-primary']) !!}
</div>