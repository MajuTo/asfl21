@extends('layouts.index')
@section('content')
    <div class="container content-container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="animate-page-title">Identification</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                {{ BootForm::openHorizontal(3, 9)->action(URL::route('sessions.store')) }}
                    {{ Form::token() }}
                    {{ BootForm::text('Pseudo', 'username') }}
                    {{ BootForm::password('Mot de passe', 'password') }}
                    {{ BootForm::submit('Envoyer', 'pull-right btn-pink') }}
                {{ BootForm::close() }}
            </div>
        </div>
    </div>
@stop