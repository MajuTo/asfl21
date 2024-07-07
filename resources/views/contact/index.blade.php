@section('title')
    <title>ASFL21, Contactez l'Association des Sages-Femmes Libérales de Côte d'Or</title>
@stop
@extends('layouts.index')
@section('content')
    <!-- Page Title -->
    <div class="content-container">
        <div class="row">
            <div class="col-12">
                <h1>Contactez nous</h1>
                <div class="row justify-content-center">
                    <p id="contact-add">Association des Sages-Femmes Libérales de Côte d'Or, &nbsp; <span class="numbers">69 Avenue Jean Jaurès, 21000 DIJON</span>, &nbsp; Tel: <span class="numbers">06 49 63 43 59</span></p>
                </div>
            </div>
        </div>

    <!-- Contact Us -->
        <div class="row">
            <div class="col-12 col-xl-5" id="contact-add-form">
                {{ aire()->form()->action(route('sendcontact'))->post()->open() }}
                    {{ aire()->input('name', 'Votre nom')->placeholder('Votre nom...')->groupAddClass('mb-3') }}
                    {{ aire()->email('email', 'Votre email')->placeholder('Votre email...')->groupAddClass('mb-3') }}
                    {{ aire()->input('subject', 'Votre sujet')->placeholder('Votre sujet...')->groupAddClass('mb-3') }}
                    {{ aire()->textArea('message', 'Votre message')->placeholder('Votre message...')->groupAddClass('mb-3') }}
                    {{ aire()->checkbox('pro', 'Je suis un professionnel')->placeholder('Votre message...')->groupAddClass('mb-3') }}
                    {!! captcha_img('math') !!}
                    {{ aire()->input('captcha')->groupAddClass('mb-3') }}
                    {{ aire()->submit('Envoyer')->class('btn btn-pink float-end') }}
                {{ aire()->close() }}
{{--                <x-inline-input name="test" label="test"></x-inline-input>--}}
{{--                <hr>--}}
{{--                <x-form>--}}
{{--                    <x-form-input name="name" id="name" label="Votre nom" floating class="mb-3"></x-form-input>--}}
{{--                    <x-form-input class="mb-3" type="email" name="email" id="email" label="Votre email" floating></x-form-input>--}}
{{--                    <x-form-input class="mb-3" name="subject" id="subject" label="Sujet du message" floating></x-form-input>--}}
{{--                    <x-form-textarea style="height: 200px;" name="message" id="message" label="Votre message" floating></x-form-textarea>--}}
{{--                    <x-form-checkbox name="pro" id="pro" label="Je suis un professionnel" switch></x-form-checkbox>--}}
{{--                    <x-form-submit class="float-end btn-pink">Envoyer</x-form-submit>--}}
{{--                </x-form>--}}

                {{--                <x-switch name="teste" label="switch" class="mb-3" {{ rand(0,1) ? 'checked' : '' }}></x-switch>--}}
{{--                <hr>--}}
{{--                <div class="form-floating mb-3">--}}
{{--                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">--}}
{{--                    <label for="floatingInput">Email address</label>--}}
{{--                </div>--}}


{{--                    {{ aire()->submit('Envoyer')->class('btn btn-primary pull-right') }}--}}

{{--                <div class="form-group custom-control custom-checkbox" data-aire-component="group" data-aire-for="pro">--}}
{{--                    <input type="checkbox" value="1" class="mb-3" data-aire-component="checkbox" name="pro" placeholder="Votre message..." data-aire-for="pro" id="__aire-0-pro13">--}}
{{--                    <label class="custom-control-label" data-aire-component="label" data-aire-validation-key="checkbox_label" data-aire-for="pro" for="__aire-0-pro13">--}}
{{--                        Je suis un professionnel--}}
{{--                    </label>--}}
{{--                    <div class="" data-aire-component="errors" data-aire-validation-key="group_errors" data-aire-for="pro">--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                {!! BootForm::open(['lg' => [3, 9]])->post()->action(route('sendcontact')) !!}--}}
{{--                    {!! Form::token() !!}--}}
{{--                    {!! BootForm::text('Votre nom', 'name')->placeHolder('Votre nom ...')->required(); //->addGroupClass('row text-right')->labelClass('font-weight-bold my-auto') !!}--}}
{{--                    {!! BootForm::email('Votre email', 'email')->placeHolder('Votre email ...')->required(); //->addGroupClass('row text-right')->labelClass('font-weight-bold my-auto') !!}--}}
{{--                    {!! BootForm::text('Votre sujet', 'subject')->placeHolder('Votre sujet ...')->required(); //->addGroupClass('row text-right')->labelClass('font-weight-bold my-auto') !!}--}}
{{--                    {!! BootForm::textarea('Votre message', 'message')->placeHolder('Votre message ...')->required(); //->addGroupClass('row text-right')->labelClass('font-weight-bold my-auto') !!}--}}
{{--                    {!! BootForm::checkbox('Je suis un professionnel', 'pro') !!}--}}
{{--                    <div class="mb-3 col-9 custom-control custom-switch">--}}
{{--                        <input type="checkbox" class="custom-control-input" name="pro" id="checkbox-pro">--}}
{{--                        <label class="custom-control-label" for="checkbox-pro">Je suis un professionnel</label>--}}
{{--                    </div>--}}
{{--                    {!! BootForm::submit('Envoyer', 'pull-right btn btn-pink') !!}--}}
{{--                {!! BootForm::close() !!}--}}

            </div>
            <div class="col-12 col-xl-7">
                <div class="map" id="contact-map"></div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script type="text/javascript">
        function initialize() {
            let myLatlng = new google.maps.LatLng(47.310990, 5.0267596);
            let mapOptions = {
                zoom: 15,
                center: myLatlng
            }
            let map = new google.maps.Map(document.getElementById('contact-map'), mapOptions);

            new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: 'ASFL21'
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@stop
