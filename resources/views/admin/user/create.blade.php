@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-sm-6">
        {{ Aire::open()->route('admin.user.store') }}
            {{ Aire::bind($user) }}
            {{ Aire::input('name', 'Nom')->placeholder("Nom de l'adhérent...")->required() }}
            {{ Aire::input('firstname', 'Prénom')->placeholder("Prénom de l'adhérent...")->required() }}
            {{ Aire::input('email', 'Email')->placeholder("Email de l'adhérent ...")->required() }}
            {{ Aire::checkbox('hideEmail', 'Email privé')->checked($user->hideEmail ?? false) }}
            {{ Aire::input('phone', 'Téléphone')->placeholder("Téléphone de l'adhérent...") }}
            {{ Aire::checkbox('hidePhone', 'Téléphone privé')->checked($user->hidePhone ?? false) }}
            {{ Aire::input('mobile', 'Mobile')->placeholder("Mobile de l'adhérent...") }}
            {{ Aire::checkbox('hideMobile', 'Mobile privé')->checked($user->hideMobile ?? false) }}
            {{ Aire::input('fax', 'Fax')->placeholder("Fax de l'adhérent...") }}
            {{ Aire::checkbox('hideFax', 'Fax privé')->checked($user->hideFax ?? false) }}
            {{ Aire::select($groups, 'group_id', 'Groupe') }}
    </div>
    <div class="col-sm-6">
        {{ Aire::checkboxGroup('test', 'activities', 'label') }}
{{--        @foreach($activities as $act)--}}
{{--            @dd($act)--}}
{{--            {{ Aire::checkbox('activities[]')->value($act->id)->label($act->activityName) }}--}}
{{--        @endforeach--}}
            {{ Aire::submit('Ajouter')->addClass('pull-right btn-pink') }}
        {{ Aire::close() }}
    </div>
</div>
@stop
