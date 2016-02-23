@extends('layouts.index')
@section('content')
<section id="accueil">
	<div class="row">
		<div class="col-sm-12">
			<h1>Association des Sages Femmes Libérales de Côte d'Or</h1>
		</div>
	</div>
	<div class="row" id="accueil-first-row">
		<div class="col-sm-6 text-justify" id="accueil-text">
			<p><i class="fa fa-female"></i> Parce que l'on peut avoir besoin d'une Sage-femme à chaque période de la vie.</p>
			<p><i class="fa fa-comments"></i> Parce qu'être accompagnée et guidée dans sa féminité et sa maternité est essentiel.</p>
			<p><i class="fa fa-question-circle"></i> Parce qu'on ne sait pas toujours ce qui s'offre à nous.</p>
			<p><i class="fa fa-group"></i> Les sages-femmes libérales de la Côte-d'Or ont souhaité s'unir en une association pour proposer à chaque femme, couple et enfant une information claire et un accompagnement adapté à chacun.</p>
		</div>
		<div class="col-sm-6">
			<ul id="home-li">
				<li><a href="{{ URL::route('notremetier') }}"><i class="fa fa-long-arrow-right"></i> Que me propose ma sage femme Libérale ?</a></li>
				<li><a href="{{ URL::route('noustrouver') }}"><i class="fa fa-long-arrow-right"></i> Où la trouver ?</a></li>
				<li><a href="#"><i class="fa fa-long-arrow-right"></i> Calendrier de grossesse</a></li>
				<li><a href="#"><i class="fa fa-long-arrow-right"></i> Liens utiles</a></li>
				<li><a href="{{ URL::route('message.index') }}"><i class="fa fa-long-arrow-right"></i> Espace PRO</a></li>
			</ul>
		</div>
	</div>
	<!-- <div class="row">
		<div class="col-sm-12">
			<img class="img-responsive img-rounded hidden-sm hidden-xs" id="home-image" src="{{ asset('assets/img/pregnant-collection/pregnant-looking-up-bandeau.jpg') }}">
		</div>
	</div> -->
</section>
@stop

@section('script')
	<script>
		$(document).ready(function(){
			$('#nav-accueil').addClass('active');
		});
	</script>
@stop