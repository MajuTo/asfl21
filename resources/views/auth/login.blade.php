@extends('auth.layout')
@section('auth.title')
    <h1 class="animate-page-title">Identification</h1>
@stop
@section('auth.content')
    <div class="overflow-auto">
        {{ link_to(route('password.request'), 'Mot de passe oublié?', ['class' => 'pull-right']) }}
    </div>
    <div>
        {{ Aire::open()->route('login')->post() }}
            {{--{!! Form::token() !!}--}}
            {{ Aire::input('username', 'Identifiant') }}
            {{ Aire::password('password', 'Mot de passe') }}
            {{ Aire::submit('Envoyer')->addClass('pull-right btn-pink') }}
        {{ Aire::close() }}
    </div>
@stop
