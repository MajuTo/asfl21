@extends('layouts.index')
@section('content')
    <div class="content-container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="animate-page-title">Réinitialisation du mot de passe</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                    {{ Aire::open() }}
{{--                        {!! Form::hidden('token', $token) !!}--}}
                        {{ Aire::input('email', 'Email')->required() }}
                        {{ Aire::password('password', 'Mot de passe')->required() }}
                        {{ Aire::password('password_confirmation', 'Confirmation')->required() }}
                        {{ Aire::submit('Envoyer')->addClass('pull-right btn-pink') }}
                    {{ Aire::close() }}

            </div>
        </div>
    </div>
@stop


