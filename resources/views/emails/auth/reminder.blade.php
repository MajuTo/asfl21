<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Réinitialisation du mot de passe</h2>

		<div>
			Pour réinitialiser votre mot de passe, allez sur: <a href="{{ URL::to('password/reset', array($token)) }}">Réinitialisation du mot de passe</a>.<br/>
			Ce lien expirera dans {{ Config::get('auth.reminder.expire', 60) }} minutes.
		</div>
	</body>
</html>