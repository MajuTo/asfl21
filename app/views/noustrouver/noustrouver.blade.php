@extends('layouts.index')
@section('content')
<div class="content-container">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="animate-page-title">Trouver une sage femme libérale</h1>
        </div>
    </div>
    <div class="row">
      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" id="table-height">
        <div class="table-responsive">
          <table class="table table-condensed sf-hov">
            <thead>
              <tr>
                <th>Activités <i class="pull-right fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Sélectionnez ou désélectionnez les activités que vous souhaitez."></i></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach ($activities as $activity)
                  <td class="activity-td" data-activity="{{ $activity->id }}" id="{{ $activity->id }}">{{ Str::title($activity->activityName) }}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- AJAX liste des sf selon activité -->
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" id="table-height">
           <div class="table-responsive" id="table-sf">
             <table class="table table-condensed sf-hov">
               <thead>
                 <tr>
                   <th>Sages Femmes</th>
                     <th><i id="tooltip-sf" class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Sélectionnez ou désélectionnez une sage femme."></i></th>
                 </tr>
               </thead>
               <tbody id="listesf">
                   @foreach ($sagesfemmes as $sf) 
                     <tr>
                       <td class="sf-tr" data-sf="{{ $sf->id }}" id="{{ $sf->id }}">{{{ Str::upper($sf->name) }}} {{{ Str::title($sf->firstname) }}}</td>
                       <td><a href="{{ URL::route('user.show', $sf->id) }}"><i id="tooltip-sf" class="fa fa-envelope" data-toggle="tooltip" data-placement="left" title="Contact"></i></a></td>
                     </tr>
                   @endforeach
               </tbody>
             </table>
           </div>
        </div>
      <!-- END AJAX liste des sf selon activite -->
      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" id="gmap">
        <div class="map_container">
          <div id="panel">
                <input id="chezvous_textbox" type="textbox" placeholder="chez vous">
                <input id="chezvous_button" type="button" value="go" onclick="codeAddress()">
              </div>
          <div class="map_canvas" id="map_canvas"></div>
        </div>
      </div>
    </div>
</div>
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
            $.each($('.activity-td-selected'), function(){
              selected_id.push($(this).attr('id'));
            })
            return selected_id;
          }

          // get selected sf
          function getSelectedSf(){
            var selected_sf = [];
            $.each($('.sf-tr-selected'), function(){
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
                $('tbody#listesf').html(response);
                // $('.sf-tr').addClass('hidden-select');
                toggleMarkers();
              }
            });

          }

          function toggleMarkers(){
            if ($('.sf-tr').hasClass('sf-tr-selected') || $('.sf-tr').hasClass('hidden-select')) {
              for(i=0; i<markers.length; i++){
                markers[i].setVisible(false);
              }

              $('.sf-tr-selected').each(function(){
                var sf = $(this).data('sf');

                for(i=0; i<markers.length; i++){
                  if ( sf == markers[i]['id'] ) {
                    markers[i].setVisible(true)
                  };
                }
              });

              $('.hidden-select').each(function(){
                var sf = $(this).data('sf');

                for(i=0; i<markers.length; i++){
                  if ( sf == markers[i]['id'] ) {
                    markers[i].setVisible(true)
                  };
                }
              });

            } else {
              for(i=0; i<markers.length; i++){
                markers[i].setVisible(true);
              }
            }
          }

          // select and unselect activities 
          $('.activity-td').on('click', function(){
            $(this).toggleClass('activity-td-selected');
            $('.sf-tr').removeClass('sf-tr-selected');
            toggleMarkers();
            printSfByActivity();            
          });

          $('.sf-tr').on('click', function(){
            $(this).toggleClass('sf-tr-selected');
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
            zoom: 12,
            center: new google.maps.LatLng(47.313208, 5.058476)
          }

          map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

          var infowindow = new google.maps.InfoWindow();

          @foreach ($sagesfemmes as $sf)
            @if ($sf->lat != null and $sf->lng != null)
              
              var marker{{ $sf->id }} = new google.maps.Marker({
                  position: new google.maps.LatLng( {{ $sf->lat }}, {{ $sf->lng }}),
                  id: {{$sf-> id}},
                  map: map,
                  title: '{{ Str::upper($sf->name) }}, {{ Str::title($sf->firstname) }}'
              });
              markers.push(marker{{ $sf->id }});

              var contentString{{ $sf->id }} = 
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
                          '<p>{{{ $sf->address }}}</br>'+
                          '{{{ $sf->zipCode }}} {{{ $sf->city }}}</br>'+
                        @if($sf->phone && !$sf->hidePhone)
                            'tel: {{{ $sf->phone }}}'+
                        @endif
                          "<p>Contact: <a href=\"{{ URL::route('user.show', $sf->id) }}\">"+
                          '{{ Str::title($sf->firstname) }} {{ Str::upper($sf->name) }}</a> '+
                          '</div>'+
                      '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>';




              google.maps.event.addListener(marker{{ $sf->id }}, 'click', function() {
                  infowindow.setContent(contentString{{ $sf->id }});
                  infowindow.open(map,marker{{ $sf->id }});
                });

            @endif 
          @endforeach
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

{{-- 30 rue d'auxonne, 21000 dijon --}}