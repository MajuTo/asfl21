@extends('layouts.admin')
@section('admincontent')
{{--	<div class="row d-flex justify-content-between">--}}
    <div><a class="btn btn-pink float-end" href="{{ route('admin.user.create') }}" >Ajouter</a></div>
    <h2 class="offset-2">Gestion des utilisateurs</h2>
{{--	</div>--}}
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
						<a href="{{ route('admin.user.edit', $user->id) }}"><button class="btn badge text-bg-warning">Editer</button></a>
                        {{ aire()->open()->route('admin.user.toggle', $user->id)->put()->style('display: inline;')->bind($user) }}
{{--						{!! BootForm::open()->put()->action(route('admin.user.toggle', $user->id))->style('display: inline;') !!}--}}
{{--						    {!! Form::token() !!}--}}
{{--						    {!! BootForm::bind($user) !!}--}}
						    @if($user->active)
                                {{ aire()->submit('Désactiver')->class('btn text-bg-danger badge')->removeClass('btn-primary') }}
{{--						    	{!! BootForm::submit('Désactiver', 'text-bg-danger badge') !!}--}}
						    @else
                                {{ aire()->submit('Activer')->class('btn text-bg-success badge')->removeClass('btn-primary') }}
{{--								{!! BootForm::submit('Activer', 'text-bg-success badge') !!}--}}
						    @endif
                        {{ aire()->close() }}
{{--						{!! BootForm::close() !!}--}}
						@if(!$user->loggedOnce)
							<a href="{{ route('admin.user.sendagain', $user->id) }}"><button class="btn badge text-bg-primary">Renvoyer le mail</button></a>
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
