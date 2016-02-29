@section('title')
    <title>ASFL21, Espace Pro</title>
@stop
@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="animate-page-title">Identification</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <img class="img-responsive img-rounded" src="{{ asset('assets/img/pregnant-collection/feet-619534_1280.jpg') }}" alt="pieds de bébé">
        </div>
        <div class="col-sm-6">
            <div>
                {{ link_to('/password/remind', 'Mot de passe oublié?', ['class' => 'pull-right']) }}
            </div>
            <div id="email-reminder">
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