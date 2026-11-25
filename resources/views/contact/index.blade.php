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
                    <p id="contact-add">Association des Sages-Femmes Libérales de Côte d'Or, &nbsp; <span class="numbers">27 A Boulevard des Bourroches, 21000 DIJON</span>, &nbsp; Tel: <span class="numbers">06 11 10 27 04</span></p>
                </div>
            </div>
        </div>

    <!-- Contact Us -->
        <div class="row">
            <div class="col-sm-7" id="contact-add-form">
                {{ Aire::open()->route('sendcontact') }}
                    {{ Aire::input('name', 'Votre nom*')->placeholder('Votre nom ...')->required() }}
                    {{ Aire::email('email', 'Votre email*')->placeholder('Votre email ...')->required() }}
                    {{ Aire::input('subject', 'Votre sujet*')->placeholder('Votre sujet ...')->required() }}
                    {{ Aire::textarea('message', 'Votre message*')->placeholder('Votre message ...')->required() }}
                    {{ Aire::checkbox('pro', 'Je suis un professionnel') }}
                    <x-captcha />
                    <x-honeypot />
                    {{ Aire::submit('Envoyer')->addClass('pull-right btn btn-pink') }}
                {{ Aire::close() }}

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
          let myLatlng = new google.maps.LatLng(47.30695956607417, 5.019860923828873);
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
