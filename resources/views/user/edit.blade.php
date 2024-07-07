@extends('layouts.index')
@section('content')

    <nav>
        <div class="col-sm-8 offset-2 mb-4">
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="profil-tab" data-bs-toggle="pill" data-bs-target="#profil" type="button" role="tab" aria-controls="profil" aria-selected="true">Profil</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="adresses-tab" data-bs-toggle="pill" data-bs-target="#adresses" type="button" role="tab" aria-controls="adresses" aria-selected="true">Adresses</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="activites-tab" data-bs-toggle="pill" data-bs-target="#activites" type="button" role="tab" aria-controls="activites" aria-selected="true">Activités</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="motdepasse-tab" data-bs-toggle="pill" data-bs-target="#motdepasse" type="button" role="tab" aria-controls="motdepasse" aria-selected="true">Mot de passe</button>
                </li>
            </ul>
        </div>
    </nav>
    <div class="tab-content" id="nav-tab-content">
        <!-- Div de l'onglet profil -->
        <div id="profil" aria-labelledby="profil" tabindex="0" role="tabpanel" class="row tab-pane fade show active">
{{--            <div class="row col-8 offset-2">--}}
{{--                <x-form class="row col-8 offset-2" :action="route('user.update', $user->id)" method="PUT">--}}
{{--                    @bind($user)--}}
{{--                    <div class="col-6 pr-2 mb-3">--}}
{{--                        <x-form-input name="name" label="Nom" class="mb-3" floating></x-form-input>--}}
{{--                        <x-form-input name="username" label="Identifiant" class="mb-3" floating></x-form-input>--}}
{{--                        <x-form-input name="email" label="Email" class="mb-1" floating></x-form-input>--}}
{{--                        <x-form-checkbox name="hideEmail" switch label="Masquer le formulaire de contact"></x-form-checkbox>--}}
{{--                    </div>--}}
{{--                    <div class="col-6 pl-2 mb-3">--}}
{{--                        <x-form-input name="firstname" label="Prénom" class="mb-3" floating></x-form-input>--}}
{{--                        @if(in_array($user->group_id, [2, 3]))--}}
{{--                            <x-form-select name="group_id" label="Groupe" class="mb-3" floating :options="$groups"></x-form-select>--}}
{{--                        @else--}}
{{--                            <x-form-input name="group_id_disabled" label="Groupe" class="mb-1" floating disabled :value=""></x-form-input>--}}
{{--                        @endif--}}
{{--                        <x-form-input name="mobile" label="Mobile" class="mb-1" floating></x-form-input>--}}
{{--                        <x-form-checkbox name="hideMobile" switch label="Masquer le mobile"></x-form-checkbox>--}}
{{--                    </div>--}}
{{--                    <div class="col-12">--}}
{{--                        <x-form-textarea name="description" label="Plus de détails" class="ckeditor"></x-form-textarea>--}}
{{--                        <x-form-submit class="btn btn-pink float-end mt-3">Enregistrer</x-form-submit>--}}
{{--                    </div>--}}
{{--                    @endbind--}}
{{--                </x-form>--}}
{{--                <div class="col-6 pr-2 mb-3">--}}
{{--                    <x-inline-input name="name" label="Nom" class="mb-3"></x-inline-input>--}}
{{--                    <x-floating-input name="username" label="Identifiant" class="mb-3"></x-floating-input>--}}
{{--                    <x-floating-input name="email" label="Email" class="mb-1"></x-floating-input>--}}
{{--                    @if($user->hideEmail)--}}
{{--                        <x-switch name="hideEmail" label="Masquer le formulaire de contact"></x-switch>--}}
{{--                    @else--}}
{{--                        <x-switch name="hideEmail" label="Masquer le formulaire de contact" checked></x-switch>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--                <div class="col-6 pl-2 mb-3">--}}
{{--                    <x-form-input name="test" floating label="klflkjzfklj"></x-form-input>--}}
{{--                    <x-form-checkbox name="test" switch label="klflkjzfklj"></x-form-checkbox>--}}
{{--                    <x-form-select name="group_id" label="select" floating></x-form-select>--}}
{{--                    <x-inline-input name="firstname" label="Prénom" class="mb-3"></x-inline-input>--}}
{{--                    <x-floating-select name="group_id" label="Groupe" class="mb-3" :options="$groups" value="id" text="groupName" :selected="$user->group->id"></x-floating-select>--}}
{{--                    <x-floating-input name="mobile" label="Mobile" class="mb-1"></x-floating-input>--}}
{{--                    @if($user->hideMobile)--}}
{{--                        <x-switch name="hideMobile" label="Masquer le mobile"></x-switch>--}}
{{--                    @else--}}
{{--                        <x-switch name="hideMobile" label="Masquer le mobile" checked></x-switch>--}}
{{--                    @endif--}}
{{--                </div>--}}
                {{ aire()->open(route('user.update', $user->id), $user)->class('row col-8 offset-2')->method('PUT')->wysiwyg() }}
                {{ aire()->input('name', 'Nom')->placeHolder("Nom...")->required()->groupAddClass('col-6 mb-3') }}
                {{ aire()->input('firstname', 'Prénom')->placeHolder("Prénom...")->required()->groupAddClass('col-6 mb-3') }}
                {{ aire()->input('username', 'Identifiant')->placeHolder("Identifiant...")->required()->groupAddClass('col-6 mb-3') }}
                @if($user->group->id == 2 || $user->group->id == 3)
                    {{ aire()->select($groups, 'group_id', 'Groupe')->groupAddClass('col-6') }}
                @else
                    <div class="col-6 mb-3"></div>
                @endif
                {{ aire()->input('email', 'Email')->placeHolder("Email...")->required()->groupAddClass('col-6 mb-1') }}
                {{ aire()->input('mobile', 'Mobile')->placeHolder("Mobile...")->required()->groupAddClass('col-6 mb-1') }}
{{--                <div class="col-6 mb-3">--}}
{{--                    @if($user->hideEmail)--}}
{{--                    <x-switch name="hideEmail" label="Masquer le formulaire de contact"></x-switch>--}}
{{--                    @else--}}
{{--                    <x-switch name="hideEmail" label="Masquer le formulaire de contact" checked></x-switch>--}}
{{--                    @endif--}}
{{--                    <label for="ch">Check</label>--}}
{{--                    <input id="ch" type="checkbox" @if(!$user->hideEmail) {{ 'checked' }} @endif>--}}
{{--                    <div class="custom-control custom-switch">--}}
{{--                        <input type="checkbox" class="custom-control-input" name="hideEmail" id="hideEmail" {{ $user->hideEmail ? 'checked' : '' }}>--}}
{{--                        <label class="custom-control-label" for="hideEmail">Masquer le formulaire de contact</label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                    @if($user->hideMobile)--}}
{{--                        <x-switch name="hideMobile" label="Masquer le mobile"></x-switch>--}}
{{--                    @else--}}
{{--                        <x-switch name="hideMobile" label="Masquer le mobile" checked></x-switch>--}}
{{--                    @endif--}}
                <div class="col-6 mb-3">
                    <div class="custom-control form-switch">
                        <input type="checkbox" class="form-check-input" name="hideEmail" id="hideEmail" {{ $user->hideEmail ? 'checked' : '' }}>
                        <label class="form-check-label" for="hideEmail">Masquer le mail</label>
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <div class="custom-control form-switch">
                        <input type="checkbox" class="form-check-input" name="hideMobile" id="hideMobile" {{ $user->hideMobile ? 'checked' : '' }}>
                        <label class="form-check-label" for="hideMobile">Masquer le mobile</label>
                    </div>
                </div>
                {{ aire()->textArea('description', 'Plus de détails')->addClass('ckeditor')->groupAddClass('col-12 mb-3') }}
                <div class="col-12">
                    {{ aire()->submit('Enregistrer')->addClass('btn-pink float-end')->removeClass('btn-primary') }}
                </div>
                {{ aire()->close() }}
{{--            </div>--}}
        </div>
        <!-- Div de l'onglet adresses -->
        <div id="adresses" aria-labelledby="adresses" tabindex="0" role="tabpanel" class="tab-pane fade">
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
                                <a href="{{ route('adresse.edit', $address->id) }}"><button class="btn badge text-bg-warning">Editer</button></a>
                                <x-delete-form :action="route('adresse.destroy', $address->id)"></x-delete-form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Div de l'onglet activités -->
        <div id="activites" aria-labelledby="activites" tabindex="0" role="tabpanel" class="tab-pane fade">
            <div class="col-sm-12 text-center"><h3>Activités de {{ $user->firstname }}</h3></div>
            <div class="d-flex align-content-center justify-content-center">
{{--                <x-form :action="route('user.updateActivities', $user->id)" method="PUT">--}}
{{--                    @bind($user)--}}
{{--                    <x-form-group name="activities" label="Choisissez une ou plusieurs activités">--}}
{{--                    @foreach($activities as $activity)--}}
{{--                        <x-form-checkbox name="activities[]" :value="$activity->id" :label="$activity->activityName" switch :checked="$user->activities->contains($activity)"></x-form-checkbox>--}}
{{--                    @endforeach--}}
{{--                    </x-form-group>--}}
{{--                    <x-form-submit class="btn btn-pink mt-3">Enregistrer</x-form-submit>--}}
{{--                    @endbind--}}
{{--                </x-form>--}}
                {{ aire()->open(route('user.updateActivities', $user->id), $user)->put() }}
                    @foreach($activities as $activity)
                        <div class="custom-control custom-switch mb-1">
                            <input type="checkbox" class="custom-control-input" name="activities[]"
                                   value="{{ $activity->id }}" id="activity-{{ $activity->id }}"
                                   {{ $user->activities->contains($activity->id) ? 'checked' : '' }}
                            >
                            <label class="custom-control-label" for="activity-{{ $activity->id }}">{{ $activity->activityName }}</label>
                        </div>
                    @endforeach
                    {{ aire()->submit('Enregistrer')->addClass('btn-pink float-end')->removeClass('btn-primary') }}
                {{ aire()->close() }}
            </div>
        </div>
        <!-- Div de l'onglet mot de passe -->
        <div id="motdepasse" aria-labelledby="motdepasse" tabindex="0" role="tabpanel" class="tab-pane fade">
            <div class="col-sm-6 offset-3">
                <div class="text-center"><h3>Changer mon mot de passe</h3></div>
{{--                <x-form :action="route('user.update.password', $user->id)" method="PUT">--}}
{{--                    <x-form-input type="password" name="password" label="Mot de passe" class="mb-3" floating></x-form-input>--}}
{{--                    <x-form-input type="password" name="password_confirmation" label="Confirmation" class="mb-3" floating></x-form-input>--}}
{{--                    <x-form-submit class="btn btn-pink float-end">Envoyer</x-form-submit>--}}
{{--                </x-form>--}}
                {{ aire()->open(route('user.update.password', $user->id))->put() }}
                    {{ aire()->password('password', 'Mot de passe')->groupAddClass('mb-3') }}
                    {{ aire()->password('password_confirmation', 'Confirmation')->groupAddClass('mb-3') }}
{{--                    <div class="text-right">--}}
                        {{ aire()->submit('Envoyer')->addClass('btn-pink float-end')->removeClass('btn-primary') }}
{{--                    </div>--}}
                {{ aire()->close() }}
            </div>
        </div>
    </div> <!-- Fin div tab-content -->
@stop
{{--@section('script')--}}
{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $('#nav-membre').addClass('active');--}}
{{--            $('#nav-profil').addClass('active');--}}
{{--            $(':checkbox:not(:checked)').parent().addClass('notchecked');--}}
{{--            $(':checkbox:checked').parent().addClass('checked');--}}
{{--            $(':checkbox').on('change', function(){--}}
{{--                if( $(this).parent().hasClass('checked') ){--}}
{{--                    $(this).parent().removeClass('checked').addClass('notchecked');--}}
{{--                }else{--}}
{{--                    $(this).parent().removeClass('notchecked').addClass('checked');--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@stop--}}
