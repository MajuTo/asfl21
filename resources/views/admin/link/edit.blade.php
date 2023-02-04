@extends('layouts.admin')
@section('content')
    {!! BootForm::openHorizontal(['lg' => [3, 9]])->put()->action(route('admin.link.update', $link->id)) !!}
        {!! Form::token() !!}
        {!! BootForm::bind($link) !!}
        {!! BootForm::text('Nom', 'linkName')->placeHolder("Nom du lien...")->required() !!}
        {!! BootForm::text('Lien', 'link')->placeHolder("Lien...")->required() !!}
        {!! BootForm::text('Adresse', 'address')->placeHolder("Adresse...") !!}
        {!! BootForm::text('Code Postal', 'zipCode')->placeHolder("Code Postal...") !!}
        {!! BootForm::text('Ville', 'city')->placeHolder("Ville...") !!}
        {!! BootForm::text('Téléphone', 'phone')->placeHolder("Téléphone...") !!}
        {!! BootForm::submit('Enregistrer', 'pull-right btn-pink') !!}
    {!! BootForm::close() !!}
@stop
