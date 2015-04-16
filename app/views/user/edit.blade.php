@extends('layouts.index')
@section('content')
<div class="content-container">
 
    <div class="row">
        <div class="col-sm-12">
            <h1 class="animate-page-title">Mon Profil</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="col-sm-9 col-sm-offset-3"><h3>Mes coordonnées</h3></div>
            {{ BootForm::openHorizontal(3, 9)->put()->action(URL::route('user.update', $user->id)) }}
                {{ Form::token() }}
                {{ BootForm::bind($user) }}
                {{ BootForm::text('Nom', 'name')->placeHolder("Nom...")->required() }}
                {{ BootForm::text('Prénom', 'firstname')->placeHolder("Prénom...")->required() }}
                {{ BootForm::text('Identifiant', 'username')->placeHolder("Identifiant...")->required() }}
                {{ BootForm::text('Email', 'email')->placeHolder("Email...")->required() }}
                {{ BootForm::text('Téléphone', 'phone')->placeHolder("Téléphone...") }}
                {{ BootForm::text('Mobile', 'mobile')->placeHolder("Mobile...") }}
                {{ BootForm::text('Fax', 'fax')->placeHolder("Fax...") }}
                {{ BootForm::text('Adresse', 'address')->placeHolder("Adresse...")->required() }}
                {{ BootForm::text('Code postal', 'zipCode')->placeHolder("Code postal...")->required() }}
                {{ BootForm::text('Ville', 'city')->placeHolder("Ville...")->required() }}
        </div>
        <div class="col-sm-6">
            <div class="col-sm-9 col-sm-offset-3"><h3>Mes activités</h3></div>
                @foreach($activities as $act)
                    @if($user->activities->contains($act->id))
                        {{ BootForm::checkbox($act->activityName, 'activities[]')->value($act->id)->check() }}
                    @else
                        {{ BootForm::checkbox($act->activityName, 'activities[]')->value($act->id) }}
                    @endif
                @endforeach
                {{ BootForm::submit('Enregistrer', 'pull-right btn-pink') }}
            {{ BootForm::close() }}
        </div>
        <div class="col-sm-12">
            <h3>Mot de passe</h3>
            <p id="mod-mdp-link">Modifier votre mot de passe <a href="{{ URL::route('sessions.edit') }}">ici</a>.</p>
        </div>
    </div>
</div>
@stop

@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-membre').addClass('active');
            $('#nav-profil').addClass('active');
            $(':checkbox:not(:checked)').parent().addClass('notchecked');
            $(':checkbox:checked').parent().addClass('checked');
            $(':checkbox').on('change', function(){
                if( $(this).parent().hasClass('checked') ){
                    $(this).parent().removeClass('checked').addClass('notchecked');
                }else{
                    $(this).parent().removeClass('notchecked').addClass('checked');
                }
            });
        });
    </script>
@stop