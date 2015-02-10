@extends('layouts.admin')
@section('content')
	<h2>Gestion des utilisateurs</h2>
	<a href="{{ URL::route('admin.user.create') }}" ><button class="btn btn-pink pull-right">Nouveau</button></a>
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
						<a href="#"><button class="btn label label-danger">Désactiver</button></a>
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