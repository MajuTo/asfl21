@extends('layouts.admin')
@section('admincontent')
{{--	<div class="row d-flex justify-content-between">--}}
        <a class="btn btn-pink float-end" href="{{ route('admin.link.create') }}">Ajouter</a>
		<h2>Gestion des liens</h2>
{{--	</div>--}}
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
						<a href="{{ route('admin.link.edit', $link->id) }}"><button class="btn badge text-bg-warning">Editer</button></a>
                        <x-delete-form :action="route('admin.link.destroy', $link->id)"></x-delete-form>
{{--						{!! BootForm::open()->delete()->action(route('admin.link.destroy', $link->id))->style('display: inline;') !!}--}}
{{--						    {!! Form::token() !!}--}}
{{--						    {!! BootForm::bind($link) !!}--}}
{{--						    {!! BootForm::submit('Supprimer', 'text-bg-danger badge eraser') !!}--}}
{{--						{!! BootForm::close() !!}--}}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $links->links() }}
@stop
{{--@section('script')--}}
{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $('#nav-membre').addClass('active');--}}
{{--            $('#nav-admin').addClass('active');--}}
{{--            $('#nav-admin-links').addClass('active');--}}
{{--        });--}}
{{--    </script>--}}
{{--@stop--}}
