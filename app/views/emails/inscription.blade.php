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
    <p>Bonjour, <strong>{{ $user->firstname }} {{ $user->name }}.</strong></p>
    <p>Vous avez été inscrit sur le site des Sages Femmes Libérales de Côte d'Or: asfl21.fr</p>
    <p>Vouz pourrez modifier votre identifiant une fois votre inscription confirmée.</p>
    <p>Veuillez confirmer votre adresse email en cliquant sur le liens suivant:</p>
    <p>Votre identifiant: {{ $user->username }}</p>
    <!-- <p><a href="registration/verify/{{ $confirmation }}">www.asfl21.fr/inscription/confirmation</a></p> -->
    <p><a href="inscription/verification/{{ $confirmation }}">inscription/verification/{{ $confirmation }}</a></p>
</body>
</html>