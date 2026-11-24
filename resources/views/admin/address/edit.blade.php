@extends('layouts.admin')
@section('content')
<div class="content-container">
    <div class="col-sm-6 col-sm-offset-4">
        <h3>Modification d'une adresse de {{ $user->firstname }}</h3>
    </div>
    <div class="col-sm-9 col-sm-offset-1">
        @if($admin)
            {!! Aire::open()->route('admin.adresse.update', $address->id)->put() !!}
        @else
            {!! Aire::open()->route('adresse.update', $address->id)->put() !!}
        @endif
            {!! Aire::bind($address) !!}
            {!! Aire::input('name', 'Nom')->placeholder("Nom de l'adresse...")->required() !!}
            {!! Aire::input('address', 'Adresse')->placeholder("Adresse...")->required() !!}
            {!! Aire::input('zipCode', 'Code postal')->placeholder("Code postal...")->required() !!}
            {!! Aire::input('city', 'Ville')->placeholder("Ville...")->required() !!}
            {!! Aire::input('phone', 'Téléphone Fixe')->placeholder("Téléphone fixe...") !!}
{{--            @if($address->hidePhone)--}}
            {!! Aire::checkbox('hidePhone', 'Téléphone privé')->checked($address->hidePhone) !!}
{{--            @else--}}
{{--                {!! Aire::checkbox('hidePhone', 'Téléphone privé') !!}--}}
{{--            @endif--}}
            {!! Aire::input('fax', 'Fax')->placeholder("Fax...") !!}
{{--            @if($address->hideFax)--}}
            {!! Aire::checkbox('hideFax', 'Ne pas montrer mon fax')->checked($address->hideFax) !!}
{{--            @else--}}
{{--                {!! Aire::checkbox('hideFax', 'Ne pas montrer mon fax') !!}--}}
{{--            @endif--}}
            {!! Aire::textarea('description', 'Informations supplémentaires')->placeholder("Informations supplémentaires (horaires, etc...)") !!}
            {!! Aire::submit('Enregistrer')->addClass('pull-right btn-pink') !!}
        {!! Aire::close() !!}
    </div>
</div>
@stop
