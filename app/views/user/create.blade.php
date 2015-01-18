@extends('layouts.index')
@section('content')
    <div class="container">
        <div class="row" id="admin_form">

            <h1>Création d'un adhérent</h1>

        {{--  Bloc d'erreur groupé, décommente si tu veux voir a quoi ca ressemble, pas terrible imo --}}
        {{--
            @if ($errors->has())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif
        --}}

            <div class="col-sm-6">
                {{ BootForm::openHorizontal(3, 9)->action(URL::route('user.store')) }}
                    {{ Form::token() }}
                    {{ BootForm::text('Nom', 'name')->placeHolder("Nom de l'adhérent...") }}
                    {{ BootForm::text('Prénom', 'firstName')->placeHolder("Prénom de l'adhérent...") }}
                    {{ BootForm::text('Pseudo', 'username')->placeHolder("Pseudo de l'adhérent...") }}
                    {{ BootForm::text('Email', 'email')->placeHolder("Email de l'adhérent ...") }}
                    {{ BootForm::text('Téléphone', 'phone')->placeHolder("Téléphone de l'adhérent...") }}
                    {{ BootForm::text('Mobile', 'mobile')->placeHolder("Mobile de l'adhérent...") }}
                    {{ BootForm::text('Fax', 'fax')->placeHolder("Fax de l'adhérent...") }}
                    {{ BootForm::text('Adresse', 'address')->placeHolder("Adresse de l'adhérent...") }}
                    {{ BootForm::text('Code postal', 'zipCode')->placeHolder("Code postal de l'adhérent...") }}
                    {{ BootForm::text('Ville', 'city')->placeHolder("Ville de l'adhérent...") }}
                    {{ BootForm::select('Groupe', 'Group_idGroup')->options($groups) }}
                    {{ BootForm::submit('Ajouter') }}
                {{ BootForm::close() }}
            </div>
        </div>
    </div>
@stop