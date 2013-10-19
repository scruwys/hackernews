@extends('_layouts/master')

@section('content')
	<div class="row">
		<table id="feed" class="large-12">
		  <thead>
		    <tr>
		      <th></th>
		      <th>
					<dl class="sub-nav">
					  <dd id="popular"><a href="/stories?sort=popular">Popular</a></dd>
					  <dd id="newest"><a href="/stories?sort=newest">Newest</a></dd>
					  <dd id="submitted"><a href="/stories?sort=submitted">Submitted</a></dd>
					</dl>	      	
		      </th>
		      <th>
		      	{{ Form::open(array('url' => 'stories/search', 'class' => 'no-margin')) }}
			     	{{ Form::text('search', null, array('id' => 'search', 'placeholder' => 'search', 'ng-model' => 'search')) }}
			    {{ Form::close() }}
		      </th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($stories as $story)
			    <tr>
			      <td>
			      	@if ( $story->author != Auth::user()->username && !$story->hasVoted() )
			      		{{ Form::open(array('url' => 'stories/vote', 'class' => 'no-margin')) }}
			      			<input type="image" src="assets/img/arrow.gif" alt="vote">
			      			<input type="hidden" name="id" value="{{ $story->id }}">
				    	{{ Form::close() }}
				    @endif
			      </td>
			      <td>
						<p>
							<a href="{{ $story->url }}">{{ $story->title }}</a> <small>({{ $story->displayURL() }})</small>
						</p>
						<small>
							{{ $story->points }} points by {{ $story->author }} | {{ $story->getStoryLife() }} | 
							<a href="/stories/{{ $story->id }}/comments">{{ $story->getCommentCount() }} comments</a>
						</small>
			      </td>
			      <td>
			      	@if ( $story->author == Auth::user()->username )
			      		<div class="right">
							<a href="stories/{{ $story->id }}/edit" class="label success">Edit</a>
							{{ Form::open(array('url' => "stories/$story->id", 'method' => 'DELETE', 'class' => 'inline-block no-margin', 'onsubmit' => 'return confirm(\'Are you sure you want to delete this story?\')')) }}
					      		{{ Form::submit('Delete', array('class' => 'label alert')) }}
					      	{{ Form::close() }}
				      	</div>
			      	@endif
			      </td>
			    </tr>
			@endforeach
		  </tbody>
		</table>

		<div class="right">
			<ul class="pagination">
				{{ $paginator->appends(array('sort' => Input::get('sort')))->links(); }}
			</ul>		
		</div>
	</div>

@stop

@section('javascript')
<script>
	$(function() {

		var active = getUrlVars()['sort'] || 'popular'; 

		$("#" + active).addClass('active');

		function getUrlVars() {

			var vars = {};
			win = window.location.href;

			var parts = win.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
				vars[key] = value;
			});

			return vars;
		}
	});
</script>
@stop