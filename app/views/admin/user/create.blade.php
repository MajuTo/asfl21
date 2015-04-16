@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-sm-6">
        {{ BootForm::openHorizontal(3, 9)->action(URL::route('admin.user.store')) }}
            {{ Form::token() }}
            {{ BootForm::bind($user) }}
            {{ BootForm::text('Nom', 'name')->placeHolder("Nom de l'adhérent...")->required() }}
            {{ BootForm::text('Prénom', 'firstname')->placeHolder("Prénom de l'adhérent...")->required() }}
            {{ BootForm::text('Email', 'email')->placeHolder("Email de l'adhérent ...")->required() }}
            {{ BootForm::text('Téléphone', 'phone')->placeHolder("Téléphone de l'adhérent...") }}
            {{ BootForm::text('Mobile', 'mobile')->placeHolder("Mobile de l'adhérent...") }}
            {{ BootForm::text('Fax', 'fax')->placeHolder("Fax de l'adhérent...") }}
            {{ BootForm::text('Adresse', 'address')->placeHolder("Adresse de l'adhérent...")->required() }}
            {{ BootForm::text('Code postal', 'zipCode')->placeHolder("Code postal de l'adhérent...")->required() }}
            {{ BootForm::text('Ville', 'city')->placeHolder("Ville de l'adhérent...")->required() }}
            {{ BootForm::select('Groupe', 'group_id')->options($groups) }}
    </div>
    <div class="col-sm-6">
        @foreach($activities as $act)
            {{ BootForm::checkbox($act->activityName, 'activities[]')->value($act->id) }}
        @endforeach
            {{ BootForm::submit('Ajouter', 'pull-right btn-pink') }}
        {{ BootForm::close() }}
    </div>
</div>
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-membre').addClass('active');
            $('#nav-admin').addClass('active');
            $('#nav-admin-users').addClass('active');
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