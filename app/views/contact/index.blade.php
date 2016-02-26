@extends('layouts.index')
@section('content')
    <!-- Page Title -->
    <div class="content-container"> 
        <div class="row">
            <div class="col-sm-12">
                <h1>Contactez nous</h1>
                <div class="row">
                    <div class="col-sm-6"><p>Remplissez le formulaire pour nous contacter</p></div>
                    <div class="col-sm-6"><h3 class="text-right" id="nous-h3"s>Nous sommes ici</h3></div>
                </div>
            </div>
        </div>

    <!-- Contact Us -->
        <div class="row">
            <div class="col-sm-7">
                {{ BootForm::openHorizontal(3, 9)->action(URL::route('sendcontact')) }}
                    {{ Form::token() }}
                    {{ BootForm::text('Votre nom*', 'name')->placeHolder('Votre nom ...')->required() }}
                    {{ BootForm::text('Votre email*', 'email')->placeHolder('Votre email ...')->required() }}
                    {{ BootForm::text('Votre sujet*', 'subject')->placeHolder('Votre sujet ...')->required() }}
                    {{ BootForm::textarea('Votre message*', 'message')->placeHolder('Votre message ...')->required() }}
                    {{ BootForm::checkbox('Je suis un professionnel', 'pro') }}
                    {{ BootForm::submit('Envoyer', 'pull-right btn btn-pink') }}
                {{ BootForm::close() }}

            </div>
            <div class="col-sm-5">
                <div class="map" id="contact-map"></div>
                <h3>Adresse</h3>
                <p>32 Bis bd Université,<br> 21000 DIJON</p>
                <p>Tel: 06 49 63 43 59</p>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-contact').addClass('active');
        });
        $(':checkbox:not(:checked)').parent().addClass('notchecked');
        $(':checkbox:checked').parent().addClass('checked');
        $(':checkbox').on('change', function(){
            if( $(this).parent().hasClass('checked') ){
                $(this).parent().removeClass('checked').addClass('notchecked');
            }else{
                $(this).parent().removeClass('notchecked').addClass('checked');
            }
        });
    </script>

    <script type="text/javascript">
        function initialize() {
          var myLatlng = new google.maps.LatLng(47.313208, 5.058476);
          var mapOptions = {
            zoom: 15,
            center: myLatlng
          }
          var map = new google.maps.Map(document.getElementById('contact-map'), mapOptions);

          var marker = new google.maps.Marker({
              position: myLatlng,
              map: map,
              title: 'ASFL21'
          });
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@stop