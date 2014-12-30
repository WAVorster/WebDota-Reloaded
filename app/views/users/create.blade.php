@extends('layouts.default')
@section('body')
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h2>Register</h2>
		<ul>
		@foreach ($errors->all() as $message)
			<li>{{$message}}</li>
		@endforeach
		</ul>
		{{ Form::open(array('route' => array('user.store'), 'method' => 'post')) }}
		<div class="form-group">
			{{Form::label('first_name','First Name')}}
			{{Form::text('first_name', null,array('class' => 'form-control'))}}
		</div>
		<div class="form-group">
			{{Form::label('last_name','Last Name')}}
			{{Form::text('last_name', null,array('class' => 'form-control'))}}
		</div>
		<div class="form-group">
			{{Form::label('email','Email')}}
			{{Form::text('email', null,array('class' => 'form-control'))}}
		</div>
		<div class="form-group">
			{{Form::label('password','Password')}}
			{{Form::password('password',array('class' => 'form-control'))}}
		</div>
		<div class="form-group">
			{{Form::label('password_confirmation','Password Confirm')}}
			{{Form::password('password_confirmation',array('class' => 'form-control'))}}
		</div>
		{{Form::submit('Register', array('class' => 'btn btn-primary'))}}
		{{ Form::close() }}
	</div>
</div>
@stop
