@extends('layouts.admin')
@section('content')
    {{ BootForm::openHorizontal(3, 9)->put()->action(URL::route('admin.activity.update', $activity->id)) }}
        {{ Form::token() }}
        {{ BootForm::bind($activity) }}
        {{ BootForm::text('Nom', 'activityName')->placeHolder("Nom de l'activité...")->required() }}
        {{ BootForm::textarea('Description', 'activityDesc')->placeHolder("Description de l'activité...")->required() }}
        {{ BootForm::submit('Enregistrer', 'pull-right btn-pink') }}
    {{ BootForm::close() }}
@stop