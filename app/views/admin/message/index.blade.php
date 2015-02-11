@extends('layouts.admin')
@section('content')
	<h2>Gestion des messages</h2>
	<table class="table table-condensed table-hover">
		<thead>
			<td>#</td>
			<td>Auteur</td>
			<td>Titre</td>
			<td>Groupe</td>
			<td>Actions</td>
		</thead>
		<tbody>
			@foreach($messages as $message)
				<tr>
					<td>{{ $message->id }}</td>
					<td>{{ $message->user->firstname . ' ' . $message->user->name }}</td>
					<td>{{ $message->title }}</td>
					<td>{{ $message->category->categoryName }}</td>
					<td>
						<a href="{{ URL::route('admin.message.edit', $message->id) }}"><button class="btn label label-warning">Editer</button></a>
						{{ BootForm::open()->delete()->action(URL::route('admin.message.destroy', $message->id))->style('display: inline;') }}
						    {{ Form::token() }}
						    {{ BootForm::bind($message) }}
						    {{ BootForm::submit('Supprimer', 'label-danger label') }}
						{{ BootForm::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-membre').addClass('active');
            $('#nav-admin').addClass('active');
        });
    </script>
@stop