@extends('layouts.index')
@section('content')
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <ul class="nav nav-pills nav-justified">

            <li class="active"><a href="#profil" data-toggle="tab">Profil</a></li>
            <li><a href="#adresses" data-toggle="tab">Adresses</a></li>
            <li><a href="#activites" data-toggle="tab">Activités</a></li>
            <li><a href="#motdepasse" data-toggle="tab">Mot de passe</a></li>

        </ul>
    </div>
</div>
<div class="row tab-content">

    <!-- Div de l'onglet profil -->
    <div role="tabpanel" class="row tab-pane fade in active" id="profil">
        {{ Aire::open()->route('user.update', $user->id)->put() }}
            <div class="col-sm-8 col-sm-offset-2">
                <div class="col-sm-9 col-sm-offset-3"><h3>Coordonnées de {{ $user->firstname }}</h3></div>
                    {{ Aire::bind($user) }}
                    {{ Aire::input('name')->label('Nom')->placeholder("Nom...")->required() }}
                    {{ Aire::input('firstname')->label('Prénom')->placeholder("Prénom...")->required() }}
                    {{ Aire::input('username')->label('Identifiant')->placeholder("Identifiant...")->required() }}
                    {{ Aire::input('email')->label('Email')->placeholder("Email...")->required() }}
                    {{ Aire::checkbox('hideEmail')->label('Cacher l\'email (Cache le formulaire de contact)')->checked($user->hideEmail) }}
                    {{ Aire::input('mobile')->label('Mobile')->placeholder("Mobile...") }}
                    {{ Aire::checkbox('hideMobile')->label('Cacher le mobile')->checked($user->hideMobile) }}
                    {{ Aire::textarea('description')->label('Plus de détail <br /><span class="textarea-subtext">Dites en un peu plus sur vous même et/ou vos activités...</span>')->placeholder("Dites en un peu plus sur vous même et/ou vos activités...")->addClass('ckeditor') }}
                    @if($user->group->id == 2 || $user->group->id == 3)
                        {{ Aire::select($groups, 'group_id')->label('Groupe') }}
                    @endif
                    {{ Aire::submit('Enregistrer')->addClass('pull-right btn-pink') }}
            </div>
        {{ Aire::close() }}
    </div>

    <!-- Div de l'onglet adresses -->
    <div role="tabpanel" class="tab-pane fade" id="adresses">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-7">
                <h2><a href="{{ route('adresse.create') }}" ><button class="btn btn-pink pull-right">Ajouter</button></a></h2>
            </div>
        </div>
        <div class="col-sm-10 col-sm-offset-1">
            <table class="table table-condensed table-hover">
                <thead>
                    <td>Nom</td>
                    <td>Adresse</td>
                    <td>Téléphone</td>
                    <td>Actions</td>
                </thead>
                <tbody>
                    @foreach($addresses as $address)
                        <tr>
                            <td>{{ $address->name }}</td>
                            <td>{{ Str::title($address->address) }}, {{ $address->zipCode }}, {{ Str::title($address->city) }}</td>
                            <td>{{ $address->phone }}</td>
                            <td>
                                <a href="{{ route('adresse.edit', $address->id) }}"><button class="btn label label-warning">Editer</button></a>
                                {!! Aire::open()->route('adresse.destroy', $address->id)->class('delete-form') !!}
                                    {!! Aire::submit('Supprimer')->class('label-danger label eraser') !!}
                                {!! Aire::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Div de l'onglet activités -->
    <div role="tabpanel" class="tab-pane fade" id="activites">
        <div class="col-sm-6 col-sm-offset-3">
          <div class="col-sm-12 text-center"><h3>Activités de {{ $user->firstname }}</h3></div>
          {{ Aire::open()->route('user.updateActivities', $user->id)->put() }}
              {{ Aire::bind($user) }}
              @foreach($activities as $act)
                  {{ Aire::checkbox('activities[]')->value($act->id)->label($act->activityName)->checked($user->activities->contains($act->id)) }}
              @endforeach
              {{ Aire::submit('Enregistrer')->addClass('pull-right btn-pink') }}
          {{ Aire::close() }}
        </div>
    </div>

    <!-- Div de l'onglet mot de passe -->
    <div role="tabpanel" class="tab-pane fade" id="motdepasse">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="col-sm-12 text-center"><h3>Changer mon mot de passe</h3></div>
            {{ Aire::open()->route('user.update.password', $user->id)->put() }}
                {{ Aire::password('password', 'Mot de passe') }}
                {{ Aire::password('password_confirmation', 'Confirmation') }}
                {{ Aire::submit('Envoyer')->addClass('pull-right btn-pink') }}
            {{ Aire::close() }}
        </div>
    </div>
</div> <!-- Fin div tab-content -->
@stop
