@extends('layouts.index')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<h1>Association ASFL21</h1>
			<p>En s'unissant en association, les sages femmes libérales de Côte d'Or souhaitent offrir une *mot_illisible* et un accompagnement personnalisé a chaque femme, couple et enfant. Bienvenue sur notre site.</p>
			<p>
				<ul id="home-li">
					<li><a href="{{ URL::route('notremetier') }}">Que me propose ma sage femme Libérale ?</a></li>
					<li><a href="{{ URL::route('noustrouver') }}">Où la trouver ?</a></li>
					<li><a href="#">Calendrier de grossesse</a></li>
					<li><a href="#">Liens utiles</a></li>
					<li><a href="{{ URL::route('message.index') }}">Espace PRO</a></li>
				</ul>
				Ceci est une liste de liens dans sa tête, en gros notre menu j'imagine
			</p>
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