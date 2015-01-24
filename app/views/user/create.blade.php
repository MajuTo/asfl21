@extends('layouts.index')
@section('content')
    <div class="container">
        <div class="row" id="admin_form">

            <h1>Création d'un adhérent</h1>

            <div class="col-sm-6">
                {{ BootForm::openHorizontal(3, 9)->action(URL::route('user.store')) }}
                    {{ Form::token() }}
                    {{ BootForm::bind($user) }}
                    {{ BootForm::text('Nom', 'name')->placeHolder("Nom de l'adhérent...")->required() }}
                    {{ BootForm::text('Prénom', 'firstname')->placeHolder("Prénom de l'adhérent...")->required() }}
                    {{ BootForm::text('Email', 'email')->placeHolder("Email de l'adhérent ...")->required() }}
                    {{ BootForm::text('Téléphone', 'phone')->placeHolder("Téléphone de l'adhérent...") }}
                    {{ BootForm::text('Mobile', 'mobile')->placeHolder("Mobile de l'adhérent...") }}
                    {{ BootForm::text('Fax', 'fax')->placeHolder("Fax de l'adhérent...") }}
                    {{ BootForm::text('Adresse', 'address')->placeHolder("Adresse de l'adhérent...")->required() }}
                    {{ BootForm::text('Code postal', 'zipCode')->placeHolder("Code postal de l'adhérent...")->required() }}
                    {{ BootForm::text('Ville', 'city')->placeHolder("Ville de l'adhérent...")->required() }}
                    {{ BootForm::select('Groupe', 'group_id')->options($groups) }}
                    {{ BootForm::submit('Ajouter') }}
                {{ BootForm::close() }}
            </div>
        </div>
    </div>
@stop