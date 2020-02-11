@extends('layouts.index')
@section('css')
    {{ Html::style('assets/vertical-timeline/css/style.css') }}
@stop
@section('content')
<div class="content-container">
    <div class="row">
        {!! BootForm::open()->action(route('calendrier.store'))->addClass('form-inline') }}
            {{ Form::token() }}
            <div class="col-sm-4 col-sm-offset-1">
                {!! BootForm::text('Dernieres règles', 'date1')->placeHolder("Date des dernieres règles") }}
            </div>
            <div class="col-sm-4">
                {!! BootForm::text('Date de conception', 'date2')->placeHolder("Date de conception") }}
            </div>
            <div class="col-sm-2">
                {!! BootForm::submit('Valider', 'btn-pink') }}
            </div>
        {!! BootForm::close() }}
    </div>
    @if(isset($events))
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
    <script>
        $(document).ready(function(){
            $('#nav-calendrier').addClass('active');
        });
    </script>
@stop
