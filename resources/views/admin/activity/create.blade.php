@extends('layouts.admin')
@section('content')
    {!! BootForm::openHorizontal(['lg' => [3, 9]])->action(route('admin.activity.store')) !!}
        {!! Form::token() !!}
        {!! BootForm::bind($activity) !!}
        {!! BootForm::text('Nom', 'activityName')->placeHolder("Nom de l'activité...")->required() !!}
        {!! BootForm::textarea('Description', 'activityDesc')->placeHolder("Description de l'activité...")->required() !!}
        {!! BootForm::submit('Ajouter', 'pull-right btn-pink') !!}
    {!! BootForm::close() !!}
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-membre').addClass('active');
            $('#nav-admin').addClass('active');
            $('#nav-admin-activities').addClass('active');
        });
    </script>
@stop