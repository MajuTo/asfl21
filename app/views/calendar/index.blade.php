@extends('layouts.index')
@section('css')
	{{ HTML::style('assets/vertical-timeline/css/style.css') }}
	{{ HTML::style('assets/datedropper/datedropper.css') }}
@stop
@section('content')
<div class="content-container"> 
	<div class="row">
        <div class="col-sm-12">
            <h1 class="animate-page-title">Calendrier de grossesse</h1>
            <hr>
    		{{ BootForm::open()->action(URL::route('calendrier.store'))->addClass('form-inline') }}
    	        {{ Form::token() }}
    	    	<div class="col-sm-4 col-sm-offset-1">
    	        	{{ BootForm::text('Dernieres règles : ', 'date1', null, ['id' => 'date1'])->placeHolder("Date des dernieres règles")->addClass('datedropper') }}
    	    	</div>
    	    	<div class="col-sm-4">
    	        	{{ BootForm::text('Date de conception : ', 'date2', null, ['id' => 'date2'])->placeHolder("Date de conception")->addClass('datedropper') }}
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
		    <p class="text-center">Texte de description de comment utiliser le calendrier</p>
        </div>
	</div>
    @else
        <section id="cd-timeline" class="cd-container">
            @foreach($events as $event)
                <div class="cd-timeline-block">
                    <div class="cd-timeline-img {{ $event['class'] }}">
                        <span alt="Image"><i class="{{ $event['icon'] }}"></i></span>
                    </div> <!-- cd-timeline-img -->

                    <div class="cd-timeline-content">
                        <h2>{{ $event['title'] }}</h2>
                        <p>{{ $event['desc'] }}</p>
                        <span class="cd-date">{{ $event['date'] }}</span>
                    </div> <!-- cd-timeline-content -->
                </div> <!-- cd-timeline-block -->
            @endforeach
        </section> <!-- cd-timeline -->
    @endif
</div>
@stop

@section('script')
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