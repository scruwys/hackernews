@if (count($errors->all()) > 0)
<div data-alert class="alert-box alert alert-small">
	{{ $errors->first() }}
	<a href="#" class="close">&times;</a>
</div>
@endif

@if ($message = Session::get('success'))
<div data-alert class="alert-box success alert-small">
	{{ $message }}
	<a href="#" class="close">&times;</a>
</div>
@endif

@if ($message = Session::get('error'))
<div data-alert class="alert-box alert alert-small">
	{{ $message }}
	<a href="#" class="close">&times;</a>
</div>
@endif