@section('title')
    <title>ASFL21, Calendrier de grossesse</title>
@stop
@extends('layouts.index')
@section('css')
	{{ Html::style('datepicker/bootstrap-datepicker3.css') }}

    {{-- timeline --}}
	{{ Html::style('https://unpkg.com/vis-timeline@7.2.1/styles/vis-timeline-graph2d.min.css') }}
    {{ Html::style('css/vis-timeline.css')}}
@stop
@section('content')
	<div class="row">
        <div class="col-sm-12">
            <h1>Calendrier de grossesse</h1>
            <hr>
    		{!! BootForm::open()->action(route('calendrier.store'))->addClass('form-inline') !!}
                {!! Form::token() !!}
    	    	<div class="col-sm-4 col-sm-offset-1">
                    {!! BootForm::text('', 'date1', null, ['id' => 'date1'])->placeHolder("Date des dernieres règles")->addClass('datedropper') !!}
    	    	</div>
    	    	<div class="col-sm-4">
                    {!! BootForm::text('', 'date2', null, ['id' => 'date2'])->placeHolder("Date de conception")->addClass('datedropper') !!}
    	    	</div>
    	    	<div class="col-sm-2">
                    {!! BootForm::submit('Valider', 'btn-pink') !!}
    	       	</div>
            {!! BootForm::close() !!}
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
                    <div class="legend-div"><span class="conception"><i class="fas fa-venus-mars"></i></span> Conception</div>
                    <div class="legend-div"><span class="consultation"><i class="fas fa-stethoscope"></i></span> Consultation</div>
                    <div class="legend-div"><span class="medical"><i class="fas fa-user-md"></i></span> Médical</div>
                    <div class="legend-div"><span class="administratif"><i class="fas fa-calendar"></i></span> Administratif</div>
                    <div class="legend-div"><span class="maternite"><i class="fas fa-h-square"></i></span> Maternité</div>
                    <div class="legend-div"><span class="naissance"><i class="fas fa-gift"></i></span> Naissance</div>
                </div>
            </div>
            <div class="col-sm-6">
                <div id="list-div">
                    <p id="explication" class="text-justify"><small><em>Pour plus d'informations, passer la souris sur un élément du calendrier. Vous pouvez séléctionner un élément en cliquant dessus. Pour séléctionner un deuxième élément, cliquer longuement (rester appuyer). Ainsi, vous pouvez créer une liste personnalisée de dates.</em></small></p>
                    <ul id="mylist">
                    </ul>
                </div>
            </div>
        </div>
        <!-- END TIMELINE -->
    @endif
@stop

@section('script')
    {{ Html::script('assets/datepicker/bootstrap-datepicker.min.js') }}
    {{ Html::script('assets/datepicker/bootstrap-datepicker.fr.min.js') }}
    {{ Html::script('assets/js/datepicker.js') }}
    @if ($json_events)
    {{ Html::script('https://unpkg.com/vis-timeline@7.2.1/standalone/umd/vis-timeline-graph2d.min.js') }}
    <script type="text/javascript">
        $(document).ready(function () {
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
            let btnGroupToggle = $('#group-toggle');
            btnGroupToggle.click(function () {
                if (btnGroupToggle.hasClass('no-group')) {
                    btnGroupToggle.removeClass('no-group');
                    btnGroupToggle.text('Cacher les groupes');
                    timeline.setGroups(groups);
                } else {
                    btnGroupToggle.addClass('no-group');
                    btnGroupToggle.text('Montrer les groupes');
                    timeline.setGroups();
                }
            });

            // Timeline Eventlistener (on select, create personalized list)
            timeline.on('select', function (properties) {
                $('#mylist > li').remove();
                let selected = timeline.getSelection().sort(function (a, b) {
                    return a - b
                });
                if (selected.length > 0) {
                    $('#explication').hide();
                } else {
                    $('#explication').show();
                }
                $.each(selected, function (key, value) {
                    if (typeof value !== 'undefined' && value !== null) {
                        $('#mylist').append("<li>" + $('#content' + value).html() + "</li>")
                    }
                });
            });

            /* EFFECTS */
            // On hover, show more text in top-center of timeline
            let timelineItems = $('.vis-item');
            let timelinePopup = $('#show-more');
            timelineItems.mouseenter(function (event) {
                let element = $(this).children('.vis-item-content').children(':nth-child(2)').attr('id');
                $(this).css('z-index', '999');
                timelinePopup.html($(this).children('.vis-item-content').children(':nth-child(2)').clone());
                timelinePopup.addClass('span-plus');
                $('#show-more #' + element).addClass('info-plus');
            });

            timelineItems.mouseleave(function (event) {
                let element = $(this).children('.vis-item-content').children(':nth-child(2)').attr('id');
                timelinePopup.children(':first-child').remove();
                timelinePopup.removeClass('span-plus');
                $(this).css('z-index', '0');
            });

            /* END TIMELINE */
            $('#nav-calendrier').addClass('active');
        });
    </script>
    @endif

@stop
