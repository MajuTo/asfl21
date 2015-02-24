@extends('layouts.admin')
@section('content')
    {{ BootForm::openHorizontal(3, 9)->put()->action(URL::route('admin.partner.update', $partner->id)) }}
        {{ Form::token() }}
        {{ BootForm::bind($partner) }}
        {{ BootForm::text('Nom', 'partnerName')->placeHolder("Nom du lien...")->required() }}
        {{ BootForm::text('Contact', 'contact')->placeHolder("Contact...") }}
        {{ BootForm::file('Logo', 'logo')->placeHolder("Logo du partenaire...") }}
        {{ BootForm::submit('Enregistrer', 'pull-right btn-pink') }}
    {{ BootForm::close() }}
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