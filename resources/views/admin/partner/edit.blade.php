@extends('layouts.admin')
@section('content')
    {!! BootForm::openHorizontal(['lg' => [3, 9]])->put()->action(route('admin.partner.update', $partner->id))->multipart() !!}
        {!! Form::token() !!}
        {!! BootForm::bind($partner) !!}
        {!! BootForm::text('Nom', 'partnerName')->placeHolder("Nom du lien...")->required() !!}
        {!! BootForm::text('Contact', 'contact')->placeHolder("Contact...") !!}
        {!! BootForm::file('Logo', 'logo_file')->placeHolder("Logo du partenaire...") !!}
        {!! BootForm::checkbox('Effacer le logo', 'delete_logo') !!}
        {!! BootForm::submit('Enregistrer', 'pull-right btn-pink') !!}
    {!! BootForm::close() !!}
    @if($partner->logo)
        {{ Html::image(asset($partner->logo), 'Logo de '.$partner->partnerName, ['class' => 'admin_logo_edit']) }}
    @endif
@stop
