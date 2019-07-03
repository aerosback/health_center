
@extends('layouts.master')

@section('title', $title)

@section('sidebar')
    @parent
@endsection

@section('content')	
	<h1 style="text-align:center">{{ $title }}</h1>
	@if(Auth::check())
	<div class="container">
		<table class="table table-hover">
		  <thead class="thead-light">
		    <tr>
		      <th>Doctor | Apellidos</th>
		      <th>Doctor | Nombres</th>
		      <th>Especialidad</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($entries as $entry)
		    <tr>
		      <th scope="row">{{ $entry->doctor->last_name }}</th>
		      <td>{{ $entry->doctor->first_name }}</td>
		      <td>{{ $entry->specialty->name }}</td>
		    </tr>
		    @endforeach         
		  </tbody>
		</table>
    </div>	
	<p  style="text-align:center">
		<a href="{{ route('user.account') }}">Mi Cuenta</a> |
		<a href="{{ route('user.logout') }}">Logout</a>
	</p>
	@else
	<p  style="text-align:center">
		<a href="{{ route('user.login') }}">Login</a> | 
		<a href="{{ route('user.register') }}">Registrarse</a>
	</p>
	@endif
@endsection
