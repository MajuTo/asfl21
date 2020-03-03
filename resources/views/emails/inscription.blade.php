<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        body {

        }
        .button {
            background-color: #E35582; /* Pink */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
        }
        p, h3 {
            margin-left: 50px;
        }
    </style>
</head>
<body>
    <h3>Bonjour, <strong>{{ $user->firstname }} {{ $user->name }}.</strong></h3>
    <p>Vous avez été inscrit sur le site des Sages Femmes Libérales de Côte d'Or: asfl21.fr</p>
    <p>Vouz pourrez modifier votre identifiant une fois votre inscription confirmée.</p>
    <p>Votre identifiant: <strong>{{ $user->username }}</strong></p>
    <p>Veuillez confirmer votre adresse email et définir votre mot de passe en cliquant sur le lien suivant (valide jusqu'au {{ $limit }}) :</p>
    <p><a class="button" href="{{ route('password.set', ['token' => $token, 'email' => $email]) }}">Confirmation</a></p>
</body>
</html>
