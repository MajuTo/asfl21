@extends('layouts.admin')
@section('admincontent')
<div class="row">
    <h3 class="offset-2">Ajout d'un utilisateur</h3>
    <div class="col-sm-6">
        {{ aire()->open()->route('admin.user.store')->method('POST')->bind($user) }}
        {{ aire()->input('name', 'Nom')->placeHolder("Nom de l'adhérent...")->required()->groupAddClass('mb-2') }}
        {{ aire()->input('firstname', 'Prénom')->placeHolder("Prénom de l'adhérent...")->required()->groupAddClass('mb-2') }}
        {{ aire()->email('email', 'Email')->placeHolder("Email de l'adhérent ...")->required()->groupAddClass('mb-0') }}
        {{ aire()->checkbox('hideEmail', 'Email privé')->groupAddClass('mb-2') }}
        {{ aire()->input('phone', 'Téléphone')->placeHolder("Téléphone de l'adhérent ...")->groupAddClass('mb-0') }}
        {{ aire()->checkbox('hidePhone', 'Téléphone privé')->groupAddClass('mb-2') }}
        {{ aire()->input('mobile', 'Mobile')->placeHolder("Mobile de l'adhérent ...")->groupAddClass('mb-0') }}
        {{ aire()->checkbox('hideMobile', 'Mobile privé')->groupAddClass('mb-2') }}
        {{ aire()->input('fax', 'Fax')->placeHolder("Fax de l'adhérent ...")->groupAddClass('mb-0') }}
        {{ aire()->checkbox('hideFax', 'Fax privé')->groupAddClass('mb-2') }}
        {{ aire()->select($groups, 'group_id', 'Groupe') }}
{{--        {!! BootForm::openHorizontal(['lg' => [3, 9]])->action(route('admin.user.store')) !!}--}}
{{--            {!! Form::token() !!}--}}
{{--            {!! BootForm::bind($user) !!}--}}
{{--            {!! BootForm::text('Nom', 'name')->placeHolder("Nom de l'adhérent...")->required() !!}--}}
{{--            {!! BootForm::text('Prénom', 'firstname')->placeHolder("Prénom de l'adhérent...")->required() !!}--}}
{{--            {!! BootForm::text('Email', 'email')->placeHolder("Email de l'adhérent ...")->required() !!}--}}
{{--            @if($user->hideEmail)--}}
{{--                {!! BootForm::checkbox('Email privé', 'hideEmail')->check() !!}--}}
{{--            @else--}}
{{--                {!! BootForm::checkbox('Email privé', 'hideEmail') !!}--}}
{{--            @endif--}}
{{--            {!! BootForm::text('Téléphone', 'phone')->placeHolder("Téléphone de l'adhérent...") !!}--}}
{{--            @if($user->hidePhone)--}}
{{--                {!! BootForm::checkbox('Téléphone privé', 'hidePhone')->check() !!}--}}
{{--            @else--}}
{{--                {!! BootForm::checkbox('Téléphone privé', 'hidePhone') !!}--}}
{{--            @endif--}}
{{--            {!! BootForm::text('Mobile', 'mobile')->placeHolder("Mobile de l'adhérent...") !!}--}}
{{--            @if($user->hideMobile)--}}
{{--                {!! BootForm::checkbox('Mobile privé', 'hideMobile')->check() !!}--}}
{{--            @else--}}
{{--                {!! BootForm::checkbox('Mobile privé', 'hideMobile') !!}--}}
{{--            @endif--}}
{{--            {!! BootForm::text('Fax', 'fax')->placeHolder("Fax de l'adhérent...") !!}--}}
{{--            @if($user->hideFax)--}}
{{--                {!! BootForm::checkbox('Fax privé', 'hideFax')->check() !!}--}}
{{--            @else--}}
{{--                {!! BootForm::checkbox('Fax privé', 'hideFax') !!}--}}
{{--            @endif--}}
{{--            {!! BootForm::select('Groupe', 'group_id')->options($groups) !!}--}}
    </div>
    <div class="col-sm-6">
        @foreach($activities as $act)
            {{ aire()->checkbox('activities[]', $act->activityName)->value($act->id)->checked(false)->class('mb-2') }}
{{--            {!! BootForm::checkbox($act->activityName, 'activities[]')->value($act->id) !!}--}}
        @endforeach
        {{ aire()->submit('Ajouter')->class('float-end btn-pink') }}
{{--            {!! BootForm::submit('Ajouter', 'pull-right btn-pink') !!}--}}
            {{ aire()->close() }}
{{--        {!! BootForm::close() !!}--}}
    </div>
</div>
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
