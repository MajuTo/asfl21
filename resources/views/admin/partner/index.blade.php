@extends('layouts.admin')
@section('content')
	<div class="row">
		<div class="col-sm-6">
			<h2>Gestion des partenaires</h2>
		</div>
		<div class="col-sm-6">
			<h2><a href="{{ route('admin.partner.create') }}" ><button class="btn btn-pink float-end">Ajouter</button></a></h2>
		</div>
	</div>
	<table class="table table-sm table-hover">
		<thead>
			<tr>
                <th>Nom</th>
                <th>Logo</th>
                <th>Contact</th>
                <th>Actions</th>
            </tr>
		</thead>
		<tbody>
			@foreach($partners as $partner)
				<tr>
					<td>{{ $partner->partnerName }}</td>
					<td>@if($partner->logo) <img src="{{ asset($partner->logo) }}" alt="Logo de {{ $partner->partnerName }}" class="admin_logo_index"> @endif</td>
					<td>{{ $partner->contact }}</td>
					<td>
						<a href="{{ route('admin.partner.edit', $partner->id) }}"><button class="btn btn-sm btn-warning">Éditer</button></a>
						{{ Aire::open()->route('admin.partner.destroy', $partner->id)->delete()->addClass('inline-display') }}
						    {{ Aire::bind($partner) }}
						    {{ Aire::submit('Supprimer')->addClass('btn-sm btn-danger eraser') }}
						{{ Aire::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $partners->links() }}
@endsection
