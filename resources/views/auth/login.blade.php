@extends('auth.layout')
@section('auth.title')
    <h1 class="animate-page-title">Identification</h1>
@stop
@section('auth.content')
    {{--<section id="espacepro">--}}
        {{--<div class="row">--}}
            {{--<div class="col-sm-12">--}}
                {{--<h1 class="animate-page-title">Identification</h1>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row">--}}
            {{--<div class="col-sm-6">--}}
                {{--<img class="img-responsive img-rounded" src="{{ asset('assets/img/pregnant-collection/feet-619534_1280.jpg') }}" alt="pieds de bébé">--}}
            {{--</div>--}}
            {{--<div class="col-sm-6">--}}
                <div>
                    {{ link_to(route('password.request'), 'Mot de passe oublié?', ['class' => 'pull-right']) }}
                </div>
                <div id="email-reminder">
                    {!! BootForm::openHorizontal(['lg' => [3, 9]])->action(route('login')) !!}
                        {{--{!! Form::token() !!}--}}
                        {!! BootForm::text('Pseudo', 'username') !!}
                        {!! BootForm::password('Mot de passe', 'password') !!}
                        {!! BootForm::submit('Envoyer', 'pull-right btn-pink') !!}
                    {!! BootForm::close() !!}
                </div>
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
{{--@stop--}}
{{--@section('script')--}}
    {{--<script>--}}
        {{--$(document).ready(function(){--}}
            {{--$('#nav-login').addClass('active');--}}
        {{--});--}}
    {{--</script>--}}
@stop