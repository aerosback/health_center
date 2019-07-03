<html>
    <head>
    	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <title>@yield('title')</title>
    </head>
    <body>
        @section('header')
        @if(Auth::check())
        <a href="{{ route('user.index') }}">Home</a>
        @endif
        
        @if(Session::has('flash_message'))
			<div style="color:green; border:1px solid #aaa; padding:4px; margin-top:10px">
				{{ Session::get('flash_message') }}
			</div>
		@endif

		@if($errors->any())
			<div style="color:red; border:1px solid #aaa; padding:4px; margin-top:10px">
				@foreach($errors->all() as $error)
					<p>{{ $error }}</p>
				@endforeach
			</div>
		@endif
		
        <div>			
            @yield('content')
        </div>
        
        <div style="text-align:center">
			Sistema de Directorio Medico Clinico @ 2019
		</div>	
    </body>
</html>
