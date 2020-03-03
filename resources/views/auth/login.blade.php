@extends('auth.layout')
@section('auth.title')
    <h1 class="animate-page-title">Identification</h1>
@stop
@section('auth.content')
    <div class="overflow-auto">
        {{ link_to(route('password.request'), 'Mot de passe oublié?', ['class' => 'pull-right']) }}
    </div>
    <div>
        {!! BootForm::openHorizontal(['lg' => [3, 9]])->action(route('login')) !!}
            {{--{!! Form::token() !!}--}}
            {!! BootForm::text('Identifiant', 'username') !!}
            {!! BootForm::password('Mot de passe', 'password') !!}
            {!! BootForm::submit('Envoyer', 'pull-right btn-pink') !!}
        {!! BootForm::close() !!}
    </div>
@stop
