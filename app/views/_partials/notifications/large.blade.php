@if (count($errors->all()) > 0)
<div class="row">
	<div data-alert class="alert-box alert">
		{{ $errors->first() }}
		<a href="#" class="close">&times;</a>
	</div>
</div>
@endif

@if ($message = Session::get('success'))
<div class="row">
	<div data-alert class="alert-box success">
		{{ $message }}
		<a href="#" class="close">&times;</a>
	</div>
</div>
@endif

@if ($message = Session::get('error'))
<div class="row">
	<div data-alert class="alert-box alert">
		{{ $message }}
		<a href="#" class="close">&times;</a>
	</div>
</div>
@endif