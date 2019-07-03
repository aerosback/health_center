
@extends('layouts.master')

@section('title', $title)

@section('sidebar')
    @parent
    // you can add something here
@endsection

@section('content')

	<h1 style="text-align:center">{{ $title }}</h1>

	{!! Form::open([
		'route' => 'user.store'
	]) !!}

	<div style="margin-left:30%">
	<table>
		<tr>
			<td>{!! Form::label('first_name', 'Nombres', ['class' => 'control-label']) !!}</td>
			<td>{!! Form::text('first_name', null, ['class' => 'form-control', 'size' => 40, ]) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('last_name', 'Apellidos', ['class' => 'control-label']) !!}</td>
			<td>{!! Form::text('last_name', null, ['class' => 'form-control', 'size' => 40, ]) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('email', 'Email', ['class' => 'control-label']) !!}</td>
			<td>{!! Form::email('email', null, ['class' => 'form-control', 'size' => 40, ]) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('password', 'Password', ['class' => 'control-label']) !!}</td>
			<td>{!! Form::password('password', null, ['class' => 'form-control', 'size' => 64, ]) !!}</td>
		</tr>		
		<tr>
			<td>{!! Form::label('password_confirmation', 'Confirmar Password', ['class' => 'control-label']) !!}</td>
			<td>{!! Form::password('password_confirmation', null, ['class' => 'form-control', 'size' => 64, ]) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('phone_number', 'Telefono', ['class' => 'control-label']) !!}</td>
			<td>{!! Form::text('phone_number', null, ['class' => 'form-control', 'size' => 40, ]) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('sex', 'Sexo', ['class' => 'control-label']) !!}</td>
			<td>{!! Form::select('sex', array('0' => 'Masculino', '1' => 'Femenino'), ['class' => 'form-control',]) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('birth_date', 'Fecha de Nacimiento', ['class' => 'control-label']) !!}</td>
			<td>{!! Form::date('birth_date', null, ['class' => 'form-control', 'size' => 40, ]) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('idoc_type', 'Tipo de Documento', ['class' => 'control-label']) !!}</td>
			<td>{!! Form::select('idoc_type', $items, null, ['class' => 'form-control', ]) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('idoc_code', 'Codigo de Documento', ['class' => 'control-label']) !!}</td>
			<td>{!! Form::text('idoc_code', null, ['class' => 'form-control', 'size' => 40, ]) !!}</td>
		</tr>			
		<tr>
			<td></td>
			<td>{!! Form::submit('Submit', ['class' => 'btn btn-submit']) !!}</td>
		</tr>
	</table>		
	</div>
	{!! Form::close() !!}

@endsection
