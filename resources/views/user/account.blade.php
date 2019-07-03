
@extends('layouts.master')

@section('title', $title)

@section('sidebar')
    @parent
@endsection

@section('content')	
	<h1 style="text-align:center">{{ $title }}</h1>
	
	<p style="text-align:center">Pagina de Tu cuenta!!</p>
	@if(Auth::check())
		<p  style="text-align:center">
			<a href="{{ route('user.medics') }}">Directorio Medico</a> |
			<a href="{{ route('user.logout') }}">Logout</a>
		</p>
	@else
	<p  style="text-align:center">
		<a href="{{ route('user.login') }}">Login</a> | 
		<a href="{{ route('user.register') }}">Registrarse</a>
	</p>
	@endif		
@endsection
