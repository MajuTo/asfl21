<!DOCTYPE html>
<html lang="fr">
    <head>
        <title></title>
        <style>
            body {

            }
            p {
                font-style: italic;
                margin-left: 50px;
            }
        </style>
    </head>
    <body>
    Vous avez reçu un message de la part de {{ $inputs['name'] }} depuis le site ASFL21.
    <p>
        {{ nl2br($inputs['message']) }}
    </p>

    </body>
</html>
