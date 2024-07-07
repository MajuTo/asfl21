@extends('layouts.admin')
@section('admincontent')
{{--	<div class="d-flex justify-content-between">--}}
        <a class="btn btn-pink float-end" href="{{ route('admin.activity.create') }}">Ajouter</a>
        <h2>Gestion des activités</h2>
{{--        <div>--}}
{{--        </div>--}}
{{--	</div>--}}
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
						<a href="{{ route('admin.activity.edit', $activity->id) }}"><button class="btn badge text-bg-warning">Editer</button></a>
                        <x-delete-form :action="route('admin.activity.destroy', $activity->id)"></x-delete-form>
{{--						{!! BootForm::open()->delete()->action(route('admin.activity.destroy', $activity->id))->style('display: inline;') !!}--}}
{{--						    {!! Form::token() !!}--}}
{{--						    {!! BootForm::bind($activity) !!}--}}
{{--						    {!! BootForm::submit('Supprimer', 'text-bg-danger badge eraser') !!}--}}
{{--						{!! BootForm::close() !!}--}}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $activities->links() }}
@stop
{{--@section('script')--}}
{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $('#nav-membre').addClass('active');--}}
{{--            $('#nav-admin').addClass('active');--}}
{{--            $('#nav-admin-activities').addClass('active');--}}
{{--        });--}}
{{--    </script>--}}
{{--@stop--}}
