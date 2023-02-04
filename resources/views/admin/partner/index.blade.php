@extends('layouts.admin')
@section('content')
	<div class="row">
		<div class="col-sm-6">
			<h2>Gestion des partenaires</h2>
		</div>
		<div class="col-sm-6">
			<h2><a href="{{ route('admin.partner.create') }}" ><button class="btn btn-pink pull-right">Ajouter</button></a></h2>
		</div>
	</div>
	<table class="table table-condensed table-hover">
		<thead>
			<td>Nom</td>
			<td>Logo</td>
			<td>Contact</td>
			<td>Actions</td>
		</thead>
		<tbody>
			@foreach($partners as $partner)
				<tr>
					<td>{{ $partner->partnerName }}</td>
					<td>{{ ($partner->logo) ? Html::image(asset($partner->logo), 'Logo de '.$partner->partnerName, ['class' => 'admin_logo_index']) : '' }}</td>
					<td>{{ $partner->contact }}</td>
					<td>
						<a href="{{ route('admin.partner.edit', $partner->id) }}"><button class="btn label label-warning">Editer</button></a>
						{!! BootForm::open()->delete()->action(route('admin.partner.destroy', $partner->id))->style('display: inline;') !!}
						    {!! Form::token() !!}
						    {!! BootForm::bind($partner) !!}
						    {!! BootForm::submit('Supprimer', 'label-danger label eraser') !!}
						{!! BootForm::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $partners->links() }}
@stop
