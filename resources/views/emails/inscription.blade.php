<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <style type="text/css">
        body {
            
        }
        p {
            margin-left: 50px;
        }
        </style>
    </head>
    <body>
        <h3>Bonjour, <strong>{{ $user->firstname }} {{ $user->name }}.</strong></h3>
        <p>Vous avez été inscrit sur le site des Sages Femmes Libérales de Côte d'Or: asfl21.fr</p>
        <p>Vouz pourrez modifier votre identifiant une fois votre inscription confirmée.</p>
        <p>Votre identifiant: <strong>{{ $user->username }}</strong></p>
        <p>Veuillez confirmer votre adresse email en cliquant sur le liens suivant:<a href="{{ route('confirmation', $confirmation) }}">confirmation</a></p>
    </body>
</html>