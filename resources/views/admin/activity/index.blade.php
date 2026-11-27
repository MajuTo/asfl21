@extends('layouts.admin')
@section('content')
	<div class="row">
		<div class="col-sm-6">
			<h2>Gestion des activités</h2>
		</div>
		<div class="col-sm-6">
			<h2><a href="{{ route('admin.activity.create') }}" ><button class="btn btn-pink float-end">Ajouter</button></a></h2>
		</div>
	</div>
	<table class="table table-sm table-hover">
		<thead>
            <tr>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
		</thead>
		<tbody>
			@foreach($activities as $activity)
				<tr>
					<td>{{ $activity->activityName }}</td>
					<td>
						<a href="{{ route('admin.activity.edit', $activity->id) }}"><button class="btn btn-sm btn-warning">Editer</button></a>
						{{ Aire::open()->route('admin.activity.destroy', $activity->id)->delete()->addClass('inline-display') }}
						    {{ Aire::bind($activity) }}
						    {{ Aire::submit('Supprimer')->addClass('btn-sm btn-danger eraser') }}
						{{ Aire::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $activities->links() }}
@endsection
