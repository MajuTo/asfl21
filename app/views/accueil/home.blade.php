@extends('layouts.index')
@section('content')
<div class="container content-container">
	<div class="row">
		<div class="col-sm-12">
			<h1 class="animate-page-title">Association des Sages Femmes Libérales de Côte d'Or</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<p>En s'unissant en association, les sages femmes libérales de Côte d'Or souhaitent offrir une information et un accompagnement personnalisé à chaque femme, couple et enfant.</p> 
			<p>Bienvenue sur notre site.</p>
			<p>
				<ul id="home-li">
					<li><a href="{{ URL::route('notremetier') }}"><i class="fa fa-long-arrow-right"></i> Que me propose ma sage femme Libérale ?</a></li>
					<li><a href="{{ URL::route('noustrouver') }}"><i class="fa fa-long-arrow-right"></i> Où la trouver ?</a></li>
					<li><a href="#"><i class="fa fa-long-arrow-right"></i> Calendrier de grossesse</a></li>
					<li><a href="#"><i class="fa fa-long-arrow-right"></i> Liens utiles</a></li>
					<li><a href="{{ URL::route('message.index') }}"><i class="fa fa-long-arrow-right"></i> Espace PRO</a></li>
				</ul>
			</p>
		</div>
		<div class="col-sm-6">
			<img class="img-responsive img-rounded" id="test-image" src="{{ asset('assets/img/feet-619534_1280.jpg') }}">
		</div>
	</div>
</div>
@stop

@section('script')
	<script>
		$(document).ready(function(){
			$('#nav-accueil').addClass('active');
		});
	</script>
@stop