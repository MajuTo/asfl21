@extends('layouts.index')
@section('content')
    <div class="container">
        <div class="row" id="admin_form">

            <h1>Identification</h1>
            <div class="col-sm-6">
                {{ BootForm::openHorizontal(3, 9)->action(URL::route('sessions.store')) }}
                    {{ Form::token() }}
                    {{ BootForm::text('Pseudo', 'username') }}
                    {{ BootForm::password('Mot de passe', 'password') }}
                    {{ BootForm::submit('Envoyer') }}
                {{ BootForm::close() }}
            </div>
        </div>
    </div>
@stop