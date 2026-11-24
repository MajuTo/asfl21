@extends('layouts.admin')
@section('content')
    {!! Aire::open()->multipart()->route('admin.partner.update', $partner->id)->put() !!}
        {!! Aire::bind($partner) !!}
        {!! Aire::input('partnerName', 'Nom')->placeholder("Nom du lien...")->required() !!}
        {!! Aire::input('contact', 'Contact')->placeholder("Contact...") !!}
        {!! Aire::file('logo_file', 'Logo')->placeholder("Logo du partenaire...") !!}
        {!! Aire::checkbox('delete_logo', 'Effacer le logo') !!}
        {!! Aire::submit('Enregistrer')->addClass('pull-right btn-pink') !!}
    {!! Aire::close() !!}
    @if($partner->logo)
        {{ Html::image(asset($partner->logo), 'Logo de '.$partner->partnerName, ['class' => 'admin_logo_edit']) }}
    @endif
@stop
