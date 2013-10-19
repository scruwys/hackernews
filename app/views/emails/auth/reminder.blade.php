<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Password Reset</h2>

		<div>
			<p>To reset your password, complete this form: {{ URL::to('password/reset', array($token)) }}.</p>

			<p>Please note that this link is only valid for 24 hours.</p>
		</div>
	</body>
</html>