@section('title')
    <title>ASFL21, Calendrier de grossesse</title>
@stop
@extends('layouts.index')
@section('css')
	{{ HTML::style('assets/datedropper/datedropper.css') }}
    
    <!-- timeline -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/vis/4.15.0/vis.min.css">
    {{ HTML::style('assets/css/vis-timeline.css')}}
@stop
@section('content')
	<div class="row">
        <div class="col-sm-12">
            <h1>Calendrier de grossesse</h1>
            <hr>
    		{{ BootForm::open()->action(URL::route('calendrier.store'))->addClass('form-inline') }}
    	        {{ Form::token() }}
    	    	<div class="col-sm-4 col-sm-offset-1">
    	        	{{ BootForm::text('', 'date1', null, ['id' => 'date1'])->placeHolder("Date des dernieres règles")->addClass('datedropper') }}
    	    	</div>
    	    	<div class="col-sm-4">
    	        	{{ BootForm::text('', 'date2', null, ['id' => 'date2'])->placeHolder("Date de conception")->addClass('datedropper') }}
    	    	</div>
    	    	<div class="col-sm-2">
    	        	{{ BootForm::submit('Valider', 'btn-pink') }}
    	       	</div>
    	    {{ BootForm::close() }}
        </div>
    </div>
    <hr>
    @if(!$events)
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
                    <p id="explication" class="text-justify"><small><em>Pour plus d'information, passer la souris sur un élément du calendrier. Vous pouvez séléctionner un élément en cliquant dessus. Pour séléctionner un deuxième élément, cliquer longuement (rester appuyer). Ainsi, vous pouvez créer une liste personnalisée de dates.</em></small></p>
                    <ul id="mylist">
                    </ul>
                </div>
            </div>
        </div>
        <!-- END TIMELINE -->
    @endif
@stop

@section('script')

    <!-- TIMELINE -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vis/4.15.0/vis.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        /* VARIABLES */
        var event       = {{$json_events}};
        var dataset     = [];
        var grouping    = {{$json_groups}};
        var groupset    = [];

        // var start_limit = {{$start_limit}};
        // var end_limit   = {{$end_limit}};

        /* TIMELINE */
        // Dynamically create dataset
        for (var i = 0; i < event.length; i++) {
            var startDate       = new Date(event[i]['start']);
            var startDateString = ('0' + startDate.getDate()).slice(-2) + '.' + ('0' + (startDate.getMonth()+1)).slice(-2) + '.' + startDate.getFullYear() ;
            if (event[i]['end']){
                var endDate   = new Date(event[i]['end']);
                var endDateString = ('0' + endDate.getDate()).slice(-2) + '.' + ('0' + (endDate.getMonth()+1)).slice(-2) + '.' + endDate.getFullYear();
            }

            // timeline
            if (event[i]['end']) {
                var timestring = "<span>Du " + event[i]['start'] + " au " + event[i]['end'] + "</span>";
                var timestring = "<span>Du " + startDateString + " au " + endDateString + "</span>";
            } else {
                var timestring = "<span>Le " + event[i]['start'] + "</span>";
                var timestring = "<span>Le " + startDateString + "</span>";
            }

            dataset.push({
                id: i,
                content:    "<i class='" + event[i]['icon'] + " time-icon'></i> " +
                            "<div id=\"content" + i + "\" class=\"text-left info-minus\">" + 
                                "<div style='padding-right: 5px'>" + "<i class='" + event[i]['icon'] + "'></i><em> " + timestring + "</em></div>" +
                                "<div class=\"info-content\"><strong>" + event[i]['title'] + "</strong></div>" +
                            "</div>",
                group: event[i]['group'],
                start: event[i]['start'],
                end: event[i]['end'],
                className: 'vis-item-' + grouping[event[i]['group']]['content'],
                type: 'box'
            });
        }

        // DOM element where the Timeline will be attached
        var containerTimeline = document.getElementById('visualization');

        // Create a GroupSet
        for (var j = 0; j < grouping.length; j++) {
            groupset.push({
                id: j,
                content: grouping[j]['content'].charAt(0).toUpperCase() + grouping[j]['content'].slice(1),
                value: grouping[j]['id'],
                className: 'group-' + grouping[j]['content']
            });
        }

        var groups  = new vis.DataSet(groupset);
        var items   = new vis.DataSet(dataset);

        // Option Configuration for the Timeline
        var options = {
            zoomMin: 1000 * 60 * 60 * 24 * 5,
            zoomMax: 1000 * 60 * 60 * 24 * 31 * 12,
            zoomable: false,
            moveable: false,
            multiselect: true,
            locales: {
                user_locale: {
                    current: 'current',
                    time: 'time'
                }
            },
            locale: 'user_locale'
        };

        // Create a Timeline
        var timeline = new vis.Timeline(containerTimeline, items, options);

        // Toggle Order by group on click
        $('#group-toggle').click(function() {
            if( $('#group-toggle').hasClass('no-group')){
                $('#group-toggle').removeClass('no-group');
                $('#group-toggle').text('Cacher les groupes');
                timeline.setGroups(groups);
            } else {
                $('#group-toggle').addClass('no-group');
                $('#group-toggle').text('Montrer les groupes');    
                timeline.setGroups();
            }
        });

        // Timeline Eventlistener (on select, create personalized list)
        timeline.on('select', function (properties) {
            $('#mylist > li').remove();
            var selected = timeline.getSelection().sort(function(a, b){return a-b});
            if (selected.length > 0) {
                $('#explication').hide();
            } else {
                $('#explication').show();
            }
            $.each(selected, function(key, value){
                if (value != 'undefined') {
                    $('#mylist').append("<li>" + $('#content' + value).html() + "</li>")
                }
            }); 
        });

        /* EFFECTS */
        // On hover, show more text in top-center of timeline 
        $('.vis-item').mouseenter(function(event) {
            var element = $(this).children('.vis-item-content').children(':nth-child(2)').attr('id');
            $(this).css('z-index', '999');
            $('#show-more').html($(this).children('.vis-item-content').children(':nth-child(2)').clone());
            $('#show-more').addClass('span-plus');
            $('#show-more #' + element).addClass('info-plus');
        });

        $('.vis-item').mouseleave(function(event) {
            var element = $(this).children('.vis-item-content').children(':nth-child(2)').attr('id');
            $('#show-more').children(':first-child').remove();
            $('#show-more').removeClass('span-plus');
            $(this).css('z-index', '0');
        });
      })
    </script>
    <!-- END TIMELINE -->


    {{ HTML::script('assets/datedropper/datedropper.min.js') }}
    <script>
        $(document).ready(function(){
            $('#nav-calendrier').addClass('active');
            $( ".datedropper" ).dateDropper({
            	'format' : 'd-m-Y',
            	'lang' : 'fr',
                'color' : '#ff1493',
                'animate_current' : false,
                'animation' : 'dropdown'
            });
            $('#date1').change(function(){
            	$('#date2').val('');
            });
            $('#date2').change(function(){
            	$('#date1').val('');
            });
        });
    </script>

@stop