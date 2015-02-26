@extends('layouts.admin')
@section('content')
	<div class="row">
		<div class="col-sm-6">
			<h2>Gestion des partenaires</h2>
		</div>
		<div class="col-sm-6">
			<h2><a href="{{ URL::route('admin.partner.create') }}" ><button class="btn btn-pink pull-right">Ajouter</button></a></h2>
		</div>
	</div>
	<table class="table table-condensed table-hover">
		<thead>
			<td>#</td>
			<td>Nom</td>
			<td>Logo</td>
			<td>Contact</td>
			<td>Actions</td>
		</thead>
		<tbody>
			@foreach($partners as $partner)
				<tr>
					<td>{{ $partner->id }}</td>
					<td>{{ $partner->partnerName }}</td>
					<td>{{ ($partner->logo) ? HTML::image(asset($partner->logo), 'Logo de '.$partner->partnerName, ['class' => 'admin_logo_index']) : '' }}</td>
					<td>{{ $partner->contact }}</td>
					<td>
						<a href="{{ URL::route('admin.partner.edit', $partner->id) }}"><button class="btn label label-warning">Editer</button></a>
						{{ BootForm::open()->delete()->action(URL::route('admin.partner.destroy', $partner->id))->style('display: inline;') }}
						    {{ Form::token() }}
						    {{ BootForm::bind($partner) }}
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
            $('#nav-admin-partners').addClass('active');
        });
    </script>
@stop