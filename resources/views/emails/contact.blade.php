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
Bonjour, {{ $inputs['name']}} vous a contacté depuis le site internet.

<p>{{ nl2br($inputs['message']) }}</p>
</body>
</html>