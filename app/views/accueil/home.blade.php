@extends('layouts.index')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h1>Association des Sages Femmes Libérales de Côte d'Or</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<p>
			Parce que l'on peut avoir besoin d'une Sage-femme à chaque période de la vie.
			</p>
			<p>
			Parce qu'être accompagnée et guidée dans sa féminité et sa maternité est essentiel.
			</p>
			<p>
			Parce qu'on ne sait pas toujours ce qui s'offre à nous.
			</p>
			<p>
			Les sages-femmes libérales de la Côte-d'Or ont souhaité s'unir en une association pour proposer à chaque femme, couple et enfant une information claire et un accompagnement adapté à chacun.
			</p>
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
		<!-- <div class="col-sm-6">
			<img class="img-responsive img-rounded hidden-sm hidden-xs" id="home-image" src="{{ asset('assets/img/feet-619534_1280.jpg') }}">
		</div> -->
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