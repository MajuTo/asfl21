@extends('layouts.admin')
@section('content')
<div class="row">
        <div class="col-sm-8 offset-sm-2">
            <ul class="nav nav-pills nav-justified mb-3" role="tablist">

                <li class="nav-item" role="presentation"><button class="nav-link active" type="button" role="tab" data-bs-toggle="tab" data-bs-target="#profil" aria-selected="true">Profil</button></li>
                <li class="nav-item" role="presentation"><button class="nav-link" type="button" role="tab" data-bs-toggle="tab" data-bs-target="#adresses" aria-selected="false">Adresses</button></li>
                <li class="nav-item" role="presentation"><button class="nav-link" type="button" role="tab" data-bs-toggle="tab" data-bs-target="#activites" aria-selected="false">Activités</button></li>

            </ul>
        </div>
    </div>
    <div class="tab-content">

        <!-- Div de l'onglet profil -->
        <div role="tabpanel" class="tab-pane fade show active" id="profil">
            {{ Aire::open()->route('admin.user.update', $user->id)->put() }}
                <div class="col-sm-8 offset-sm-2">
                    <div class="col-sm-9 offset-sm-3"><h3>Coordonnées de {{ $user->firstname }}</h3></div>
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
                        {{ Aire::submit('Enregistrer')->addClass('float-end btn-pink') }}
                </div>
            {{ Aire::close() }}
        </div>

        <!-- Div de l'onglet adresses -->
        <div role="tabpanel" class="tab-pane fade" id="adresses">
            <div class="row">
                <div class="col-sm-4 offset-sm-7">
                    <h2><a href="{{ route('admin.adresse.create') }}" ><button class="btn btn-pink float-end">Ajouter</button></a></h2>
                </div>
            </div>
            <div class="col-sm-10 offset-sm-1">
                <table class="table table-sm table-hover">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($addresses as $address)
                            <tr>
                                <td>{{ $address->name }}</td>
                                <td>{{ Str::title($address->address) }}, {{ $address->zipCode }}, {{ Str::title($address->city) }}</td>
                                <td>{{ $address->phone }}</td>
                                <td>
                                    <a href="{{ route('admin.adresse.edit', $address->id) }}"><button class="btn btn-sm btn-warning">Éditer</button></a>
                                    {{ Aire::open()->route('admin.adresse.destroy', $address->id)->delete()->class('delete-form') }}
                                        {{ Aire::submit('Supprimer')->addClass('btn-sm btn-danger eraser') }}
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
          <div class="col-sm-6 offset-sm-3">
              <div class="col-sm-12 text-center"><h3>Activités de {{ $user->firstname }}</h3></div>
                {{ Aire::open()->route('admin.user.updateActivities', $user->id)->put() }}
                    {{ Aire::bind($user) }}
                  @foreach($activities as $act)
                      {{ Aire::checkbox('activities[]')->value($act->id)->label($act->activityName)->checked($user->activities->contains($act->id)) }}
                  @endforeach
                {{ Aire::submit('Enregistrer')->addClass('float-end btn-pink') }}
              {{ Aire::close() }}
          </div>
        </div>

    </div> <!-- Fin div tab-content -->
@endsection
