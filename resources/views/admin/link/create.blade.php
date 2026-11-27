@extends('layouts.admin')
@section('content')
    {{ Aire::open()->route('admin.link.store') }}
        {{ Aire::bind($link) }}
        {{ Aire::input('linkName', 'Nom')->placeholder("Nom du lien...")->required() }}
        {{ Aire::input('link', 'Lien')->placeholder("Lien...")->required() }}
        {{ Aire::input('address', 'Adresse')->placeholder("Adresse...") }}
        {{ Aire::input('zipCode', 'Code Postal')->placeholder("Code Postal...") }}
        {{ Aire::input('city', 'Ville')->placeholder("Ville...") }}
        {{ Aire::input('phone', 'Téléphone')->placeholder("Téléphone...") }}
        {{ Aire::submit('Ajouter')->addClass('float-end btn-pink') }}
    {{ Aire::close() }}
@endsection
