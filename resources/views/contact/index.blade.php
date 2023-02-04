@section('title')
    <title>ASFL21, Contactez l'Association des Sages-Femmes Libérales de Côte d'Or</title>
@stop
@extends('layouts.index')
@section('content')
    <!-- Page Title -->
    <div class="content-container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Contactez nous</h1>
                <div class="row">
                    <p id="contact-add">Association des Sages-Femmes Libérales de Côte d'Or, &nbsp; <span class="numbers">69 Avenue Jean Jaurès, 21000 DIJON</span>, &nbsp; Tel: <span class="numbers">06 49 63 43 59</span></p>
                </div>
            </div>
        </div>

    <!-- Contact Us -->
        <div class="row">
            <div class="col-sm-7" id="contact-add-form">
                {!! BootForm::openHorizontal(['lg' => [3, 9]])->post()->action(route('sendcontact')) !!}
                    {!! Form::token() !!}
                    {!! BootForm::text('Votre nom*', 'name')->placeHolder('Votre nom ...')->required() !!}
                    {!! BootForm::text('Votre email*', 'email')->placeHolder('Votre email ...')->required() !!}
                    {!! BootForm::text('Votre sujet*', 'subject')->placeHolder('Votre sujet ...')->required() !!}
                    {!! BootForm::textarea('Votre message*', 'message')->placeHolder('Votre message ...')->required() !!}
                    {!! BootForm::checkbox('Je suis un professionnel', 'pro') !!}
                    <div class="col-lg-offset-3 col-lg-9">
                        {!!getCaptchaBox()!!}
                    </div>
                    {!! BootForm::submit('Envoyer', 'pull-right btn btn-pink') !!}
                {!! BootForm::close() !!}

            </div>
            <div class="col-sm-5">
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
