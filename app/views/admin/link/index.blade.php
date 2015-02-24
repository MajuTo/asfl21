@extends('layouts.admin')
@section('content')
	<div class="row">
		<div class="col-sm-6">
			<h2>Gestion des liens</h2>
		</div>
		<div class="col-sm-6">
			<h2><a href="{{ URL::route('admin.link.create') }}" ><button class="btn btn-pink pull-right">Ajouter</button></a></h2>
		</div>
	</div>
	<table class="table table-condensed table-hover">
		<thead>
			<td>#</td>
			<td>Nom</td>
			<td>Lien</td>
			<td>Actions</td>
		</thead>
		<tbody>
			@foreach($links as $link)
				<tr>
					<td>{{ $link->id }}</td>
					<td>{{ $link->linkName }}</td>
					<td>{{ $link->link }}</td>
					<td>
						<a href="{{ URL::route('admin.link.edit', $link->id) }}"><button class="btn label label-warning">Editer</button></a>
						{{ BootForm::open()->delete()->action(URL::route('admin.link.destroy', $link->id))->style('display: inline;') }}
						    {{ Form::token() }}
						    {{ BootForm::bind($link) }}
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
            $('#nav-admin-links').addClass('active');
        });
    </script>
@stop