@section('title')
    <title>ASFL21, Où trouver une sage-femme en côte d'or</title>
@endsection
@extends('layouts.index')
@section('content')
    <section id="noustrouver">
        <div class="row">
            <div class="col-12">
                <h1>Trouver une sage femme libérale</h1>
                <p class="text-center" id="noustrouver-subtext">Sélectionnez les activités qui vous intéresses, puis la ou les sages-femmes qui éffectuent ces activités. Pour plus d'information sur une sage-femme en particulier, cliquer sur <i class="fa fa-external-link"></i> à droite du nom de la sage-femme ou directement sur la map.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-sm-2 col-md-2 col-lg-2" id="table-height">
                <div class="table-responsive">
                    <table class="table table-sm sf-hov" aria-describedby="liste des activités">
                        <thead>
                        <tr>
                            <th scope="col">Activités <em class="float-end fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Sélectionnez ou désélectionnez les activités que vous souhaitez."></em></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($activities as $activity)
                        <tr>
                            <td class="activity-td" data-activity="{{ $activity->id }}" id="{{ $activity->id }}">{{ Str::title($activity->activityName) }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- AJAX liste des sf selon activité -->
            <div class="col-6 col-sm-2 col-md-2 col-lg-2" id="table-height">
                <div class="table-responsive" id="table-sf">
                    <table class="table table-sm sf-hov" aria-describedby="liste des sages femmes">
                        <thead>
                        <tr>
                            <th scope="col">Sages Femmes</th>
                            <th scope="col"><em id="tooltip-sf" class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Sélectionnez ou désélectionnez une sage femme."></em></th>
                        </tr>
                        </thead>
                        <tbody id="listesf">
                        @foreach ($sagesfemmes as $sf)
                            <tr>
                                <td class="sf-tr" data-sf="{{ $sf->id }}" id="{{ $sf->id }}">{{{ Str::upper($sf->name) }}} {{{ Str::title($sf->firstname) }}}</td>
                                <td><a href="{{ route('user.show', [$sf->id, strtoupper($sf->name) . '-' . ucfirst($sf->firstname)]) }}" target="_blank"><i id="tooltip-sf" class="fa fa-external-link" data-bs-toggle="tooltip" data-bs-placement="left" title="Contact"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END AJAX liste des sf selon activite -->
{{--            <div id="map"></div>--}}
            <div class="col-sm-8 col-md-8 col-lg-8" id="gmap">
                <div class="map_container">
                    <div id="panel">
                        <input id="chezvous_textbox" type="text" placeholder="Votre adresse">
                        <input id="chezvous_button" type="button" value="go" onclick="codeAddress()">
                    </div>
                    <div class="map_canvas" id="map_canvas"></div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
{{--    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14"></script>--}}
    <script>
        // let leafletmap = L.map('map').setView([47.313208, 5.058476], 12);
        // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //     maxZoom: 19,
        //     attribution: ''
        // }).addTo(leafletmap);
        // // show the scale bar on the lower left corner
        // L.control.scale({imperial: true, metric: true}).addTo(leafletmap);
        //
        // // show a marker on the map
        // let customIcon = L.icon({
        //     iconUrl: 'icon-marker.png',
        //     //shadowUrl: 'icon-shadow.png',
        //     iconSize:     [64, 64], // taille de l'icone
        //     //shadowSize:   [50, 64], // taille de l'ombre
        //     iconAnchor:   [32, 64], // point de l'icone qui correspondra à la position du marker
        //     //shadowAnchor: [32, 64],  // idem pour l'ombre
        //     popupAnchor:  [-3, -76] // point depuis lequel la popup doit s'ouvrir relativement à l'iconAnchor
        // });
        //
        // L.marker([47.313208, 5.058476])
        //     .addTo(leafletmap)
        //     .bindTooltip("Ceci tooltip")
        //     .bindPopup('Ceci est le popup');
        // L.marker([48.5, 2])
        //     .addTo(leafletmap)
        //     .bindTooltip("Les Granges-le-Roi", {permanent: true, direction: 'top'});
        document.addEventListener("DOMContentLoaded", function() {
            // Tooltips Bootstrap
            if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
                const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"], [data-bs-toggle="tooltip"]');
                [...tooltipTriggerList].forEach(el => new bootstrap.Tooltip(el));
            }

            // Recherche 'chez vous' sur Google Map
            const chezVousInput = document.getElementById('chezvous_textbox');
            chezVousInput?.addEventListener('keyup', function (event) {
                if (event.code === 'Enter') {
                    document.getElementById('chezvous_button')?.click();
                }
            });

            // Récupère les IDs des activités sélectionnées
            function getSelectedActivities() {
                const selected_id = [];
                document.querySelectorAll('.activity-td-selected').forEach((tdNode) => {
                    selected_id.push(tdNode.getAttribute('id'));
                });
                return selected_id;
            }

            // Récupère les IDs des sages-femmes sélectionnées
            function getSelectedSf() {
                const selected_sf = [];
                document.querySelectorAll('.sf-tr-selected').forEach((trNode) => {
                    selected_sf.push(trNode.getAttribute('id'));
                });
                return selected_sf;
            }

            // Charge la liste des sages-femmes par activité via fetch()
            function printSfByActivity() {
                const selectedActivities = getSelectedActivities();

                fetch("{{ route('getSfByActivity') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ selectedActivities: selectedActivities })
                })
                .then(response => response.text())
                .then(html => {
                    const tbody = document.querySelector('tbody#listesf');
                    if (tbody) {
                        tbody.innerHTML = html;
                        // Réinitialiser les tooltips pour la nouvelle liste
                        if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
                            tbody.querySelectorAll('[data-bs-toggle="tooltip"], [data-bs-toggle="tooltip"]').forEach(el => new bootstrap.Tooltip(el));
                        }
                    }
                    toggleMarkers();
                })
                .catch(error => console.error('Erreur chargement SF:', error));
            }

            // Cache tous les markers de la Google Map
            function hideAllMarkers() {
                for (let i = 0; i < markers.length; i++) {
                    markers[i].setVisible(false);
                }
            }

            // Affiche tous les markers
            function showAllMarkers() {
                for (let i = 0; i < markers.length; i++) {
                    markers[i].setVisible(true);
                }
            }

            // Affiche les sages-femmes sélectionnées
            function showSelectedSf() {
                document.querySelectorAll('.sf-tr-selected').forEach(el => {
                    const sf = el.dataset.sf;
                    for (let i = 0; i < markers.length; i++) {
                        if (sf == markers[i]['id'].split('_')[0]) {
                            markers[i].setVisible(true);
                        }
                    }
                });
            }

            // Affiche toutes les sages-femmes des activités sélectionnées
            function showAllSfByActivities() {
                document.querySelectorAll('.sf-tr').forEach(el => {
                    const sf = el.dataset.sf;
                    for (let i = 0; i < markers.length; i++) {
                        if (sf == markers[i]['id'].split('_')[0]) {
                            markers[i].setVisible(true);
                        }
                    }
                });
            }

            function toggleMarkers() {
                hideAllMarkers();

                if (document.querySelectorAll('.sf-tr-selected').length > 0) {
                    showSelectedSf();
                } else if (document.querySelectorAll('.activity-td-selected').length > 0) {
                    showAllSfByActivities();
                } else {
                    showAllMarkers();
                }
            }

            // Sélection et déselection des activités
            document.querySelectorAll('.activity-td').forEach(td => {
                td.addEventListener('click', function() {
                    this.classList.toggle('activity-td-selected');
                    document.querySelectorAll('.sf-tr').forEach(tr => tr.classList.remove('sf-tr-selected'));
                    toggleMarkers();
                    printSfByActivity();
                });
            });

            // Délégation d'événement sur le tableau #table-sf pour les lignes chargées en AJAX
            const tableSf = document.getElementById('table-sf');
            tableSf?.addEventListener('click', function(e) {
                const tr = e.target.closest('.sf-tr');
                if (tr && this.contains(tr)) {
                    tr.classList.toggle('sf-tr-selected');
                    toggleMarkers();
                }
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

            @php
                $mapPoints = [];
                foreach ($sagesfemmes as $sf) {
                    foreach ($sf->addresses as $address) {
                        if ($address->lat === null || $address->lng === null) {
                            continue;
                        }
                        $mapPoints[] = [
                            'id' => $sf->id . '_' . $address->id,
                            'lat' => (float) $address->lat,
                            'lng' => (float) $address->lng,
                            'name' => Str::title($sf->firstname) . ' ' . Str::upper($sf->name),
                            'activities' => $sf->activities->pluck('activityName')->values(),
                            'address' => $address->address,
                            'city' => trim($address->zipCode . ' ' . $address->city),
                            'phone' => ($address->phone && !$address->hidePhone) ? $address->phone : null,
                            'fax' => ($address->fax && !$address->hideFax) ? $address->fax : null,
                            'url' => route('user.show', [$sf->id, strtoupper($sf->name) . '-' . ucfirst($sf->firstname)]),
                        ];
                    }
                }
            @endphp
            const mapPoints = @json($mapPoints);

            // Construit le contenu de la bulle avec textContent : aucune donnée n'est interprétée comme du HTML
            const el = (tag, text, className) => {
                const node = document.createElement(tag);
                if (text) node.textContent = text;
                if (className) node.className = className;
                return node;
            };

            const buildInfoContent = point => {
                const root = el('div', null, 'container-fluid');
                const row = el('div', null, 'row');
                row.appendChild(el('h3', point.name));

                const left = el('div', null, 'col-6');
                left.appendChild(el('h4', 'Activités'));
                const ul = el('ul');
                point.activities.forEach(a => ul.appendChild(el('li', a)));
                left.appendChild(ul);

                const right = el('div', null, 'col-6 text-end');
                right.appendChild(el('h4', 'Adresse'));
                const p = el('p');
                [point.address, point.city,
                    point.phone ? 'tel: ' + point.phone : null,
                    point.fax ? 'fax: ' + point.fax : null]
                    .filter(Boolean)
                    .forEach((line, i) => {
                        if (i) p.appendChild(document.createElement('br'));
                        p.appendChild(document.createTextNode(line));
                    });
                right.appendChild(p);

                const contact = el('p', 'Contact : ');
                const link = el('a', point.name);
                link.href = point.url;
                link.target = '_blank';
                link.rel = 'noopener';
                contact.appendChild(link);
                right.appendChild(contact);

                row.append(left, right);
                root.appendChild(row);
                return root;
            };

            mapPoints.forEach(point => {
                const m = new google.maps.Marker({
                    position: new google.maps.LatLng(point.lat, point.lng),
                    id: point.id,
                    map: map,
                    title: point.name,
                    optimized: false
                });
                markers.push(m);

                google.maps.event.addListener(m, 'click', () => {
                    infowindow.setContent(buildInfoContent(point));
                    infowindow.open(map, m);
                });
            });
        }

        function codeAddress() {
            if (marker) {
                marker.setMap(null);
            }

            let icon = {
                url: "{{ asset('assets/img/arrow.png') }}"
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
@endsection
