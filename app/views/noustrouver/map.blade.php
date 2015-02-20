<!-- GOOGLE MAPS -->
 <script type="text/javascript">
    console.log('map.blade.php');
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
</script>
<!-- END GOOGLE MAPS -->