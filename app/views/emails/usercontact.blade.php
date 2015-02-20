<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	body {
		
	}
	p {
		font-style: italic;
		margin-left: 50px;
	}
	</style>
</head>
<body>
Vous avez reçu un message de la part de {{ $input['name'] }} depuis le site ASFL21.
<p>
	{{ nl2br($input['message']) }}
</p>
</body>
</html>