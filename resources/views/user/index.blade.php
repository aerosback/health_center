
@extends('layouts.master')

@section('title', $title)

@section('sidebar')
    @parent
    // you can add something here
@endsection

@section('content')	
	<h1 style="text-align:center">{{ $title }}</h1>
	
	@if(Auth::check())
		<h3 style="text-align:center">Bienvenido:</h3>
		
		<p  style="text-align:center">
			Nombre: {{ Auth::user()->name }}<br>
			Email: {{ Auth::user()->email }}<br>
			
			<a href="{{ route('user.account') }}">Mi Cuenta</a> |
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
