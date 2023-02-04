@section('title')
    <title>ASFL21, Liens Utiles de l'association des sages-femmes libérales de côte d'or</title>
@stop
@extends('layouts.index')
@section('content')
<section id="liensutile">
    <div class="row">
        <div class="col-sm-6">
            <img class="img-responsive img-rounded" src="{{ asset('assets/img/pregnant-collection/pregant-little-girl.jpg') }}" alt="femme enceinte avec petite fille">
        </div>
    	<div class="col-sm-6">
    	<h1>Liens utiles</h1>
            <table class="table table-condensed" id="liensutile-table">
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
    	    		<td><a href="{{ $link->link }}" target="_blank">Lien <i class="fa fa-arrow-right"></i></a></td>
                </tr>
    	    	@endforeach
                </tbody>
            </table>
	    </div>
    </div>
</section>
@stop
