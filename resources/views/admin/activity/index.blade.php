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
						{!! BootForm::open()->delete()->action(route('admin.activity.destroy', $activity->id))->style('display: inline;') !!}
						    {!! Form::token() !!}
						    {!! BootForm::bind($activity) !!}
						    {!! BootForm::submit('Supprimer', 'label-danger label eraser') !!}
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