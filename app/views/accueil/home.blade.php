@extends('layouts.index')
@section('content')
<section id="accueil">
	<div class="row">
		<div class="col-sm-12">
			<h1>Association des Sages Femmes Libérales de Côte d'Or</h1>
		</div>
	</div>

	<!-- CAROUSEL -->
	<div id="carousel-home" class="carousel slide" data-ride="carousel" data-interval="8000">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
	    <li data-target="#carousel-home" data-slide-to="0" class="active"></li>
	    <li data-target="#carousel-home" data-slide-to="1"></li>
	    <li data-target="#carousel-home" data-slide-to="2"></li>
	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
	    <div class="item active">
		    <div class="carousel-img" id="carousel-one"></div>
	    </div>
	    <div class="item">
		    <div class="carousel-img" id="carousel-two"></div>
	    </div>
	    <div class="item">
	    	<div class="carousel-img" id="carousel-three"></div>
	    </div>
	  </div>

	  <!-- Controls -->
	  <a class="left carousel-control" href="#carousel-home" role="button" data-slide="prev">
	    <span aria-hidden="true"><i class="fa fa-angle-double-left" id="carousel-ctrl-left"></i></span>
	    <span class="sr-only">Précédent</span>
	  </a>
	  <a class="right carousel-control" href="#carousel-home" role="button" data-slide="next">
	    <span aria-hidden="true"><i class="fa fa-angle-double-right" id="carousel-ctrl-right"></i></span>
	    <span class="sr-only">Suivant</span>
	  </a>
	</div>
	<!-- END CAROUSEL -->

	<!-- ACCUEIL TEXT -->
	<div class="row">
		<div class="text-justify" id="accueil-text">
			<p><i class="fa fa-female"></i> Parce que l'on peut avoir besoin d'une <strong>Sage-Femme</strong> à chaque période de la vie.</p>
			<p><i class="fa fa-comments"></i> Parce qu'<strong>être accompagnée</strong> et guidée dans sa féminité et sa maternité est essentiel.</p>
			<p><i class="fa fa-question-circle"></i> Parce qu'on ne sait pas toujours ce qui <strong>s'offre à nous</strong>.</p>
			<p><i class="fa fa-group"></i> Les sages-femmes libérales de la Côte-d'Or ont souhaité s'unir en une association</p>
			<p>pour proposer à <strong>chaque femme, couple et enfant</strong></p>
			<p>une information claire et un accompagnement adapté à chacun.</p>
		</div>
	</div>
<!-- 	<div class="row">
		<div class="col-sm-6">
			<ul id="home-li pull-right">
				<li><a href="{{ URL::route('notremetier') }}"><i class="fa fa-long-arrow-right"></i> Que me propose ma sage femme Libérale ?</a></li>
				<li><a href="{{ URL::route('noustrouver') }}"><i class="fa fa-long-arrow-right"></i> Où la trouver ?</a></li>
				<li><a href="#"><i class="fa fa-long-arrow-right"></i> Calendrier de grossesse</a></li>
				<li><a href="#"><i class="fa fa-long-arrow-right"></i> Liens utiles</a></li>
				<li><a href="{{ URL::route('message.index') }}"><i class="fa fa-long-arrow-right"></i> Espace PRO</a></li>
			</ul>
		</div>
		<div class="col-sm-6">
			<img class="img-responsive img-rounded" id="feet" src="{{ asset('assets/img/pregnant-collection/feet-619534_1280.jpg') }}" alt="pieds de bébé">
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