@extends('_layouts/exterior')

@section('content')
  {{ Form::open(array('route' => array('password.update', $token))) }}
    <div class="row">
      <fieldset class="form">
        <legend>Password Recovery</legend>

        {{ Form::password('password', array('class' => 'input-block-level', 'placeholder' => 'Password')) }}
        {{ Form::password('password_confirmation', array('class' => 'input-block-level', 'placeholder' => 'Confirm')) }}
        
        {{ Form::hidden('token', $token) }}
        
        {{ Form::submit('Submit', array('class' => 'button right'))}}
        
        <br />

        <small><a href="/login">Back to login page</a></small>

      </fieldset>
    </div>
  {{ Form::close() }} 
@stop