@extends('layouts.index')
@section('content')
    <div class="container content-container">
     
        <div class="row">
            <div class="col-sm-12">
                <h1 class="animate-page-title">Mon Profil</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
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
                    {{ BootForm::submit('Modifier mes coordonnées', 'pull-right btn-pink') }}
                {{ BootForm::close() }}
            </div>

            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-12">
                        <h3>Mon pseudo</h3>
                        {{ BootForm::openHorizontal(3, 9)->put()->action(URL::route('updatePseudo', Auth::user()->id)) }}
                            {{ Form::token() }}
                            {{ BootForm::bind(Auth::user()) }}
                            {{ BootForm::text('Pseudo', 'username') }}
                            {{ BootForm::submit('Modifier mon pseudo', 'pull-right btn-pink') }}
                        {{ BootForm::close() }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h3>Mot de passe</h3>
                        <p id="mod-mdp-link">Modifier votre mot de passe <a href="{{ URL::route('sessions.edit') }}">ici</a>.</p>
                    </div>
                </div>
            </div>
        </div>
            
    </div>
@stop

@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-membre').addClass('active');
            $('#nav-profil').addClass('active');
        });
    </script>
@stop