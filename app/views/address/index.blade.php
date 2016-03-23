@extends('layouts.index')
@section('content')
<div class="content-container"> 
	<div class="row">
		<div class="col-sm-6">
			<h2>Mes Adresses</h2>
		</div>
		<div class="col-sm-6">
			<h2><a href="{{ URL::route('adresse.create') }}" ><button class="btn btn-pink pull-right">Ajouter</button></a></h2>
		</div>
	</div>
	<table class="table table-condensed table-hover">
		<thead>
			<td>Nom</td>
			<td>Adresse</td>
			<td>Téléphone</td>
			<td>Actions</td>
		</thead>
		<tbody>
			@foreach($addresses as $address)
				<tr>
					<td>{{ $address->name }}</td>
					<td>{{ Str::title($address->address) }}, {{ $address->zipCode }}, {{ Str::title($address->city) }}</td>
					<td>{{ $address->phone }}</td>
					<td>
						<a href="{{ URL::route('adresse.edit', $address->id) }}"><button class="btn label label-warning">Editer</button></a>
						{{ BootForm::open()->delete()->action(URL::route('adresse.destroy', $address->id))->style('display: inline;') }}
						    {{ Form::token() }}
						    {{ BootForm::bind($address) }}
						    {{ BootForm::submit('Supprimer', 'label-danger label eraser') }}
						{{ BootForm::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-membre').addClass('active');
            $('#nav-admin').addClass('active');
            $('#nav-admin-users').addClass('active');
        });
    </script>
@stop