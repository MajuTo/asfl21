@section('title')
    <title>ASFL21, Où trouver une sage-femme en côte d'or</title>
@stop
@extends('layouts.index')
@section('content')
<section id="noustrouver">
  <div class="row">
      <div class="col-xs-12">
          <h1>Trouver une sage femme libérale</h1>
          <p class="text-center" id="noustrouver-subtext">Sélectionnez les activités qui vous intéresses, puis la ou les sages-femmes qui éffectuent ces activités. Pour plus d'information sur une sage-femme en particulier, cliquer sur <i class="fa fa-external-link"></i> à droite du nom de la sage-femme ou directement sur la map.</p>
      </div>
  </div>
  <div class="row">
    <!-- Activities list -->
    <div class="col-xs-12 col-sm-12">
      <fieldset>
        <legend>Activités <i class="pull-right fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Sélectionnez ou désélectionnez les activités que vous souhaitez."></i></legend>
        <div id="act-divs">
          @foreach ($activities as $activity)
            <div class="tag act-name" data-activity="{{ $activity->id }}" id="{{ $activity->id }}">
              <span>
                {{ Str::title($activity->activityName) }}
              </span>
            </div>
          @endforeach
        </div>
      </fieldset>
    </div>
    <!-- END Activities list -->
    <!-- AJAX liste des sf selon activité -->
    <div class="col-xs-12 col-sm-3">
      <fieldset>
        <legend>Sages Femmes <i id="tooltip-sf" class="pull-right fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Sélectionnez ou désélectionnez une sage femme."></i>
        </legend>
        <div id="sf-divs">
          @foreach ($sagesfemmes as $sf) 
             <div class="tag">
              <span class="sf-name" data-sf="{{ $sf->id }}" id="{{ $sf->id }}">
                {{{ Str::upper($sf->name) }}} {{{ Str::title($sf->firstname) }}}
              </span>
              <span class="contact-link">
                <a href="{{ URL::route('user.show', [$sf->id, strtoupper($sf->name) . '-' . ucfirst($sf->firstname)]) }}" target="_blank">
                  <i id="tooltip-sf" class="fa fa-external-link" data-toggle="tooltip" data-placement="top" title="Contact"></i>
                </a>
              </span>
             </div>
          @endforeach
          </div>
     </fieldset>
    </div>
    <!-- END AJAX liste des sf selon activite -->
    <!-- GOOGLE MAP -->
    <div class="col-sm-9" id="gmap">
      <div class="map_container">
        <div id="panel">
          <input id="chezvous_textbox" type="textbox" placeholder="Votre adresse">
          <input id="chezvous_button" type="button" value="go" onclick="codeAddress()">
        </div>
        <div class="map_canvas" id="map_canvas"></div>
      </div>
    </div>
    <!-- END GOOGLE MAP -->
  </div>
</section>
@stop
@section('script')
    <script>
        $(document).ready(function(){
          // active navbar
          $('#nav-trouver').addClass('active');

          // tooltip
          $(function () {
            $('[data-toggle="tooltip"]').tooltip()
          });

          // on google map 'chez vous' search
          $('#chezvous_textbox').keyup(function(event){
            if(event.keyCode == 13){
              $('#chezvous_button').click();
            }
          });

          // get selected activities
          function getSelectedActivities(){
            var selected_id = [];
            $.each($('.act-name.active'), function(){
              selected_id.push($(this).attr('id'));
            })
            return selected_id;
          }

          // get selected sf
          function getSelectedSf(){
            var selected_sf = [];
            $.each($('.sf-name.active'), function(){
              selected_sf.push($(this).attr('id'));
            })
            return selected_sf;
          }

          // load list of sf by activity
          function printSfByActivity(){
            var activity_id = $(this).data('activity');
            var selectedActivities = getSelectedActivities();

            $.ajax({
              url:  "{{ URL::route('getSfByActivity') }}",
              type: 'POST',
              data: {selectedActivities: selectedActivities},
              success: function(response){
                $('#sf-divs').html(response);
                toggleMarkers();
              }
            });

          }

          // Cache tous les markers de la Google Map
          function hideAllMarkers(){
            for(i=0; i<markers.length; i++){
              markers[i].setVisible(false)
            }
          }

          // Affiche tous les markers
          function showAllMarkers(){
            for(i=0; i<markers.length; i++){
              markers[i].setVisible(true)
            }
          }

          // Affiche les sages femmes selectionnées 
          function showSelectedSf(){
            $('.sf-name.active').each(function(){
              var sf = $(this).data('sf');

              for(i=0; i<markers.length; i++){
                if ( sf == markers[i]['id'].split('_')[0] ) {
                  markers[i].setVisible(true)
                };
              }
            });
          }

          // Affiche toutes les sages femmes des activités selectionnées
          function showAllSfByActivities() {
            $('.sf-name').each(function(){
              var sf = $(this).data('sf');

              for(i=0; i<markers.length; i++){
                if ( sf == markers[i]['id'].split('_')[0] ) {
                  markers[i].setVisible(true)
                };
              }
            });
          }

          function toggleMarkers(){
            
            // Par défaut on cache tous les markers, et plus loin on n'affiche que ceux qui doivent l'être
            hideAllMarkers();

            if( $('.sf-name.active').length > 0 ){ // Si au moins une sage femme est selectionnée
              showSelectedSf();
            } else { // Si aucune sage femme n'est selectionnée
              if( $('.act-name.active').length > 0 ){ // Si au moins une activité est selectionnée
                showAllSfByActivities();
              } else { // Si rien n'est selectionné, ni sf ni activité
                showAllMarkers();
              }
            }
          } // Fin ToggleMarkers

          // select and unselect activities 
          $('.act-name').on('click', function(){
            $(this).toggleClass('active');
            $('.sf-name').removeClass('active');
            toggleMarkers();
            printSfByActivity();            
          });

          // On bind le click sur le #table-sf car il n'est pas rechargé en Ajax
          // et on dit a quel élément de ce table on associe le click (suis je clair ?)
          // Du coup, plus besoin de js dans la vue chargée en Ajax
          $('#sf-divs').on('click', '.sf-name', function(){
            $(this).toggleClass('active');
            toggleMarkers();
          });
        });
    </script>

    <!-- GOOGLE MAPS -->
     <script type="text/javascript">
      var marker; 
      var markers = [];
      var map;
      var geocoder;

        function initialize() {
          geocoder = new google.maps.Geocoder();

          var mapOptions = {
            zoom: 9,
            center: new google.maps.LatLng(47.313208, 5.058476)
          }

          map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

          var infowindow = new google.maps.InfoWindow();

          @foreach ($sagesfemmes as $sf)
            @foreach ($sf->addresses as $address)
              
              @if ($address->lat != null and $address->lng != null)
                
                var marker{{ $sf->id }}_{{$address->id}} = new google.maps.Marker({
                    position: new google.maps.LatLng( {{ $address->lat }}, {{ $address->lng }}),
                    id: {{$sf->id}} + '_' + {{$address->id}},
                    map: map,
                    title: '{{ Str::title($sf->firstname) }} {{ Str::upper($sf->name) }}',
                    optimized: false
                });
                markers.push(marker{{ $sf->id }}_{{$address->id}});

                var contentString{{ $sf->id }}_{{$address->id}} = 
                      '<div class="container-fluid">'+
                      '<div class="row">'+
                      '<h3>{{ Str::title($sf->firstname) }} {{ Str::upper($sf->name) }}</h3>'+
                        '<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">'+
                          '<h4>Activités</h4>'+
                          '<ul>'+
                          @foreach($sf->activities as $activity)
                            '<li>{{{ $activity->activityName }}}</li>'+
                          @endforeach
                          '</ul>'+
                        '</div>'+
                        '<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">'+
                          '<div class="text-right">'+
                          '<h4>Adresse</h4>'+
                            '<p>{{{ $address->address }}}</br>'+
                            '{{{ $address->zipCode }}} {{{ $address->city }}}</br>'+
                            @if($address->phone && !$address->hidePhone)
                                'tel: {{{ $address->phone }}}<br />'+
                            @endif
                            @if($address->fax && !$address->hideFax)
                                'fax: {{{ $address->fax }}}'+
                            @endif
                            "<p>Contact: <a href=\"{{ URL::route('user.show', [$sf->id, strtoupper($sf->name) . '_' . ucfirst($sf->firstname)]) }}\" target=\"_blank\">"+
                            '{{ Str::title($sf->firstname) }} {{ Str::upper($sf->name) }}</a> '+
                            '</div>'+
                        '</div>'+
                      '</div>'+
                      '</div>'+
                      '</div>';




                google.maps.event.addListener(marker{{ $sf->id }}_{{$address->id}}, 'click', function() {
                    infowindow.setContent(contentString{{ $sf->id }}_{{$address->id}});
                    infowindow.open(map,marker{{ $sf->id }}_{{$address->id}});
                  });

              @endif
            @endforeach 
          @endforeach
          console.log(markers);
        }

        function codeAddress() {
          if (marker) {
            marker.setMap(null);
          };

          var icon = {
            url: "{{ asset('assets/img/arrow.png') }}"
          }

          var address = document.getElementById('chezvous_textbox').value;

          geocoder.geocode( { 'address': address}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
              map.setCenter(results[0].geometry.location);
              marker = new google.maps.Marker({
                  map: map,
                  position: results[0].geometry.location,
                  title: address,
                  icon: icon
              });
            } else {
              alert('L\'adresse que vous avez entrée, n\'est pas valide.');
            }
          });
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <!-- END GOOGLE MAPS -->
@stop