@extends('layouts.index')
@section('title')
    <title>ASFL21, Calendrier de grossesse</title>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/css/datepicker-bs5.min.css">
    {{-- timeline --}}
    <link rel="stylesheet" href="https://unpkg.com/vis-timeline@7.2.1/styles/vis-timeline-graph2d.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/vis-timeline.css') }}">
@endsection
@section('content')
	<div class="row">
        <div class="col-sm-12">
            <h1>Calendrier de grossesse</h1>
            <hr>
    		{{ Aire::open()->route('calendrier.store')->addClass('form-inline') }}
    	    	<div class="col-sm-4 col-sm-offset-1">
                    {{ Aire::input('date1')->placeholder("Date des dernieres règles")->id('date1') }}
    	    	</div>
    	    	<div class="col-sm-4">
                    {{ Aire::input('date2')->placeholder("Date de conception")->id('date2') }}
    	    	</div>
    	    	<div class="col-sm-2">
                    {{ Aire::submit('Valider')->addClass('btn-pink') }}
    	       	</div>
            {{ Aire::close() }}
        </div>
    </div>
    <hr>
    @if(!$json_events)
    <div class="row">
        <div class="col-sm-12">
            <p class="text-center">Ce calendrier vous permettra d'avoir des repères tout au long de votre grossesse. Entrez la date de vos dernières règles ou du début de votre grossesse, vous obtiendrez ensuite les dates importantes de vos consultations,examens médicaux, et droits.</p>
        </div>
    </div>
    @else
        <!-- NEW TIMELINE -->
        <div class="row">
            <div class="text-center" id="jourj"><span id="ani-j">J</span> <span class="hide-element ani-minus">-</span> <span id="ani-nbr">{{ $jourj }}</span></div>
            <button id="group-toggle" class="btn btn-pink no-group">Montrer les groupes</button>
            <div id="visualization"><span id="show-more" class="span-minus"></span></div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div id="legend">
                    <div class="legend-div"><span class="conception"><i class="fa fa-venus-mars"></i></span> Conception</div>
                    <div class="legend-div"><span class="consultation"><i class="fa fa-stethoscope"></i></span> Consultation</div>
                    <div class="legend-div"><span class="medical"><i class="fa fa-user-md"></i></span> Médical</div>
                    <div class="legend-div"><span class="administratif"><i class="fa fa-calendar"></i></span> Administratif</div>
                    <div class="legend-div"><span class="maternite"><i class="fa fa-h-square"></i></span> Maternité</div>
                    <div class="legend-div"><span class="naissance"><i class="fa fa-gift"></i></span> Naissance</div>
                </div>
            </div>
            <div class="col-sm-6">
                <div id="list-div">
                    <p id="explication" class="text-justify"><small><em>Pour plus d'informations, passer la souris sur un élément du calendrier. Vous pouvez séléctionner un élément en cliquant dessus. Pour séléctionner un deuxième élément, cliquer longuement (rester appuyer). Ainsi, vous pouvez créer une liste personnalisée de dates.</em></small></p>
                    <ul id="mylist" class="myList">
                    </ul>
                </div>
            </div>
        </div>
        <!-- END TIMELINE -->
    @endif
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/js/datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/js/locales/fr.js"></script>
    <script type="text/javascript">
        const date1 = document.getElementById('date1');
        const date2 = document.getElementById('date2');
        const options = {
            format: 'dd/mm/yyyy',
            language: 'fr',
            autohide: true
        };
        const datepicker1 = new Datepicker(date1, options);
        const datepicker2 = new Datepicker(date2, options);
        date1.addEventListener('changeDate', () => datepicker2.setDate({clear: true}));
        date2.addEventListener('changeDate', () => datepicker1.setDate({clear: true}));
    </script>
    @if ($json_events)
    <script src="{{ asset('assets/js/vis-timeline.js') }}"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            // DOM element where the Timeline will be attached
            let containerTimeline = document.getElementById('visualization');

            let groups = new vis.DataSet(@json($json_groups));
            let items = new vis.DataSet(@json($json_events));

            // Option Configuration for the Timeline
            let options = {
                zoomMin: 1000 * 60 * 60 * 24 * 5,
                zoomMax: 1000 * 60 * 60 * 24 * 31 * 10,
                zoomable: false,
                moveable: false,
                multiselect: true,
                start: new Date(@json($start_limit)),
                end: new Date(@json($end_limit)),
                locale: 'fr'
            };

            // Create a Timeline
            let timeline = new vis.Timeline(containerTimeline, items, options);

            // Toggle Order by group on click
            let btnGroupToggle = document.getElementById('group-toggle');
            btnGroupToggle.addEventListener('click', () => {
                if(btnGroupToggle.classList?.contains('no-group')) {
                    btnGroupToggle.classList?.remove('no-group');
                    btnGroupToggle.innerText = 'Cacher les groupes';
                    timeline.setGroups(groups);
                } else {
                    btnGroupToggle.classList?.add('no-group');
                    btnGroupToggle.innerText = 'Montrer les groupes';
                    timeline.setGroups();
                }
            });

            // Timeline Eventlistener (on select, create personalized list)
            timeline.addEventListener('select', () => {
                document.querySelectorAll('#mylist > li').forEach(el => {
                    el.remove();
                });
                let selected = timeline.getSelection().sort(function (a, b) {
                    return a - b;
                });
                document.getElementById('explication').style.display = (selected.length > 0) ? 'none' : 'block';

                let list = document.querySelector('.myList');
                selected.forEach((value, key) => {
                    if (typeof value !== 'undefined' && value !== null) {
                        let li = document.createElement("li");
                        li.innerHTML = document.getElementById('content'+value).innerHTML;
                        list?.appendChild(li);
                    }
                });
            });

            /* EFFECTS */
            // On hover, show more text in top-center of timeline
            let timelineItems = document.querySelectorAll('.vis-item');
            let timelinePopup = document.querySelector('#show-more');
            timelineItems.forEach(el => {
                el.addEventListener('mouseover', e => {
                    e.stopImmediatePropagation();
                    timelinePopup.innerHTML = el.children.item(0).children.item(1).innerHTML;
                    timelinePopup.classList.add('span-plus');
                });
                el.addEventListener('mouseleave', e => {
                    timelinePopup.children.item(0).remove();
                    timelinePopup.classList.remove('span-plus');
                });
            });
        });
    </script>
    @endif

@endsection
