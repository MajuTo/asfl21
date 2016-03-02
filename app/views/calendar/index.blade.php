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
            <h2 class="text-center">J - {{$jourj}}</h2>
            <div id="visualization"></div>
        </div>
        <!-- END TESTING -->
    @endif
@stop

@section('script')

    <!-- TESTING -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vis/4.15.0/vis.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        var data        = {{$testing}};
        var dataset     = [];
        var grouping    = {{$groups}};
        var groupset    = [];

        // DOM element where the Timeline will be attached
        var container = document.getElementById('visualization');

        // Create a DataSet (allows two way data-binding)
        for (var i = 0; i < data.length; i++) {
            dataset.push({
                id: i,
                content: "<span id='" + grouping[data[i]['group']]['content'] + "'>" + data[i]['title'] + "</span>",
                group: data[i]['group'],
                start: data[i]['start'],
                end: data[i]['end'],
                className: 'vis-item-' + grouping[data[i]['group']]['content'],
                type: 'box'
            });
        }

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
            groupOrder: 'start',
            zoomMin: 1000 * 60 * 60 * 24 * 5,
            zoomMax: 1000 * 60 * 60 * 24 * 31 * 12
        };

        // Create a Timeline
        var timeline = new vis.Timeline(container, items, groups, options);
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