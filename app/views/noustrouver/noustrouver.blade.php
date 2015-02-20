@extends('layouts.index')
@section('content')
<div class="content-container">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="animate-page-title">Trouver une sage femme libérale</h1>
        </div>
    </div>
    <div class="row">
      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
        <div class="table-responsive">
          <table class="table table-hover table-condensed">
            <thead>
              <tr>
                <th>Activités</th>
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
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
           <div class="table-responsive" id="table-sf">
             <table class="table table-hover table-condensed">
               <thead>
                 <tr>
                   <th>Sages</th>
                   <th>Femmes</th>
                 </tr>
               </thead>
               <tbody id="listesf">
                   @foreach ($sagesfemmes as $sf) 
                     <tr class="sf-tr" data-sf="{{ $sf->id }}" id="{{ $sf->id }}">
                       <td>{{{ Str::upper($sf->name) }}}</td>
                       <td>{{{ Str::title($sf->firstname) }}}</td>
                     </tr>
                   @endforeach
               </tbody>
             </table>
           </div>
        </div>
      <!-- END AJAX liste des sf selon activite -->
      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" id="gmap">
        <div class="map_container">
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
              }
            });
          }

          function toggleMarkers(){
            if ($('.sf-tr').hasClass('sf-tr-selected')) {
              for(i=0; i<markers.length; i++){
                markers[i].setVisible(false);
              }

              $('.sf-tr-selected').each(function(){
                var sf = $(this).data('sf');

                for(i=0; i<markers.length; i++){
                  if ( sf == markers[i]['id']) {
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
      var markers = [];

        function initialize() {
          var mapOptions = {
            zoom: 12,
            center: new google.maps.LatLng(47.313208, 5.058476)
          }
          var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
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
                          'tel: {{{ $sf->phone }}}'+
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

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <!-- END GOOGLE MAPS -->
@stop