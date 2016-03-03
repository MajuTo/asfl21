@section('title')
    <title>ASFL21, Calendrier de grossesse</title>
@stop
@extends('layouts.index')
@section('css')
	{{ HTML::style('assets/datedropper/datedropper.css') }}
    
    <!-- TESTING -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/vis/4.15.0/vis.min.css">
    {{ HTML::style('assets/css/vis-timeline.css')}}
     <style type="text/css">
        #mynetwork {
            /*width: 600px;*/
            height: 600px;
            border: 1px solid lightgray;
        }
    </style>
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
            <h2 class="text-center">J - {{$jourj}}</h2>
            <div id="visualization"></div>
        </div>
        <div class="row">
            <div id="mynetwork"></div>
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
        var event    = {{$json_events}};
        var dataset  = [];
        var grouping = {{$json_groups}};
        var groupset = [];
        var node     = [];
        var edge     = [];


        for (var i = 0; i < event.length; i++) {
            // network
            node.push({
                id: i,
                label: event[i]['title'],
                shape: 'box',
                font: {
                    color: '#000',
                    size: 20, // px
                    face: 'handlee',
                    background: 'none',
                    strokeWidth: 0, // px
                    strokeColor: '#ffffff',
                    align: 'horizontal'
                },
                physics: false,
                x: null,
                y: null
            });

            // timeline
            dataset.push({
                id: i,
                title: event[i]['title'],
                content: "<i class='" + event[i]['icon'] + "'></i>",
                group: event[i]['group'],
                start: event[i]['start'],
                end: event[i]['end'],
                className: 'vis-item-' + grouping[event[i]['group']]['content'],
                // type: 'box'
            });
        }

        node[0].x = 0;
        node[0].y = 0;

        node[1].x = 25;
        node[1].y = 75;

        node[2].x = 100;
        node[2].y = 150;

        node[3].x = 100;
        node[3].y = 225;

        node[4].x = 250;
        node[4].y = 300;

        node[5].x = 325;
        node[5].y = 375;

        node[6].x = 250;
        node[6].y = 450;

        node[7].x = 100;
        node[7].y = 525;

        node[8].x = 175;
        node[8].y = 600;

        node[9].x = 450;
        node[9].y = 675;

        node[10].x = 700;
        node[10].y = 600;

        node[11].x = 825;
        node[11].y = 525;

        node[12].x = 900;
        node[12].y = 450;

        node[13].x = 975;
        node[13].y = 375;

        node[14].x = 1050;
        node[14].y = 300;

        node[15].x = 1050;
        node[15].y = 225;

        node[16].x = 1050;
        node[16].y = 150;

        node[17].x = 1050;
        node[17].y = 75;

        node[18].x = 1050;
        node[18].y = 0;

        node[19].x = 1050;
        node[19].y = 225;

        node[20].x = 1050;
        node[20].y = 300;

        node[21].x = 1050;
        node[21].y = 375;

        node[22].x = 1050;
        node[22].y = 600;

        node[23].x = 1050;
        node[23].y = 500;

        

        /* NETWORK */
        // create an array with nodes
        var nodes = new vis.DataSet(node);

        // create an array with edges
        for (var j = 0; j < event.length; j++) {
            edge.push({
                from: j, to: j+1, arrows: 'to'
            });
        }
        var edges = new vis.DataSet(edge);

        // create a network
        var containerNetwork = document.getElementById('mynetwork');

        // provide the data in the vis format
        var data = {
            nodes: nodes,
            edges: edges
        };

        var options = {
            layout: {
                // randomSeed: 338924,
                // randomSeed: 845308,
                // randomSeed: 166431,
            },
        };

        // initialize your network!
        var network = new vis.Network(containerNetwork, data, options);
        console.log(network.getSeed());

        /* TIMELINE */
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
            zoomMax: 1000 * 60 * 60 * 24 * 31 * 12
        };

        // Create a Timeline
        var timeline = new vis.Timeline(containerTimeline, items, options);
        // var timeline = new vis.Timeline(container, items, groups, options);
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