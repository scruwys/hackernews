<!DOCTYPE html>
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Fosh.us</title>

  {{ HTML::style('/assets/css/normalize.css'); }}
  {{ HTML::style('/assets/css/foundation.min.css'); }}
  {{ HTML::style('/assets/css/main.css'); }}
  <style>
	body {
	  padding-top: 40px;
      padding-bottom: 40px;
	}  
  </style>
  {{ HTML::script('/assets/js/vendor/custom.modernizr.js'); }}
</head>
<body>

  @include('_partials.notifications.short')

	@yield('content')

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	{{ HTML::script('/assets/js/foundation.min.js'); }}
	<script> $(document).foundation(); </script>
</body>
</html>

