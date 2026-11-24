@extends('layouts.index')
@section('content')
    @if (session('status'))
        <div class="{{ Session::get('class') }}">
            {{ Session::get('message') }}
        </div>
    @endif
    <div class="content-container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="animate-page-title">Mot de Passe Oublié?</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>Veuillez entrer votre adresse email.</p>
                    {{ Aire::open() }}
                        {{ Aire::input('email', 'Email')->required() }}
                        {{ Aire::submit('Envoyer')->addClass('pull-right btn-pink') }}
                    {{ Aire::close() }}
            </div>
        </div>
    </div>
@stop
