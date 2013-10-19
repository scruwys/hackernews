<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Account Activation</h2>

		<div>
			To reset your password, complete this form: {{ URL::to('password/reset', array($token)) }}.
		</div>
	</body>
</html>

Hey {{ $first }}!

<br />

<p>Welcome to Rideless. Before you can get started, we need to verify your account. 
	You can do this by clicking the link below:</p>

<p><a href="http://rideless.gopagoda.com/activate/{{ $id }}/{{ $key }}">http://rideless.gopagoda.com/activate/{{ $id }}/{{ $key }}</a></p>

Sincerely,
<br />
The Rideless Team
