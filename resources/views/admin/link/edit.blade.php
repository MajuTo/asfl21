@extends('layouts.admin')
@section('admincontent')
    <div class="col-8">
        <h3 class="offset-2">Edition du lien {{ $link->linkName }}</h3>
        {{ aire()->open()->route('admin.link.update', $link)->bind($link) }}
        {{ aire()->input('linkName', 'Nom')->placeholder("Nom du lien...")->required()->groupAddClass('mb-3') }}
        {{ aire()->input('link', 'Lien')->placeholder("Lien...")->required()->groupAddClass('mb-3') }}
        {{ aire()->input('address', 'Adresse')->placeholder("Adresse...")->groupAddClass('mb-3') }}
        {{ aire()->input('zipCode', 'Code Postal')->placeholder("Code Postal...")->groupAddClass('mb-3') }}
        {{ aire()->input('city', 'Ville')->placeholder("Ville...")->groupAddClass('mb-3') }}
        {{ aire()->input('phone', 'Téléphone')->placeholder("Téléphone...")->groupAddClass('mb-3') }}
        {{ aire()->submit('Ajouter')->class('float-end btn-pink') }}
        {{ aire()->close() }}
{{--        {!! BootForm::openHorizontal(['lg' => [3, 9]])->put()->action(route('admin.link.update', $link->id)) !!}--}}
{{--        {!! Form::token() !!}--}}
{{--        {!! BootForm::bind($link) !!}--}}
{{--        {!! BootForm::text('Nom', 'linkName')->placeHolder("Nom du lien...")->required() !!}--}}
{{--        {!! BootForm::text('Lien', 'link')->placeHolder("Lien...")->required() !!}--}}
{{--        {!! BootForm::text('Adresse', 'address')->placeHolder("Adresse...") !!}--}}
{{--        {!! BootForm::text('Code Postal', 'zipCode')->placeHolder("Code Postal...") !!}--}}
{{--        {!! BootForm::text('Ville', 'city')->placeHolder("Ville...") !!}--}}
{{--        {!! BootForm::text('Téléphone', 'phone')->placeHolder("Téléphone...") !!}--}}
{{--        {!! BootForm::submit('Enregistrer', 'pull-right btn-pink') !!}--}}
{{--    {!! BootForm::close() !!}--}}
    </div>
@stop
{{--@section('script')--}}
{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $('#nav-membre').addClass('active');--}}
{{--            $('#nav-admin').addClass('active');--}}
{{--            $('#nav-admin-links').addClass('active');--}}
{{--        });--}}
{{--    </script>--}}
{{--@stop--}}
