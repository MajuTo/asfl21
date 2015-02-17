@extends('layouts.index')
@section('content')
<div class="content-container">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="animate-page-title">Trouver une sage femme libérale</h1>
        </div>
    </div>
    <div class="row">
       @foreach ($sagesfemmes as $key => $value) {
           <p>{{ $key }}: {{ $value }}</p>
       } 
       @endforeach
    </div>
</div>
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-trouver').addClass('active');
        });
    </script>
@stop