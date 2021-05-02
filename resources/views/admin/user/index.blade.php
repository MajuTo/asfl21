@extends('layouts.admin')
@section('content')
	<div class="row d-flex justify-content-between">
        <h2>Gestion des utilisateurs</h2>
        <div><a class="btn btn-pink" href="{{ route('admin.user.create') }}" >Ajouter</a></div>
	</div>
	<table class="table table-sm table-hover">
		<thead>
			<th>Nom</th>
			<th>Prénom</th>
			<th>Groupe</th>
			<th>Actions</th>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{ Str::upper($user->name) }}</td>
					<td>{{ Str::title($user->firstname) }}</td>
					<td>{{ Str::title($user->group->groupName) }}</td>
					<td>
						<a href="{{ route('admin.user.edit', $user->id) }}"><button class="btn badge badge-warning">Editer</button></a>
						{!! BootForm::open()->put()->action(route('admin.user.toggle', $user->id))->style('display: inline;') !!}
						    {!! Form::token() !!}
						    {!! BootForm::bind($user) !!}
						    @if($user->active)
						    	{!! BootForm::submit('Désactiver', 'badge-danger badge') !!}
						    @else
								{!! BootForm::submit('Activer', 'badge-success badge') !!}
						    @endif
						{!! BootForm::close() !!}
						@if(!$user->loggedOnce)
							<a href="{{ route('admin.user.sendagain', $user->id) }}"><button class="btn badge badge-primary">Renvoyer le mail</button></a>
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $users->links() }}
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-membre').addClass('active');
            $('#nav-admin').addClass('active');
            $('#nav-admin-users').addClass('active');
        });
    </script>
@stop
