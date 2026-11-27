@extends('auth.layout')
@section('auth.title')
    <h1 class="animate-page-title">Identification</h1>
@endsection
@section('auth.content')
    <div class="overflow-auto">
        <a href="{{ route('password.request') }}" class="pull-right">Mot de passe oublié?</a>
    </div>
    <div>
        {{ Aire::open()->route('login')->post() }}
            {{ Aire::input('username', 'Identifiant') }}
            {{ Aire::password('password', 'Mot de passe') }}
            {{ Aire::submit('Envoyer')->addClass('pull-right btn-pink') }}
        {{ Aire::close() }}
    </div>
@endsection
