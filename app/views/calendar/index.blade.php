@section('title')
    <title>ASFL21, Calendrier de grossesse</title>
@stop
@extends('layouts.index')
@section('css')
	{{ HTML::style('assets/datedropper/datedropper.css') }}
    
    <!-- TESTING -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/vis/4.15.0/vis.min.css">
    {{ HTML::style('assets/css/vis-timeline.css')}}
    <!-- END TESTING -->

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
        <!-- TESTING NEW TIMELINE -->
        <div class="row">
            <h2 class="text-center">J - {{ $jourj }}</h2>
            <div id="visualization"><span id="testing">TESTING?</span></div>
            
        </div>
        <!-- END TESTING -->
    @endif
@stop

@section('script')

    <!-- TESTING -->
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
        for (var i = 0; i < event.length; i++) {
            // timeline
            if (event[i]['end']) {
                var timestring = "<span>Du " + event[i]['start'] + " au " + event[i]['end'] + "</span><br>";
            } else {
                var timestring = "<span>Le " + event[i]['start'] + "</span><br>";
            }

            dataset.push({
                id: i,
                content:    "<i class='" + event[i]['icon'] + " time-icon'></i> " +
                            "<div id=\"content" + i + "\" class=\"text-left info-minus\">" + 
                                timestring +
                                "<span>" + event[i]['title'] + "</span>" +
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
                content: grouping[j]['content'],
                value: grouping[j]['id']
            });
        }

        var groups  = new vis.DataSet(groupset);
        var items   = new vis.DataSet(dataset);

        // Configuration for the Timeline
        var options = {
            zoomMin: 1000 * 60 * 60 * 24 * 5,
            zoomMax: 1000 * 60 * 60 * 24 * 31 * 12,
            zoomable: false,
            moveable: false,
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
        // var timeline = new vis.Timeline(containerTimeline, items, groups, options);



        /* EFFECTS */
        $('.vis-item').mouseenter(function(event) {
            var element = $(this).children('.vis-item-content').children(':nth-child(2)').attr('id');
            $('#' + element).addClass('info-plus');
            $(this).css('z-index', '999');
            $('#testing').append($(this).children('.vis-item-content').children(':nth-child(2)').text());
        });

        $('.vis-item').mouseleave(function(event) {
            var element = $(this).children('.vis-item-content').children(':nth-child(2)').attr('id');
            $('#' + element).removeClass('info-plus');
            $(this).css('z-index', '0');
        });
      })
    </script>
    <!-- END TESTING -->


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