@extends('layouts.index')
@section('content')
<div class="content-container">
    <div class="row">
        <div class="col-sm-6">
            <img class="img-responsive img-rounded" src="{{ asset('assets/img/pregnant-collection/pregant-little-girl.jpg') }}" alt="femme enceinte avec petite fille">
        </div>
    	<div class="col-sm-6">
    	<h1>Liens utiles</h1>
            <table class="table table-condensed">
                <thead>
                    <td>Nom</td>
                    <td>Adresse</td>
                    <td>Téléphone</td>
                    <td>Lien</td>
                </thead>
                <tbody>
    	    	@foreach($links as $link)
                <tr>
                    <td>{{ $link->linkName }}</td>
                    <td>{{ $link->address . ' ' . $link->zipCode . ' ' . $link->city }}</td>
                    <td>{{ $link->phone }}</td>
    	    		<td><a href="{{ $link->link }}" target="_blank">Visiter leur site <i class="fa fa-arrow-right"></i></a></td>
                </tr>
    	    	@endforeach
                </tbody>
            </table>
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