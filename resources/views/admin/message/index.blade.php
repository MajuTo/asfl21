@extends('layouts.admin')
@section('admincontent')
	<h2>Gestion des messages</h2>
	<table class="table table-sm table-hover">
		<thead>
			<th>Auteur</th>
			<th>Titre</th>
			<th>Groupe</th>
			<th>Actions</th>
		</thead>
		<tbody>
			@foreach($messages as $message)
				<tr>
					<td>{{ Str::title($message->user->firstname) . ' ' . Str::upper($message->user->name) }}</td>
					<td>{{ Str::title($message->title) }}</td>
					<td>{{ $message->category->categoryName }}</td>
					<td>
						<a href="{{ route('admin.message.edit', $message->id) }}"><button class="btn badge text-bg-warning">Editer</button></a>
{{--                        <x-delete-form :action="route('admin.message.destroy', $message->id)"></x-delete-form>--}}
						{{--{!! BootForm::open()->delete()->action(route('admin.message.destroy', $message->id))->style('display: inline;') !!}--}}
						    {{--{!! Form::token() !!}--}}
						    {{--{!! BootForm::bind($message) !!}--}}
						    {{--{!! BootForm::submit('Supprimer', 'text-bg-danger badge eraser') !!}--}}
						{{--{!! BootForm::close() !!}--}}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $messages->links() }}
@stop
{{--@section('script')--}}
{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $('#nav-membre').addClass('active');--}}
{{--            $('#nav-admin').addClass('active');--}}
{{--            $('#nav-admin-messages').addClass('active');--}}
{{--        });--}}
{{--    </script>--}}
{{--@stop--}}
