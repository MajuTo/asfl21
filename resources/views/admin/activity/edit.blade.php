@extends('layouts.admin')
@section('admincontent')
    <div class="col-8">
        <h3 class="offset-2">Edition de l'activité {{ $activity->activityName }}</h3>
        {{ aire()->open()->route('admin.activity.update', $activity)->method('PUT')->bind($activity) }}
        {{ aire()->input('activityName', 'Nom')->placeholder("Nom de l'activité...")->required()->groupAddClass('mb-3') }}
        {{ aire()->textarea('activityDesc', 'Description')->rows(10)->placeHolder("Description de l'activité...")->groupAddClass('mb-3') }}
        {{ aire()->submit('Ajouter')->class('btn-pink float-end') }}
        {{ aire()->close() }}
{{--    {!! BootForm::openHorizontal(['lg' => [3, 9]])->put()->action(route('admin.activity.update', $activity->id)) !!}--}}
{{--        {!! Form::token() !!}--}}
{{--        {!! BootForm::bind($activity) !!}--}}
{{--        {!! BootForm::text('Nom', 'activityName')->placeHolder("Nom de l'activité...")->required() !!}--}}
{{--        {!! BootForm::textarea('Description', 'activityDesc')->placeHolder("Description de l'activité...")->required() !!}--}}
{{--        {!! BootForm::submit('Enregistrer', 'pull-right btn-pink') !!}--}}
{{--    {!! BootForm::close() !!}--}}
    </div>
@stop
{{--@section('script')--}}
{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $('#nav-membre').addClass('active');--}}
{{--            $('#nav-admin').addClass('active');--}}
{{--            $('#nav-admin-activities').addClass('active');--}}
{{--        });--}}
{{--    </script>--}}
{{--@stop--}}
