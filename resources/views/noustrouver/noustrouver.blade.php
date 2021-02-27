@section('title')
    <title>ASFL21, Où trouver une sage-femme en côte d'or</title>
@stop
@extends('layouts.index')
@section('content')
    <section id="noustrouver">
        <div class="row">
            <div class="col-xs-12">
                <h1>Trouver une sage femme libérale</h1>
                <p class="text-center" id="noustrouver-subtext">Sélectionnez les activités qui vous intéresses, puis la ou les sages-femmes qui effectuent ces activités. Pour plus d'information sur une sage-femme en particulier, cliquer sur <i class="fas fa-external-link"></i> à droite du nom de la sage-femme ou directement sur la map.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2" id="table-height">
                <div class="table-responsive">
                    <table class="table table-condensed sf-hov">
                        <thead>
                        <tr>
                            <th>Activités <i class="pull-right fas fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Sélectionnez ou désélectionnez les activités que vous souhaitez."></i></th>
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
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2" id="table-height">
                <div class="table-responsive" id="table-sf">
                    <table class="table table-condensed sf-hov">
                        <thead>
                        <tr>
                            <th>Sages Femmes</th>
                            <th><i id="tooltip-sf" class="fas fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Sélectionnez ou désélectionnez une sage femme."></i></th>
                        </tr>
                        </thead>
                        <tbody id="listesf">
                        @foreach ($sagesfemmes as $sf)
                            <tr>
                                <td class="sf-tr" data-sf="{{ $sf->id }}" id="{{ $sf->id }}">{{{ Str::upper($sf->name) }}} {{{ Str::title($sf->firstname) }}}</td>
                                <td><a href="{{ route('user.show', [$sf->id, Str::upper($sf->name) . '-' . Str::title($sf->firstname)]) }}" target="_blank"><i id="tooltip-sf" class="fas fa-external-link-alt" data-toggle="tooltip" data-placement="left" title="Contact"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END AJAX liste des sf selon activite -->
            <div class="col-sm-8 col-md-8 col-lg-8" id="gmap">
                <div class="map_container">
                    <div id="panel">
                        <input id="chezvous_textbox" type="textbox" placeholder="Votre adresse">
                        <input id="chezvous_button" type="button" value="go" onclick="codeAddress()">
                    </div>
                    <div class="map_canvas" id="map_canvas"></div>
                </div>
            </div>
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
            // $('#chezvous_textbox').keyup(function(event){
            document.getElementById('chezvous_textbox').addEventListener('keyup', function (event) {
                if(event.keyCode === 13){
                    $('#chezvous_button').click();
                }
            });

            // get selected activities
            function getSelectedActivities(){
                let selected_id = [];
                $.each($('.activity-td-selected'), function(){
                    selected_id.push($(this).attr('id'));
                })
                return selected_id;
            }

            // get selected sf
            function getSelectedSf(){
                let selected_sf = [];
                $.each($('.sf-tr-selected'), function(){
                    selected_sf.push($(this).attr('id'));
                })
                return selected_sf;
            }

            // load list of sf by activity
            function printSfByActivity(){
                let activity_id = $(this).data('activity');
                let selectedActivities = getSelectedActivities();

                $.ajax({
                    url:  "{{ route('getSfByActivity') }}",
                    type: 'POST',
                    data: {selectedActivities: selectedActivities},
                    success: function(response){
                        $('tbody#listesf').html(response);
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
                $('.sf-tr-selected').each(function(){
                    let sf = $(this).data('sf');

                    for(i=0; i<markers.length; i++){
                        if ( sf == markers[i]['id'].split('_')[0] ) {
                            markers[i].setVisible(true)
                        };
                    }
                });
            }

            // Affiche toutes les sages femmes des activités selectionnées
            function showAllSfByActivities() {
                $('.sf-tr').each(function(){
                    let sf = $(this).data('sf');

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

                if( $('.sf-tr-selected').length > 0 ){ // Si au moins une sage femme est selectionnée
                    showSelectedSf();
                } else { // Si aucune sage femme n'est selectionnée
                    if( $('.activity-td-selected').length > 0 ){ // Si au moins une activité est selectionnée
                        showAllSfByActivities();
                    } else { // Si rien n'est selectionné, ni sf ni activité
                        showAllMarkers();
                    }
                }
            } // Fin ToggleMarkers

            // select and unselect activities
            $('.activity-td').on('click', function(){
                $(this).toggleClass('activity-td-selected');
                $('.sf-tr').removeClass('sf-tr-selected');
                toggleMarkers();
                printSfByActivity();
            });

            // On bind le click sur le #table-sf car il n'est pas rechargé en Ajax
            // et on dit a quel élément de ce table on associe le click (suis je clair ?)
            // Du coup, plus besoin de js dans la vue chargée en Ajax
            $('#table-sf').on('click', '.sf-tr', function(){
                $(this).toggleClass('sf-tr-selected');
                toggleMarkers();
            });
        });
        {{--    </script>--}}

        <!-- GOOGLE MAPS -->
        {{--     <script type="text/javascript">--}}
        let marker;
        let markers = [];
        let map;
        let geocoder;

        function initialize() {
            geocoder = new google.maps.Geocoder();

            let mapOptions = {
                zoom: 9,
                center: new google.maps.LatLng(47.313208, 5.058476)
            }

            map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

            let infowindow = new google.maps.InfoWindow();

            @foreach ($sagesfemmes as $sf)
            @foreach ($sf->addresses as $address)

            @if ($address->lat != null and $address->lng != null)

            let marker{{ $sf->id }}_{{$address->id}} = new google.maps.Marker({
                position: new google.maps.LatLng( {{ $address->lat }}, {{ $address->lng }}),
                id: {{$sf->id}} + '_' + {{$address->id}},
                map: map,
                title: '{{ Str::title($sf->firstname) }} {{ Str::upper($sf->name) }}',
                optimized: false
            });
            markers.push(marker{{ $sf->id }}_{{$address->id}});

            let contentString{{ $sf->id }}_{{$address->id}} =
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
                    "<p>Contact: <a href=\"{{ route('user.show', [$sf->id, strtoupper($sf->name) . '_' . ucfirst($sf->firstname)]) }}\" target=\"_blank\">"+
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
        }

        function codeAddress() {
            if (marker) {
                marker.setMap(null);
            };

            let icon = {
                url: "{{ asset('img/arrow.png') }}"
            }

            let address = document.getElementById('chezvous_textbox').value;

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
