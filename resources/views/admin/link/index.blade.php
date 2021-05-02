@extends('layouts.admin')
@section('content')
	<div class="row d-flex justify-content-between">
		<h2>Gestion des liens</h2>
        <div><a class="btn btn-pink" href="{{ route('admin.link.create') }}">Ajouter</a></div>
	</div>
	<table class="table table-sm table-hover">
		<thead>
			<th>Nom</th>
			<th>Lien</th>
			<th>Actions</th>
		</thead>
		<tbody>
			@foreach($links as $link)
				<tr>
					<td>{{ $link->linkName }}</td>
					<td>{{ $link->link }}</td>
					<td>
						<a href="{{ route('admin.link.edit', $link->id) }}"><button class="btn badge badge-warning">Editer</button></a>
						{!! BootForm::open()->delete()->action(route('admin.link.destroy', $link->id))->style('display: inline;') !!}
						    {!! Form::token() !!}
						    {!! BootForm::bind($link) !!}
						    {!! BootForm::submit('Supprimer', 'badge-danger badge eraser') !!}
						{!! BootForm::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $links->links() }}
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-membre').addClass('active');
            $('#nav-admin').addClass('active');
            $('#nav-admin-links').addClass('active');
        });
    </script>
@stop
