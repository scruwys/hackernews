@extends('_layouts/exterior')

@section('content')
  {{ Form::open(array('url' => 'password/reset')) }}
    <div class="row">
      <fieldset class="form">
        <legend>Password Recovery</legend>

        {{ Form::text('email', null, array('class' => 'input-block-level', 'placeholder' => 'Email')) }}
    
        {{ Form::submit('Submit', array('class' => 'button right'))}}
        
        <br />

        <small><a href="/login">Back to login page</a></small>

      </fieldset>
    </div>
  {{ Form::close() }} 
@stop