@extends('layouts.admin')
@section('content')
<div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <ul class="nav nav-pills nav-justified">

                <li class="active"><a href="#profil" data-toggle="tab">Profil</a></li>
                <li><a href="#adresses" data-toggle="tab">Adresses</a></li>
                <li><a href="#activites" data-toggle="tab">Activités</a></li>

            </ul>
        </div>
    </div>
    <div class="row tab-content">

        <!-- Div de l'onglet profil -->
        <div role="tabpanel" class="row tab-pane fade in active" id="profil">
            {{ Aire::open()->route('admin.user.update', $user->id)->put() }}
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="col-sm-9 col-sm-offset-3"><h3>Coordonnées de {{ $user->firstname }}</h3></div>
                        {{ Aire::bind($user) }}
                        {{ Aire::input('name', 'Nom')->placeholder("Nom...")->required() }}
                        {{ Aire::input('firstname', 'Prénom')->placeholder("Prénom...")->required() }}
                        {{ Aire::input('username', 'Identifiant')->placeholder("Identifiant...")->required() }}
                        {{ Aire::input('email', 'Email')->placeholder("Email...")->required() }}
                        {{ Aire::checkbox('hideEmail', 'Ne pas montrer mon email (Cache le formulaire de contact)')->checked($user->hideEmail) }}
                        {{ Aire::input('mobile', 'Mobile')->placeholder("Mobile...") }}
                        {{ Aire::checkbox('hideMobile', 'Ne pas montrer mon mobile')->checked($user->hideMobile) }}
                        {{ Aire::textarea('description', 'Plus de détail')->placeholder("Dites en un peu plus sur vous même et/ou vos activités...")->helpText("Dites en un peu plus sur vous même et/ou vos activités...")->addClass('ckeditor') }}
                        {{ Aire::select($groups, 'group_id', 'Groupe') }}
                        {{ Aire::submit('Enregistrer')->addClass('pull-right btn-pink') }}
                </div>
            {{ Aire::close() }}
        </div>

        <!-- Div de l'onglet adresses -->
        <div role="tabpanel" class="tab-pane fade" id="adresses">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-7">
                    <h2><a href="{{ route('admin.adresse.create') }}" ><button class="btn btn-pink pull-right">Ajouter</button></a></h2>
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
                                    <a href="{{ route('admin.adresse.edit', $address->id) }}"><button class="btn label label-warning">Editer</button></a>
                                    {{ Aire::open()->route('admin.adresse.destroy', $address->id)->delete()->class('delete-form') }}
                                        {{ Aire::submit('Supprimer')->addClass('label-danger label eraser') }}
                                    {{ Aire::close() }}
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
                {{ Aire::open()->route('admin.user.updateActivities', $user->id)->put() }}
                    {{ Aire::bind($user) }}
                  @foreach($activities as $act)
                      {{ Aire::checkbox('activities[]')->value($act->id)->label($act->activityName)->checked($user->activities->contains($act->id)) }}
                  @endforeach
                {{ Aire::submit('Enregistrer')->addClass('pull-right btn-pink') }}
              {{ Aire::close() }}
          </div>
        </div>

    </div> <!-- Fin div tab-content -->
@endsection
