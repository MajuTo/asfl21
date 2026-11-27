@section('title')
    <title>ASFL21, Liens Utiles de l'association des sages-femmes libérales de côte d'or</title>
@endsection
@extends('layouts.index')
@section('content')
<section id="liensutile">
    <div class="row">
        <div class="col-sm-6">
            <img class="img-fluid rounded" src="{{ asset('assets/img/pregnant-collection/pregant-little-girl.jpg') }}" alt="femme enceinte avec petite fille">
        </div>
    	<div class="col-sm-6">
    	<h1>Liens utiles</h1>
            <table class="table table-sm" id="liensutile-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>Téléphone</th>
                        <th>Lien</th>
                    </tr>
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
@endsection
