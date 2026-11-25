@extends('layouts.admin')
@section('content')
	<div class="row">
		<div class="col-sm-6">
			<h2>Gestion des activités</h2>
		</div>
		<div class="col-sm-6">
			<h2><a href="{{ route('admin.activity.create') }}" ><button class="btn btn-pink pull-right">Ajouter</button></a></h2>
		</div>
	</div>
	<table class="table table-condensed table-hover">
		<thead>
			<td>Nom</td>
			<td>Actions</td>
		</thead>
		<tbody>
			@foreach($activities as $activity)
				<tr>
					<td>{{ $activity->activityName }}</td>
					<td>
						<a href="{{ route('admin.activity.edit', $activity->id) }}"><button class="btn label label-warning">Editer</button></a>
						{{ Aire::open()->route('admin.activity.destroy', $activity->id)->delete()->addClass('inline-display') }}
						    {{ Aire::bind($activity) }}
						    {{ Aire::submit('Supprimer')->addClass('label-danger label eraser') }}
						{{ Aire::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $activities->links() }}
@stop
