@extends('layouts.admin')
@section('admincontent')
{{--	<div class="row d-flex justify-content-between">--}}
    <div><a class="btn btn-pink float-end" href="{{ route('admin.partner.create') }}">Ajouter</a></div>
    <h2>Gestion des partenaires</h2>
{{--	</div>--}}
	<table class="table table-sm table-hover">
		<thead>
			<th>Nom</th>
			<th>Logo</th>
			<th>Contact</th>
			<th>Actions</th>
		</thead>
		<tbody>
			@foreach($partners as $partner)
				<tr>
					<td>{{ $partner->partnerName }}</td>
					<td>{{ ($partner->logo) ? html()->img(asset($partner->logo), 'Logo de '.$partner->partnerName)->class('admin_logo_index') : '' }}</td>
					<td>{{ $partner->contact }}</td>
					<td>
						<a href="{{ route('admin.partner.edit', $partner->id) }}"><button class="btn badge text-bg-warning">Editer</button></a>
                        <x-delete-form :action="route('admin.partner.destroy', $partner->id)"></x-delete-form>
{{--						{!! BootForm::open()->delete()->action(route('admin.partner.destroy', $partner->id))->style('display: inline;') !!}--}}
{{--						    {!! Form::token() !!}--}}
{{--						    {!! BootForm::bind($partner) !!}--}}
{{--						    {!! BootForm::submit('Supprimer', 'text-bg-danger badge eraser') !!}--}}
{{--						{!! BootForm::close() !!}--}}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $partners->links() }}
@stop
{{--@section('script')--}}
{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $('#nav-membre').addClass('active');--}}
{{--            $('#nav-admin').addClass('active');--}}
{{--            $('#nav-admin-partners').addClass('active');--}}
{{--        });--}}
{{--    </script>--}}
{{--@stop--}}
