@extends('_layouts/master')

@section('content')
	<div class="row">
		{{ Form::open(array('url' => 'stories')) }}
			<fieldset>
				<legend>Make a submission</legend>
				
				{{ Form::text('title', '', array('placeholder' => 'Enter a title')) }}
				{{ Form::text('url', '', array('placeholder' => 'Enter a url')) }}
				
				{{ Form::submit('Submit', array('class' => 'button right')) }}
			</fieldset>
		{{ Form::close() }}	
	</div>
@stop

