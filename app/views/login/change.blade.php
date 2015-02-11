@extends('layouts.index')
@section('content')
    <div class="container content-container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="animate-page-title">Mot de Passe</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <h3>Bonjour {{ $user->username }}</h3>
                <p>Veuillez changer votre mot de passe.</p>
                    {{ BootForm::openHorizontal(3, 9)->put()->action(URL::route('sessions.update')) }}
                        {{ Form::token() }}
                        {{ BootForm::password('Mot de passe', 'password') }}
                        {{ BootForm::password('Confirmation', 'password_confirmation') }}
                        {{ BootForm::submit('Envoyer', 'pull-right btn-pink') }}
                    {{ BootForm::close() }}
            </div>
        </div>
    </div>
@stop