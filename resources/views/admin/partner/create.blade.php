@extends('layouts.admin')
@section('content')
    {{ Aire::open()->multipart()->route('admin.partner.store') }}
        {{ Aire::bind($partner) }}
        {{ Aire::input('partnerName', 'Nom')->required()->placeholder("Nom du partenaire...") }}
        {{ Aire::input('contact', 'Contact')->placeholder("Contact...") }}
        {{ Aire::file('logo_file', 'Logo')->placeholder("Logo du partenaire...") }}
        {{ Aire::submit('Ajouter')->addClass('pull-right btn-pink') }}
    {{ Aire::close() }}
@stop
