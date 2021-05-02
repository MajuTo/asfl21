@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col-sm-8 offset-2 mb-4">
            <ul class="nav nav-pills nav-justified">
                <li class="nav-item"><a class="nav-link active" href="#profil" data-toggle="tab">Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="#adresses" data-toggle="tab">Adresses</a></li>
                <li class="nav-item"><a class="nav-link" href="#activites" data-toggle="tab">Activités</a></li>
                <li class="nav-item"><a class="nav-link" href="#motdepasse" data-toggle="tab">Mot de passe</a></li>
            </ul>
        </div>
    </div>
    <div class="tab-content">

        <!-- Div de l'onglet profil -->
        <div role="tabpanel" class="row tab-pane fade show active" id="profil">
            {{ Aire::open(route('user.update', $user->id), $user)->method('PUT')->wysiwyg() }}
            <div class="row col-8 offset-2">
                {{ Aire::input('name', 'Nom')->placeHolder("Nom...")->required()->groupAddClass('col-6') }}
                {{ Aire::input('firstname', 'Prénom')->placeHolder("Prénom...")->required()->groupAddClass('col-6') }}
                {{ Aire::input('username', 'Identifiant')->placeHolder("Identifiant...")->required()->groupAddClass('col-6') }}
                @if($user->group->id == 2 || $user->group->id == 3)
                    {{ Aire::select($groups, 'group_id', 'Groupe')->groupAddClass('col-6') }}
                @else
                    <div class="col-6"></div>
                @endif
                {{ Aire::input('email', 'Email')->placeHolder("Email...")->required()->groupAddClass('col-6') }}
                {{ Aire::input('mobile', 'Mobile')->placeHolder("Mobile...")->required()->groupAddClass('col-6') }}
                <div class="col-6 mb-3">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" name="hideEmail" id="hideEmail" {{ $user->hideEmail ? 'checked' : '' }}>
                        <label class="custom-control-label" for="hideEmail">Cacher l'email <br><span class="small text-secondary">(Cache le formulaire de contact)</span></label>
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" name="hideMobile" id="hideMobile" {{ $user->hideMobile ? 'checked' : '' }}>
                        <label class="custom-control-label" for="hideMobile">Cacher le mobile</label>
                    </div>
                </div>
                {{ Aire::textArea('description', 'Plus de détails')->addClass('ckeditor')->groupAddClass('col-12') }}
                <div class="col-12 text-right">
                    {{ Aire::submit('Enregistrer')->addClass('btn-pink')->removeClass('btn-primary') }}
                </div>
            </div>
            {{ Aire::close() }}
        </div>

        <!-- Div de l'onglet adresses -->
        <div role="tabpanel" class="tab-pane fade" id="adresses">
            <div class="row">
                <div class="col-sm-10 offset-1 text-right">
                    <h2><a href="{{ route('adresse.create') }}" ><button class="btn btn-pink">Ajouter</button></a></h2>
                </div>
            </div>
            <div class="col-sm-10 offset-1">
                <table class="table table-sm table-hover">
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
                                <a href="{{ route('adresse.edit', $address->id) }}"><button class="btn badge badge-warning">Editer</button></a>
                                {{ Aire::open(route('adresse.destroy', $address->id), $address)->delete()->style('display:inline;') }}
                                {{ Aire::submit('Supprimer')->addClass('badge-danger badge eraser')->removeClass('btn-primary') }}
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
            <div class="col-sm-12 text-center"><h3>Activités de {{ $user->firstname }}</h3></div>
            <div class="d-flex align-content-center justify-content-center">
                {{ Aire::open(route('user.updateActivities', $user->id), $user)->put() }}
                    @foreach($activities as $activity)
                        <div class="custom-control custom-switch mb-3">
                            <input type="checkbox" class="custom-control-input" name="activities[]"
                                   value="{{ $activity->id }}" id="activity-{{ $activity->id }}"
                                   {{ $user->activities->contains($activity->id) ? 'checked' : '' }}
                            >
                            <label class="custom-control-label" for="activity-{{ $activity->id }}">{{ $activity->activityName }}</label>
                        </div>
                    @endforeach
                    <div class="text-right">
                        {{ Aire::submit('Enregistrer')->addClass('btn-pink')->removeClass('btn-primary') }}
                    </div>
                {{ Aire::close() }}
            </div>
        </div>

        <!-- Div de l'onglet mot de passe -->
        <div role="tabpanel" class="tab-pane fade" id="motdepasse">
            <div class="col-sm-6 offset-3">
                <div class="text-center"><h3>Changer mon mot de passe</h3></div>
                {{ Aire::open(route('user.update.password', $user->id))->put() }}
                    {{ Aire::password('password', 'Mot de passe') }}
                    {{ Aire::password('password_confirmation', 'Confirmation') }}
                    <div class="text-right">{{ Aire::submit('Envoyer')->addClass('btn-pink')->removeClass('btn-primary') }}</div>
                {{ Aire::close() }}
            </div>
        </div>
    </div> <!-- Fin div tab-content -->
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
