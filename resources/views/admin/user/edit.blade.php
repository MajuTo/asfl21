@extends('layouts.admin')
@section('admincontent')
<div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="profil-tab" data-bs-toggle="pill" data-bs-target="#profil" type="button" aria-controls="profil" aria-selected="true">Profil</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="adresses-tab" data-bs-toggle="pill" data-bs-target="#adresses" type="button" aria-controls="adresses" aria-selected="true">Adresses</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="activites-tab" data-bs-toggle="pill" data-bs-target="#activites" type="button" aria-controls="activites" aria-selected="true">Activités</button>
                </li>
            </ul>
        </div>
    </div>
    <div class="row tab-content">

        <!-- Div de l'onglet profil -->
        <div role="tabpanel" class="row tab-pane fade active show" id="profil">
{{--            {!! BootForm::openHorizontal(['lg' => [2, 10]])->put()->action(route('admin.user.update', $user->id)) !!}--}}
                <div class="col-sm-8 col-sm-offset-2 mt-2">
                    <h3 class="offset-2">Coordonnées de {{ $user->firstname }}</h3>
                    {{ aire()->open()->route('admin.user.update', $user)->method('PUT')->bind($user) }}
                        {{ aire()->input('name', 'Nom')->placeHolder("Nom de l'adhérent...")->required()->groupAddClass('mb-2') }}
                        {{ aire()->input('firstname', 'Prénom')->placeHolder("Prénom de l'adhérent...")->required()->groupAddClass('mb-2') }}
                        {{ aire()->input('username', 'Identifiant')->placeHolder("Identifiant...")->required()->groupAddClass('mb-2') }}
                        {{ aire()->email('email', 'Email')->placeHolder("Email de l'adhérent ...")->required()->groupAddClass('mb-0') }}
                        {{ aire()->checkbox('hideEmail', 'Email privé')->groupAddClass('mb-2') }}
                        {{ aire()->input('phone', 'Téléphone')->placeHolder("Téléphone de l'adhérent ...")->groupAddClass('mb-0') }}
                        {{ aire()->checkbox('hidePhone', 'Téléphone privé')->groupAddClass('mb-2') }}
                        {{ aire()->input('mobile', 'Mobile')->placeHolder("Mobile de l'adhérent ...")->groupAddClass('mb-0') }}
                        {{ aire()->checkbox('hideMobile', 'Mobile privé')->groupAddClass('mb-2') }}
                        {{ aire()->input('fax', 'Fax')->placeHolder("Fax de l'adhérent ...")->groupAddClass('mb-0') }}
                        {{ aire()->checkbox('hideFax', 'Fax privé')->groupAddClass('mb-2') }}
                        {{ aire()->textArea('description', 'Plus de détails')->placeHolder("Dites en un peu plus sur vous même et/ou vos activités...")->class('ckeditor')->groupAddClass('mb-2') }}
                        {{ aire()->select($groups, 'group_id', 'Groupe')->groupAddClass('mb-3') }}
                        {{ aire()->submit('Enregistrer')->class('float-end btn-pink') }}
                    {{ aire()->close() }}
{{--                        {!! Form::token() !!}--}}
{{--                        {!! BootForm::bind($user) !!}--}}
{{--                        {!! BootForm::text('Nom', 'name')->placeHolder("Nom...")->required() !!}--}}
{{--                        {!! BootForm::text('Prénom', 'firstname')->placeHolder("Prénom...")->required() !!}--}}
{{--                        {!! BootForm::text('Identifiant', 'username')->placeHolder("Identifiant...")->required() !!}--}}
{{--                        {!! BootForm::text('Email', 'email')->placeHolder("Email...")->required() !!}--}}
{{--                        @if($user->hideEmail)--}}
{{--                            {!! BootForm::checkbox('Ne pas montrer mon email (Cache le formulaire de contact)', 'hideEmail')->check() !!}--}}
{{--                        @else--}}
{{--                            {!! BootForm::checkbox('Ne pas montrer mon email (Cache le formulaire de contact)', 'hideEmail') !!}--}}
{{--                        @endif--}}
{{--                        {!! BootForm::text('Mobile', 'mobile')->placeHolder("Mobile...") !!}--}}
{{--                        @if($user->hideMobile)--}}
{{--                            {!! BootForm::checkbox('Ne pas montrer mon mobile', 'hideMobile')->check() !!}--}}
{{--                        @else--}}
{{--                            {!! BootForm::checkbox('Ne pas montrer mon mobile', 'hideMobile') !!}--}}
{{--                        @endif--}}
{{--                        {!! BootForm::textarea('Plus de détail', 'description')->placeHolder("Dites en un peu plus sur vous même et/ou vos activités...")->class('ckeditor') !!}--}}
{{--                        {!! BootForm::select('Groupe', 'group_id')->options($groups) !!}--}}
{{--                        {!! BootForm::submit('Enregistrer', 'pull-right btn-pink') !!}--}}
                </div>
{{--            {!! BootForm::close() !!}--}}
        </div>

        <!-- Div de l'onglet adresses -->
        <div role="tabpanel" class="tab-pane fade" id="adresses">
{{--            <div class="row">--}}
{{--                <div class="col-sm-4 offset-8 flex-row flex justify-content-between">--}}
                    <h2><a href="{{ route('admin.adresse.create') }}" ><button class="btn btn-pink float-end">Ajouter</button></a></h2>
{{--                </div>--}}
            <h3 class="offset-2">Adresses de {{ $user->firstname }}</h3>
{{--            </div>--}}
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
                                    <a href="{{ route('admin.adresse.edit', $address->id) }}"><button class="btn badge text-bg-warning">Editer</button></a>
                                    <x-delete-form :action="route('admin.adresse.destroy', $address)"></x-delete-form>
{{--                                    {!! BootForm::open()->delete()->action(route('admin.adresse.destroy', $address->id))->style('display: inline;') !!}--}}
{{--                                        {!! Form::token() !!}--}}
{{--                                        {!! BootForm::bind($address) !!}--}}
{{--                                        {!! BootForm::submit('Supprimer', 'label-danger label eraser') !!}--}}
{{--                                    {!! BootForm::close() !!}--}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>

        <!-- Div de l'onglet activités -->
        <div role="tabpanel" class="tab-pane fade" id="activites">
          <div class="col-sm-6 col-sm-offset-3">
              <div class="col-sm-12 text-center"><h3>Activités de {{ $user->firstname }}</h3></div>
              {{ aire()->open()->route('admin.user.updateActivities', $user->id)->method('PUT')->bind($user) }}
{{--                {!! BootForm::openHorizontal(['lg' => [2, 10]])->put()->action(route('admin.user.updateActivities', $user->id)) !!}--}}
{{--                    {!! Form::token() !!}--}}
{{--                    {!! BootForm::bind($user) !!}--}}
                  @foreach($activities as $act)
                      {{ aire()->checkbox('activities[]', $act->activityName)->value($act->id)->checked() }}
{{--                      @if($user->activities->contains($act->id))--}}
{{--                          {!! BootForm::checkbox($act->activityName, 'activities[]')->value($act->id)->check() !!}--}}
{{--                      @else--}}
{{--                          {!! BootForm::checkbox($act->activityName, 'activities[]')->value($act->id) !!}--}}
{{--                      @endif--}}
                  @endforeach
              {{ aire()->submit('Enregistrer')->class('float-end btn-pink') }}
{{--                {!! BootForm::submit('Enregistrer', 'pull-right btn-pink') !!}--}}
              {{ aire()->close() }}
{{--              {!! BootForm::close() !!}--}}
          </div>
        </div>

    </div> <!-- Fin div tab-content -->
@stop
{{--@section('script')--}}
{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $('#nav-membre').addClass('active');--}}
{{--            $('#nav-admin').addClass('active');--}}
{{--            $('#nav-admin-users').addClass('active');--}}
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
