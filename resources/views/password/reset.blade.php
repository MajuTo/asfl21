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
                    {!! BootForm::openHorizontal(['lg' => [4, 8]) !!}
                        {!!  Form::token() !!}
                        {!! Form::hidden('token', $token) !!}
                        {!! BootForm::email('Email', 'email')->required() !!}
                        {!! BootForm::password('Mot de passe', 'password')->required() !!}
                        {!! BootForm::password('Confirmation', 'password_confirmation')->required() !!}
                        {!! BootForm::submit('Envoyer', 'pull-right btn-pink') !!}
                    {!! BootForm::close() !!}

            </div>
        </div>
    </div>
@stop


