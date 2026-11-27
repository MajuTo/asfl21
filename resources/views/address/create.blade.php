@extends('layouts.index')
@section('content')
    <div class="col-sm-8 col-sm-offset-2">
        {{ Aire::open()->route('adresse.store') }}
            {{ Aire::bind($address) }}
            {{ Aire::input('name', 'Nom')->placeholder("Nom de l'adresse...")->required() }}
            {{ Aire::input('address', 'Adresse')->placeholder("Adresse...")->required() }}
            {{ Aire::input('zipCode', 'Code postal')->placeholder("Code postal...")->required() }}
            {{ Aire::input('city', 'Ville')->placeholder("Ville...")->required() }}
            {{ Aire::input('phone', 'Téléphone Fixe')->placeholder("Téléphone fixe...") }}
            {{ Aire::checkbox('hidePhone', 'Téléphone privé')->checked($address->hidePhone) }}
            {{ Aire::textarea('description', 'Informations supplémentaires')->placeholder("Informations supplémentaires (horaires, etc...)")->helpText("Informations supplémentaires (horaires, etc...)")->addClass('ckeditor') }}

            {{ Aire::submit('Ajouter')->addClass('pull-right btn-pink') }}

        {{ Aire::close() }}
    </div>
@endsection
