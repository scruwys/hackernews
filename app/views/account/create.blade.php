@extends('_layouts/exterior')

@section('content')
	{{ Form::open(array('url' => '/account/create')) }}
		<div class="row">
			<fieldset class="form">
				<legend>Register</legend>
				
				{{ Form::text('username', null, array('placeholder' => 'Username')) }}
				{{ Form::text('email', null, array('placeholder' => 'Email')) }}
				{{ Form::password('password', array('placeholder' => 'Password')) }}
				{{ Form::password('confirm', array('placeholder' => 'Confirm Password')) }}
				
				{{ Form::submit('Register', array('class' => 'button right')) }}
				
				<br />
				
				<small><a href="/login">Back to login page</a></small>
			</fieldset>
		</div>
	{{ Form::close() }}	
@stop
