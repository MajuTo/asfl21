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
        Bonjour, {{ $inputs['name']}} vous a contacté depuis le site internet.

        <p>{!! nl2br(e($inputs['message'])) !!}</p>
    </body>
</html>
