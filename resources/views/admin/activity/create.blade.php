@extends('layouts.admin')
@section('content')
    {{ Aire::open()->route('admin.activity.store') }}
        {{ Aire::bind($activity) }}
        {{ Aire::input('activityName', 'Nom')->placeholder("Nom de l'activité...")->required() }}
        {{ Aire::textarea('activityDesc', 'Description')->placeholder("Description de l'activité...")->required() }}
        {{ Aire::submit('Ajouter')->addClass('pull-right btn-pink') }}
    {{ Aire::close() }}
@stop
