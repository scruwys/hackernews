@extends('_layouts/master')

@section('content')

	<div class="row">
		<fieldset>
			<legend>{{ $story->title}} (<a href="{{ $story->url }}">{{ $story->displayURL() }}</a>)</legend>
			
			{{ Form::open(array('url' => '/stories/'.$story->id.'/comments ')) }}

				{{ Form::textarea('body') }}

				<input type="hidden" name="story" value="{{ $story->id}}">
			
				{{ Form::submit('Submit', array('class' => 'button')) }}
			{{ Form::close() }}	

			<hr />

			@foreach($comments as $comment)
				<div style="width: 650px">
					<p style="font-size: 12px; margin-bottom: 5px"><b>scruwys</b> | {{ $comment->getCommentLife() }}</p>
					<p style="font-size: 12px">{{ $comment->body }}</p>
				</div>
			@endforeach

		</fieldset>
	</div>

@stop