@extends('layouts.master')
@section('title', $title)

@section('sidebar')
    @parent
    // you can add something here
@endsection
@section('content')
    <div id="login">
        <h3 class="text-center text-white pt-5">Reset Form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        	{!! Form::open([
                        	'route' => 'password.email'
                        	]) !!}
                            <h3 class="text-center text-info">Reset Form</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Email:</label><br>
                                {!! Form::email('email', null, ['class' => 'form-control',]) !!}
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                {!! Form::submit('Submit', ['class' => 'btn btn-info btn-md']) !!}
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="{{ route('user.register') }}" class="text-info">Registrarse aqui</a>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection