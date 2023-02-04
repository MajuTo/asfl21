@extends('layouts.admin')
@section('content')
	<div class="row">
		<div class="col-sm-6">
			<h2>Gestion des utilisateurs</h2>
		</div>
		<div class="col-sm-6">
			<h2><a href="{{ route('admin.user.create') }}" ><button class="btn btn-pink pull-right">Ajouter</button></a></h2>
		</div>
	</div>
	<table class="table table-condensed table-hover">
		<thead>
			<td>Nom</td>
			<td>Prénom</td>
			<td>Groupe</td>
			<td>Actions</td>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{ Str::upper($user->name) }}</td>
					<td>{{ Str::title($user->firstname) }}</td>
					<td>{{ Str::title($user->group->groupName) }}</td>
					<td>
						<a href="{{ route('admin.user.edit', $user->id) }}"><button class="btn label label-warning">Editer</button></a>
						{!! BootForm::open()->put()->action(route('admin.user.toggle', $user->id))->style('display: inline;') !!}
						    {!! Form::token() !!}
						    {!! BootForm::bind($user) !!}
						    @if($user->active)
						    	{!! BootForm::submit('Désactiver', 'label-danger label') !!}
						    @else
								{!! BootForm::submit('Activer', 'label-success label') !!}
						    @endif
						{!! BootForm::close() !!}
						@if(!$user->loggedOnce)
							<a href="{{ route('admin.user.sendagain', $user->id) }}"><button class="btn label label-primary">Renvoyer le mail</button></a>
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $users->links() }}
@stop
