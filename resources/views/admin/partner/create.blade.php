@extends('layouts.admin')
@section('content')
    {!! BootForm::openHorizontal(['lg' => [3, 9]])->action(route('admin.partner.store'))->multipart() !!}
        {!! Form::token() !!}
        {!! BootForm::bind($partner) !!}
        {!! BootForm::text('Nom', 'partnerName')->placeHolder("Nom du partenaire...")->required() !!}
        {!! BootForm::text('Contact', 'contact')->placeHolder("Contact...") !!}
        {!! BootForm::file('Logo', 'logo_file')->placeHolder("Logo du partenaire...") !!}
        {!! BootForm::submit('Ajouter', 'pull-right btn-pink') !!}
    {!! BootForm::close() !!}
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-membre').addClass('active');
            $('#nav-admin').addClass('active');
            $('#nav-admin-partners').addClass('active');
        });
    </script>
@stop