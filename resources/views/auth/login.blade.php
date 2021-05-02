@extends('auth.layout')
@section('auth.title')
    <h1 class="animate-page-title">Identification</h1>
@stop
@section('auth.content')
    <div class="overflow-auto text-right">
        {{ link_to(route('password.request'), 'Mot de passe oublié?', ['class' => 'text-right small']) }}
    </div>
    <div>
        {{ Aire::open(route('login')) }}
            {{ Aire::input('username', 'Identifiant')->required()->groupAddClass('bold-label') }}
            {{ Aire::password('password', 'Mot de passe')->required() }}
            {{ Aire::submit('Envoyer')->addClass('pull-right btn-pink')->removeClass('btn-primary') }}
        {{ Aire::close() }}
    </div>
@stop
