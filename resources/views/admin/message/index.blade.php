@extends('layouts.admin')
@section('content')
	<h2>Gestion des messages</h2>
	<table class="table table-sm table-hover">
		<thead>
            <tr>
                <th>Auteur</th>
                <th>Titre</th>
                <th>Groupe</th>
                <th>Actions</th>
            </tr>
		</thead>
		<tbody>
			@foreach($messages as $message)
				<tr>
					<td>{{ Str::title($message->user->firstname) . ' ' . Str::upper($message->user->name) }}</td>
					<td>{{ Str::title($message->title) }}</td>
					<td>{{ $message->category->categoryName }}</td>
					<td>
						<a href="{{ route('admin.message.edit', $message->id) }}"><button class="btn btn-sm btn-warning">Editer</button></a>
{{--                        {{ Aire::open('admin.message.destroy') }}--}}
{{--                            {{ Aire::submit('X')->removeClass('btn-primary')->delete()->class('btn label label-danger eraser') }}--}}
{{--                        {{ Aire::close() }}--}}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $messages->links() }}
@endsection
