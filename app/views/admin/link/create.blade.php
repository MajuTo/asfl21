@extends('layouts.admin')
@section('content')
    {{ BootForm::openHorizontal(3, 9)->action(URL::route('admin.link.store')) }}
        {{ Form::token() }}
        {{ BootForm::bind($link) }}
        {{ BootForm::text('Nom', 'linkName')->placeHolder("Nom du lien...")->required() }}
        {{ BootForm::text('Lien', 'link')->placeHolder("Lien...")->required() }}
        {{ BootForm::submit('Ajouter', 'pull-right btn-pink') }}
    {{ BootForm::close() }}
@stop