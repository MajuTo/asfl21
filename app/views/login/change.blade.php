@extends('layouts.index')
@section('content')
    <div class="container">
        <div class="row" id="admin_form">

            <h1>Mot de Passe</h1>
            <h2>Bonjour {{ $user->username }}</h2>
            <p>Veuillez changer votre mot de passe.</p>
            <div class="col-sm-6">
                {{ BootForm::openHorizontal(3, 9)->put()->action(URL::route('change.update')) }}
                    {{ Form::token() }}
                    {{ BootForm::password('Mot de passe', 'password') }}
                    {{ BootForm::password('Confirmation', 'password_confirmation') }}
                    {{ BootForm::submit('Envoyer') }}
                {{ BootForm::close() }}
            </div>
        </div>
    </div>
@stop