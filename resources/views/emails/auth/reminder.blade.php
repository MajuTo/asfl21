<!DOCTYPE html>
<html lang="fr-FR">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Réinitialisation du mot de passe</h2>
		<div>
            Vous recevez ce message car une demande de réinitialisation de mot de passe a été demandée pour votre compte.<br>
			Pour réinitialiser votre mot de passe, rendez vous sur ce lien : <a href="{{ route('password.reset', ['token' => $token, 'email' => $email]) }}">Réinitialisation du mot de passe</a>.<br/>
			Ce lien expirera dans {{ Config::get('auth.reminder.expire', 60) }} minutes.
		</div>
	</body>
</html>
