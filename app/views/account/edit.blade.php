@extends('_layouts/master')

@section('content')
	<div class="row">
		{{ Form::open(array('url' => 'email', 'class' => 'small-8 column')) }}
			<fieldset id="settings">
				<legend>User Settings</legend>
				<div class="panel">
					<label>Username:</label> 
					<p>{{ Auth::user()->username }}</p>		
				</div>
				<div class="panel">
					<label>Joined on:</label>
					<p>{{ Auth::user()->created_at }}</p>						
				</div>
				<div class="panel">
					<label>Stories Posted:</label>
					<p>{{ Auth::user()->getStoryCount() }}</p>						
				</div>
				<div class="panel">
					<label>Email:</label>
					<div class="small-11">
						{{ Form::text('email', Auth::user()->email, array('placeholder' => 'Email Address')) }}				
					</div>
				</div>
				{{ Form::submit('Submit', array('class' => 'button right')) }}
			</fieldset>
		{{ Form::close() }}

		{{ Form::open(array('url' => 'password', 'class' => 'small-4 column')) }}
			<fieldset>
				<legend>Update Password</legend>

				{{ Form::password('current', array('placeholder' => 'Current Password')) }}
				{{ Form::password('new', array('placeholder' => 'New Password')) }}
			
				{{ Form::submit('Submit', array('class' => 'button right')) }}
			</fieldset>
		{{ Form::close() }}

		<div class="small-4 column">
			<fieldset id="myStories">
				<legend>Stories</legend>
				<p><a href="../stories?sort=favorited">favorited stories</a></p>
				<p><a href="../stories?sort=submitted">submitted stories</a></p>
			</fieldset>
		</div>

	</div>
@stop

