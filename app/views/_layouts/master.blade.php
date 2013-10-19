<!DOCTYPE html>
<html ng-app>
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Fosh.us</title>

<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>
  {{ HTML::style('/assets/css/normalize.css'); }}
  {{ HTML::style('/assets/css/foundation.min.css'); }}
  {{ HTML::style('/assets/css/main.css'); }}

  {{ HTML::script('/assets/js/vendor/custom.modernizr.js'); }}
</head>
<body>

	<div class="row">
		<nav class="top-bar">
				<ul class="title-area">
				<!-- Title Area -->
			    <li class="name">
			      <h1><a href="/stories">fosh</a></h1>
			    </li>
				<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
				</ul>
			<section class="top-bar-section">
				<!-- Left Nav Section -->
				<ul class="right">
			  		<li class="divider"></li>
			  		<li><a href="/stories/create">submit</a></li>
			  		<li class="divider"></li>
			  		<li><a href="/account/settings">settings</a></li>
			  		<li class="divider"></li>
			  		<li><a href="/logout">logout</a></li>
			  		<li class="divider"></li>
				</ul>
			</section>
		</nav>
	</div>

	@include('_partials.notifications.large')

	@yield('content')

	<footer class="row">
		<div class="large-12 columns">
		  <hr />
		  <div class="row">
		    <div class="large-6 columns">
		      <p>&copy; Copyright no one at all. Go to town.</p>
		    </div>
		    <div class="large-6 columns">
		      <ul class="inline-list right">
		        <li><a href="#">Link 1</a></li>
		        <li><a href="#">Link 2</a></li>
		        <li><a href="#">Link 3</a></li>
		        <li><a href="#">Link 4</a></li>
		      </ul>
		    </div>
		  </div>
		</div>
	</footer>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	{{ HTML::script('/assets/js/foundation.min.js'); }}
	<script> $(document).foundation(); </script>
	@yield('javascript')
</body>
</html>

