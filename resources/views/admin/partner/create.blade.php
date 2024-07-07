@extends('layouts.admin')
@section('admincontent')
    <div class="col-8">
{{--    {!! BootForm::openHorizontal(['lg' => [3, 9]])->action(route('admin.partner.store'))->multipart() !!}--}}
{{--        {!! Form::token() !!}--}}
{{--        {!! BootForm::bind($partner) !!}--}}
{{--        {!! BootForm::text('Nom', 'partnerName')->placeHolder("Nom du partenaire...")->required() !!}--}}
{{--        {!! BootForm::text('Contact', 'contact')->placeHolder("Contact...") !!}--}}
{{--        {!! BootForm::file('Logo', 'logo_file')->placeHolder("Logo du partenaire...") !!}--}}
{{--        {!! BootForm::submit('Ajouter', 'pull-right btn-pink') !!}--}}
{{--    {!! BootForm::close() !!}--}}
    {{ aire()->open()->route('admin.partner.store')->method('POST')->multipart() }}
        {{ aire()->input('partnerName', 'Nom')->required()->groupAddClass('mb-3') }}
        {{ aire()->input('contact', 'Contact')->required()->groupAddClass('mb-3') }}
        {{ aire()->file('logo_file', 'Logo')->groupAddClass('mb-3') }}
        {{ aire()->submit('Envoyer')->addClass('float-end btn-pink')->removeClass('btn-primary') }}
    {{ aire()->close() }}
{{--    <x-form :action="route('admin.partner.store')">--}}
{{--        @bind($partner)--}}
{{--        <div class="row">--}}
{{--            <x-form-input class="col-12" type="text" name="partnerName" label="Nom" required></x-form-input>--}}
{{--            <x-form-input class="col-12" type="text" name="contact" label="Contact" required></x-form-input>--}}
{{--            <x-form-input class="col-12" type="file" name="logo_file" label="Logo" required></x-form-input>--}}
{{--        </div>--}}
{{--        <x-form-submit class="btn btn-pink float-end3">Envoyer</x-form-submit>--}}
{{--    </x-form>--}}
    </div>
@stop
{{--@section('script')--}}
{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $('#nav-membre').addClass('active');--}}
{{--            $('#nav-admin').addClass('active');--}}
{{--            $('#nav-admin-partners').addClass('active');--}}
{{--        });--}}
{{--    </script>--}}
{{--@stop--}}
