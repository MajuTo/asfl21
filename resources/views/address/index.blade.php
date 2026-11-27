@extends('layouts.index')
@section('content')
<div class="content-container">
	<div class="row">
		<div class="col-sm-6">
			<h2>Mes Adresses</h2>
		</div>
		<div class="col-sm-6">
			<h2><a href="{{ route('adresse.create') }}" ><button class="btn btn-pink float-end">Ajouter</button></a></h2>
		</div>
	</div>
	<table class="table table-sm table-hover">
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
						<a href="{{ route('adresse.edit', $address->id) }}"><button class="btn btn-sm btn-warning">Editer</button></a>
						{{ Aire::open()->route('adresse.destroy', $address->id)->class('delete-form')->delete() }}
						    {{ Aire::submit('Supprimer')->class('btn btn-sm btn-danger eraser') }}
						{{ Aire::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection
