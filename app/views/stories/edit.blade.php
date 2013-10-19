@extends('_layouts/master')

@section('content')
	<div class="row">
		{{ Form::open(array('url' => "stories/$story->id", 'method' => 'PUT')) }}
			<fieldset>
				<legend>Make a submission</legend>
				
				{{ Form::text('title', $story->title, array('placeholder' => 'Enter a title')) }}
				{{ Form::text('url', $story->url, array('placeholder' => 'Enter a url')) }}
				
				{{ Form::submit('Submit', array('class' => 'button right')) }}
			</fieldset>
		{{ Form::close() }}	
	</div>
@stop

