@extends('_layouts/exterior')

@section('content')
  {{ Form::open(array('url' => 'login')) }}
    <div class="row">
      <fieldset class="form">
        <legend>Sign In</legend>

        {{ Form::text('username', null, array('class' => 'input-block-level', 'placeholder' => 'Username')) }}
        {{ Form::password('password', array('class' => 'input-block-level', 'placeholder' => 'Password')) }}
    
        <label class="checkbox">
          <input type="checkbox" name="remember" value="true"> Remember me &nbsp; <a href="password/reset">forgot password?</a>
        </label>

        {{ Form::submit('Sign In', array('class' => 'button right'))}}
        
        <br />
        <small><a href="/account/create">Create an account</a></small>
      </fieldset>
    </div>
  {{ Form::close() }} 
@stop