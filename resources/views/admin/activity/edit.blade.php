@extends('layouts.admin')
@section('content')
    {{ Aire::open()->route('admin.activity.update', $activity->id)->put() }}
        {{ Aire::bind($activity) }}
        {{ Aire::input('activityName', 'Nom')->placeholder("Nom de l'activité...")->required() }}
        {{ Aire::textarea('activityDesc', 'Description')->placeholder("Description de l'activité...")->required() }}
        {{ Aire::submit('Enregistrer')->addClass('float-end btn-pink') }}
    {{ Aire::close() }}
@endsection
