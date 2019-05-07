@extends('layouts.admin')
@section('content')
    <div class="col-sm-8 col-sm-offset-2">
        {!! BootForm::openHorizontal((['lg' => [2, 10]])->action(route('admin.adresse.store')) !!}
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
            {!! BootForm::textarea('Description', 'description')->placeHolder("Informations supplémentaires (horaires, etc...)") v

            {!! BootForm::submit('Ajouter', 'pull-right btn-pink') !!}

        {!! BootForm::close() !!}
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