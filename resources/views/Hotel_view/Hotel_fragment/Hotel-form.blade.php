<div class = "form-group">
	{!! Form::label('name', 'Nombre del hotel ') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class = "form-group">
	{!! Form::label('name', 'Puntuacion del hotel') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class = "form-group">
	{!! Form::label('body', 'Descripción del hotel') !!}
	{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<div class = "form-group">
	{!! Form::label('short', 'Dirección del hotel') !!}
	{!! Form::text('short', null, ['class' => 'form-control']) !!}
</div>

<div class = "form-group">
	{!! Form::label('short', 'ciudad del hotel') !!}
	{!! Form::text('short', null, ['class' => 'form-control']) !!}
</div>

<div class = "form-group">
	{!! Form::submit('ENVIAR', ['class' => 'btn btn-primary']) !!}
</div>