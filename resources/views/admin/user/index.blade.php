@extends('layouts.admin')
@section('content')
	<div class="row">
		<div class="col-sm-6">
			<h2>Gestion des utilisateurs</h2>
		</div>
		<div class="col-sm-6">
			<h2><a href="{{ route('admin.user.create') }}" ><button class="btn btn-pink float-end">Ajouter</button></a></h2>
		</div>
	</div>
	<table class="table table-sm table-hover">
		<thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Groupe</th>
                <th>Actions</th>
            </tr>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{ Str::upper($user->name) }}</td>
					<td>{{ Str::title($user->firstname) }}</td>
					<td>{{ Str::title($user->group->groupName) }}</td>
					<td>
						<a href="{{ route('admin.user.edit', $user->id) }}"><button class="btn btn-sm btn-warning">Éditer</button></a>
						{{ Aire::open()->route('admin.user.toggle', $user->id)->put() }}
						    @if($user->active)
						    	{{ Aire::submit('Désactiver')->removeClass('btn-primary')->addClass('btn-sm btn-danger') }}
						    @else
								{{ Aire::submit('Activer')->removeClass('btn-primary')->addClass('btn-sm btn-success') }}
						    @endif
						{{ Aire::close() }}
						@if(!$user->loggedOnce)
							<a href="{{ route('admin.user.sendagain', $user->id) }}"><button class="btn btn-sm btn-primary">Renvoyer le mail</button></a>
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $users->links() }}
@endsection
