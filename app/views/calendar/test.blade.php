@extends('layouts.index')
@section('content')
<div class="content-container">
    <div class="row">
        {{ BootForm::open()->action(URL::route('calendrier.show'))->addClass('form-inline') }}
            {{ Form::token() }}
            <div class="col-sm-4 col-sm-offset-1">
                {{ BootForm::text('Dernieres règles', 'date1')->placeHolder("Date des dernieres règles") }}
            </div>
            <div class="col-sm-4">
                {{ BootForm::text('Date de conception', 'date2')->placeHolder("Date de conception") }}
            </div>
            <div class="col-sm-2">
                {{ BootForm::submit('Valider', 'btn-pink') }}
            </div>
        {{ BootForm::close() }}
    </div>
    <div class="row">
        <div class="col-sm-12">
          
    </div>
</div>
@stop

@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-calendrier').addClass('active');
        });
    </script>
@stop