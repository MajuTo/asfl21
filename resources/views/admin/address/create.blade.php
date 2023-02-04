@extends('layouts.admin')
@section('content')
    <div class="col-sm-8 col-sm-offset-2">
        {!! BootForm::openHorizontal(['lg' => [2, 10]])->action(route('admin.adresse.store')) !!}
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
            {!! BootForm::textarea('Description', 'description')->placeHolder("Informations supplémentaires (horaires, etc...)") !!}

            {!! BootForm::submit('Ajouter', 'pull-right btn-pink') !!}

        {!! BootForm::close() !!}
    </div>
@stop
