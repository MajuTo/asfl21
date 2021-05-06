@extends('layouts.admin')
@section('content')
	<div class="row d-flex justify-content-between">
        <h2>Gestion des activités</h2>
        <div><a class="btn btn-pink" href="{{ route('admin.activity.create') }}">Ajouter</a></div>
	</div>
	<table class="table table-sm table-hover">
		<thead>
			<th>Nom</th>
			<th>Actions</th>
		</thead>
		<tbody>
			@foreach($activities as $activity)
				<tr>
					<td>{{ $activity->activityName }}</td>
					<td>
						<a href="{{ route('admin.activity.edit', $activity->id) }}"><button class="btn badge badge-warning">Editer</button></a>
						{!! BootForm::open()->delete()->action(route('admin.activity.destroy', $activity->id))->style('display: inline;') !!}
						    {!! Form::token() !!}
						    {!! BootForm::bind($activity) !!}
						    {!! BootForm::submit('Supprimer', 'badge-danger badge eraser') !!}
						{!! BootForm::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $activities->links() }}
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-membre').addClass('active');
            $('#nav-admin').addClass('active');
            $('#nav-admin-activities').addClass('active');
        });
    </script>
@stop
