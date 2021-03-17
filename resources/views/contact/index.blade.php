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
                {!! BootForm::open(['lg' => [3, 9]])->post()->action(route('sendcontact')) !!}
                    {!! Form::token() !!}
                    {!! BootForm::text('Votre nom', 'name')->placeHolder('Votre nom ...')->required(); //->addGroupClass('row text-right')->labelClass('font-weight-bold my-auto') !!}
                    {!! BootForm::email('Votre email', 'email')->placeHolder('Votre email ...')->required(); //->addGroupClass('row text-right')->labelClass('font-weight-bold my-auto') !!}
                    {!! BootForm::text('Votre sujet', 'subject')->placeHolder('Votre sujet ...')->required(); //->addGroupClass('row text-right')->labelClass('font-weight-bold my-auto') !!}
                    {!! BootForm::textarea('Votre message', 'message')->placeHolder('Votre message ...')->required(); //->addGroupClass('row text-right')->labelClass('font-weight-bold my-auto') !!}
{{--                    {!! BootForm::checkbox('Je suis un professionnel', 'pro') !!}--}}
                    <div class="mb-3 col-9 custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" name="pro" id="checkbox-pro">
                        <label class="custom-control-label" for="checkbox-pro">Je suis un professionnel</label>
                    </div>
                    {!! BootForm::submit('Envoyer', 'pull-right btn btn-pink') !!}
                {!! BootForm::close() !!}

            </div>
            <div class="col-12 col-xl-7">
                <div class="map" id="contact-map"></div>
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
          let myLatlng = new google.maps.LatLng(47.310990, 5.0267596);
          let mapOptions = {
            zoom: 15,
            center: myLatlng
          }
          let map = new google.maps.Map(document.getElementById('contact-map'), mapOptions);

          let marker = new google.maps.Marker({
              position: myLatlng,
              map: map,
              title: 'ASFL21'
          });
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@stop
