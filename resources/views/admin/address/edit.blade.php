@extends('layouts.admin')
@section('content')
<div class="content-container">
    <div class="col-sm-6 col-sm-offset-4">
        <h3>Modification d'une adresse de {{ $user->firstname }}</h3>
    </div>
    <div class="col-sm-9 col-sm-offset-1">
        @if($admin)
            {!! BootForm::openHorizontal(['lg' => [3, 9]])->put()->action(route('admin.adresse.update', $address->id)) !!}
        @else
            {!! BootForm::openHorizontal(['lg' => [3, 9]])->put()->action(route('adresse.update', $address->id)) !!}
        @endif
            {!! Form::token() !!}
            {!! BootForm::bind($address) !!}
            {!! BootForm::text('Nom', 'name')->placeHolder("Nom de l'adresse...")->required() !!}
            {!! BootForm::text('Adresse', 'address')->placeHolder("Adresse...")->required() !!}
            {!! BootForm::text('Code postal', 'zipCode')->placeHolder("Code postal...")->required() !!}
            {!! BootForm::text('Ville', 'city')->placeHolder("Ville...")->required() !!}
            {!! BootForm::text('Téléphone Fixe', 'phone')->placeHolder("Téléphone fixe...") !!}
            @if($address->hidePhone)
                {!! BootForm::checkbox('Téléphone privé', 'hidePhone')->check() !!}
            @else
                {!! BootForm::checkbox('Téléphone privé', 'hidePhone') !!}
            @endif
            {!! BootForm::text('Fax', 'fax')->placeHolder("Fax...") !!}
            @if($address->hideFax)
                {!! BootForm::checkbox('Ne pas montrer mon fax', 'hideFax')->check() !!}
            @else
                {!! BootForm::checkbox('Ne pas montrer mon fax', 'hideFax') !!}
            @endif
            {!! BootForm::textarea('Informations supplémentaires', 'description')->placeHolder("Informations supplémentaires (horaires, etc...)") !!}
            {!! BootForm::submit('Enregistrer', 'pull-right btn-pink') !!}
        {!! BootForm::close() !!}
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