@extends('layouts.admin')
@section('content')
	<h2>Gestion des messages</h2>
	<table class="table table-condensed table-hover">
		<thead>
			<td>Auteur</td>
			<td>Titre</td>
			<td>Groupe</td>
			<td>Actions</td>
		</thead>
		<tbody>
			@foreach($messages as $message)
				<tr>
					<td>{{ Str::title($message->user->firstname) . ' ' . Str::upper($message->user->name) }}</td>
					<td>{{ Str::title($message->title) }}</td>
					<td>{{ $message->category->categoryName }}</td>
					<td>
						<a href="{{ route('admin.message.edit', $message->id) }}"><button class="btn label label-warning">Editer</button></a>
						{{--{!! BootForm::open()->delete()->action(route('admin.message.destroy', $message->id))->style('display: inline;') !!}--}}
						    {{--{!! Form::token() !!}--}}
						    {{--{!! BootForm::bind($message) !!}--}}
						    {{--{!! BootForm::submit('Supprimer', 'label-danger label eraser') !!}--}}
						{{--{!! BootForm::close() !!}--}}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $messages->links() }}
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-membre').addClass('active');
            $('#nav-admin').addClass('active');
            $('#nav-admin-messages').addClass('active');
        });
    </script>
@stop