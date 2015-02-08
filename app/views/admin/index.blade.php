@extends('layouts.index')
@section('content')
<div class="container">
    <div class="row">
        <h1>Tableau de bord Admin</h1>
        <p>Bienvenue {{ Auth::user()->firstname }}</p>
        <a href="{{ URL::route('admin.user.create') }}" ><button class="btn">Create</button></a>
        <hr>
    </div>
    <div class="row">
	    <div class="col-sm-6">
	    	<h2>Gestion des utilisateurs</h2>
	    	<table class="table table-condensed table-hover">
	    		<thead>
	    			<td>#</td>
	    			<td>Nom</td>
	    			<td>Prénom</td>
	    			<td>Actions</td>
	    		</thead>
	    		<tbody>
					@foreach($users as $user)
						<tr>
							<td>{{ $user->id }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->firstname }}</td>
							<td>
								<a href="#"><span class="label label-warning">Editer</span></a>
								<a href="#"><span class="label label-danger">Désactiver</span></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
	    </div>
    </div>
</div>
@stop