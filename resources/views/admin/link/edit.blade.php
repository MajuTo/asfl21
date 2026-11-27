@extends('layouts.admin')
@section('content')
    {{ Aire::open()->route('admin.link.update', $link->id)->put() }}
        {{ Aire::bind($link) }}
        {{ Aire::input('linkName', 'Nom')->placeholder("Nom du lien...")->required() }}
        {{ Aire::input('link', 'Lien')->placeholder("Lien...")->required() }}
        {{ Aire::input('address', 'Adresse')->placeholder("Adresse...") }}
        {{ Aire::input('zipCode', 'Code Postal')->placeholder("Code Postal...") }}
        {{ Aire::input('city', 'Ville')->placeholder("Ville...") }}
        {{ Aire::input('phone', 'Téléphone')->placeholder("Téléphone...") }}
        {{ Aire::submit('Enregistrer')->addClass('pull-right btn-pink') }}
    {{ Aire::close() }}
@endsection
