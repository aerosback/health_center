
@extends('layouts.master')

@section('title', $title)

@section('sidebar')
    @parent
    // you can add something here
@endsection

@section('content')

	<h1 style="text-align:center">{{ $title }}</h1>

	{!! Form::open([
		'route' => 'password.reset'
	]) !!}

	<div style="margin-left:30%">
	<table>
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
			<td></td>
			<td>{!! Form::submit('Submit', ['class' => 'btn btn-submit']) !!}</td>
		</tr>
	</table>		
	</div>
	{!! Form::close() !!}

@endsection