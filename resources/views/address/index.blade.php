@extends('layouts.index')
@section('content')
<div class="content-container">
	<div class="row">
		<div class="col-sm-6">
			<h2>Mes Adresses</h2>
		</div>
		<div class="col-sm-6">
			<h2><a class="btn btn-pink pull-right" href="{{ route('adresse.create') }}">Ajouter</a></h2>
		</div>
	</div>
	<table class="table table-condensed table-hover">
		<thead>
        <tr>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Téléphone</th>
            <th>Actions</th>
        </tr>
		</thead>
		<tbody>
			@foreach($addresses as $address)
				<tr>
					<td>{{ $address->name }}</td>
					<td>{{ Str::title($address->address) }}, {{ $address->zipCode }}, {{ Str::title($address->city) }}</td>
					<td>{{ $address->phone }}</td>
					<td>
						<a href="{{ route('adresse.edit', $address->id) }}"><button class="btn label label-warning">Editer</button></a>
						{{ Aire::open(route('adresse.destroy', $address->id), $address)->delete()->style('display: inline;') }}
						    {{ Aire::submit('Supprimer')->addClass('badge-danger badge eraser')->removeClass('btn btn-primary') }}
						{{ Aire::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-membre').addClass('active');
            $('#nav-admin').addClass('active');
            $('#nav-admin-users').addClass('active');
        });
    </script>
@stop
