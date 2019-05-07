@extends('layouts.index')
@section('content')
    <div class="content-container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="animate-page-title">Mot de Passe</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h3>Bonjour {{ $user->firstname }}</h3>
                @if(Auth::user()->loggedOnce)
                    <p>Veuillez entrer votre nouveau mot de passe.</p>
                @else
                    <p>C'est la première fois que vous vous connectez sur le site après votre inscritption (ou réinitialisation de mot de passe), veuillez entrer un nouveau mot de passe.</p>
                @endif
            </div>
            <div class="col-sm-6">
                    {!! BootForm::openHorizontal(['lg' => [3, 9]])->put()->action(route('sessions.update')) }}
                        {{ Form::token() }}
                        {!! BootForm::password('Mot de passe', 'password') }}
                        {!! BootForm::password('Confirmation', 'password_confirmation') }}
                        {!! BootForm::submit('Envoyer', 'pull-right btn-pink') }}
                    {!! BootForm::close() }}
            </div>
        </div>
    </div>
@stop