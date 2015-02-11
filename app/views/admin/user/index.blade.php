@extends('layouts.admin')
@section('content')
	<div class="row">
		<div class="col-sm-6">
			<h2>Gestion des activités</h2>
		</div>
		<div class="col-sm-6">
			<h2><a href="{{ URL::route('admin.user.create') }}" ><button class="btn btn-pink pull-right">Ajouter</button></a></h2>
		</div>
	</div>
	<table class="table table-condensed table-hover">
		<thead>
			<td>#</td>
			<td>Nom</td>
			<td>Prénom</td>
			<td>Groupe</td>
			<td>Actions</td>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->firstname }}</td>
					<td>{{ $user->group->groupName }}</td>
					<td>
						<a href="{{ URL::route('admin.user.edit', $user->id) }}"><button class="btn label label-warning">Editer</button></a>
						{{ BootForm::open()->put()->action(URL::route('admin.user.toggle', $user->id))->style('display: inline;') }}
						    {{ Form::token() }}
						    {{ BootForm::bind($user) }}
						    @if($user->active)
						    	{{ BootForm::submit('Désactiver', 'label-danger label') }}
						    @else
								{{ BootForm::submit('Activer', 'label-success label') }}
						    @endif
						{{ BootForm::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{-- $users->links() --}}
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-membre').addClass('active');
            $('#nav-admin').addClass('active');
        });
    </script>
@stop