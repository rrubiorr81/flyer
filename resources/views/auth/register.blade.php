@extends('layout.master')

@section('content')
    <h1>Register</h1>

    <hr/>

    @include('errors')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="/auth/register" method="POST">
                {!! csrf_field() !!}
                <div class='form-group'>
                	<label for='name'>Name:</label>
                	<input type='text' name='name' id='name' class='form-control' value='{{old('name')}}' required/>
                </div>

                <div class='form-group'>
                	<label for='email'>Email:</label>
                	<input type='text' name='email' id='email' class='form-control' value='{{old('email')}}' required/>
                </div>

                <div class='form-group'>
                	<label for='password'>Password:</label>
                	<input type='password' name='password' id='password' class='form-control' value='{{old('password')}}' required/>
                </div>

                <div class='form-group'>
                	<label for='password_confirmation'>Password Confirm:</label>
                	<input type='password' name='password_confirmation' id='password_confirmation' class='form-control' value='{{old('password_confirmation')}}' required/>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-default">Register</button>
                </div>
            </form>
        </div>
    </div>
@stop