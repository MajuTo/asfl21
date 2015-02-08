@extends('layouts.index')
@section('content')
    <div class="container">
        <div class="row" id="admin_form">

            <h1>Mon Profil</h1>
            <div class="col-sm-6">
                <h3>Mon pseudo</h3>
                {{ BootForm::openHorizontal(3, 9)->put()->action(URL::route('updatePseudo', Auth::user()->id)) }}
                    {{ Form::token() }}
                    {{ BootForm::bind(Auth::user()) }}
                    {{ BootForm::text('Pseudo', 'username') }}
                    {{ BootForm::submit('Modifier mon pseudo') }}
                {{ BootForm::close() }}

                <h3>Mes coordonnées</h3>
                {{ BootForm::openHorizontal(3, 9)->put()->action(URL::route('user.update', Auth::user()->id)) }}
                    {{ Form::token() }}
                    {{ BootForm::bind(Auth::user()) }}
                    {{ BootForm::text('Téléphone', 'phone') }}
                    {{ BootForm::text('Mobile', 'mobile') }}
                    {{ BootForm::text('Fax', 'fax') }}
                    {{ BootForm::text('Adresse', 'address') }}
                    {{ BootForm::text('Code postal', 'zipCode') }}
                    {{ BootForm::text('Ville', 'city') }}
                    {{ BootForm::submit('Modifier mes coordonnées') }}
                {{ BootForm::close() }}
            </div>
        </div>
    </div>
@stop