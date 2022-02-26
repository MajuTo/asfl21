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
            .button_link {
                margin: auto;
                text-decoration: none;
                display: inline-block;
                outline: none;
                cursor: pointer;
                font-size: 16px;
                line-height: 20px;
                font-weight: 600;
                border-radius: 8px;
                padding: 14px 24px;
                border: none;
                transition: box-shadow 0.2s ease 0s, -ms-transform 0.1s ease 0s, -webkit-transform 0.1s ease 0s, transform 0.1s ease 0s;
                background: linear-gradient(to right, rgb(230, 30, 77) 0%, rgb(227, 28, 95) 50%, rgb(215, 4, 102) 100%);
                color: #fff;
            }
            .bold {
                font-weight: bold;
            }
        </style>
    </head>
    <body>
    <span class="bold">
        Suite à des modifications de l'hébergeur, vous devez désormais faire votre 1ère réponse aux emails reçus via le site ASFL par ce bouton et non de façon classique sinon votre réponse arrive directement sur la boite email de l'association.
    </span>
    <br>
    <a class="button_link" href="mailto:{{ $inputs['email'] }}?subject=Re:%20Contact depuis le site ASFL21&body={!! nl2br($inputs['message']) !!}">Répondre à ce message</a>
    <hr>
    Vous avez reçu un message de la part de {{ $inputs['name'] }} depuis le site ASFL21.
    <p>
        {{ nl2br($inputs['message']) }}
    </p>

    </body>
</html>
