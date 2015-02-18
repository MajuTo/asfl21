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
         @foreach ($sagesfemmes as $key => $value) {
             <p>{{ $key }}: {{ $value->name }}</p>
             <p>{{ $key }}: {{ $value->firstname }}</p>
             <p>{{ $key }}: {{ $value->lat }}</p>
             <p>{{ $key }}: {{ $value->lng }}</p>
         } 
         @endforeach
      </div>
      <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
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
            $('#nav-trouver').addClass('active');
        });
    </script>

     <script type="text/javascript">
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
                  map: map,
                  title: '{{ Str::upper($sf->name) }}, {{ Str::title($sf->firstname) }}'
              });

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
                          "<p>Profil: <a href=\"{{ URL::route('user.show', $sf->id) }}\">"+
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
@stop