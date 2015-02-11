@extends('layouts.index')
@section('content')
<div class="container content-container">
    <div class="row">
    	<div class="col-sm-12">
    	<h2>Liens utiles</h2>
	    	@foreach($links as $link)
	    		<p>{{ $link->linkName . ' ' . $link->link }}</p>
	    	@endforeach
	    </div>
    </div>
</div>
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-liens').addClass('active');
        });
    </script>
@stop