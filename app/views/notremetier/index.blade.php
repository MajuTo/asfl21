@extends('layouts.index')
@section('content')
<div class="container content-container">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="animate-page-title">Que me propose ma sage femme libérale ?</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
    		<h3>Pendant ma grossesse</h3>
    		<ul>
    			<li>Entretien pré natal (entretien du 4eme mois)</li>
    			<li>Préparation a la naissance (classique, haptonomie, piscine ...)</li>
    			<li>Déclaration de grossesse</li>
    			<li>Suivi médical de grossesse (consultations mensuelles)</li>
    			<li>Surveillance à domicile de la grossesse (monitoring)</li>
    		</ul>
        </div>
        <div class="col-sm-4">
    		<h3>Après mon accouchement</h3>
    		<ul>
    			<li>Visite post-accouchement a domicile (allaitement, pesée du bébé, examen gynécologique...)</li>
    			<li>Consultation post-natale ??? (contraception)</li>
    			<li>Rééducation du périnée (méthodes nouvelles, électrostimulation ...)</li>
    		</ul>
        </div>
        <div class="col-sm-4">
    		<h3>Et après ??</h3>
    		<ul>
    			<li>Suivi gynécologique (frottis, pilules, implants, stérilets ..)</li>
    			<li>Sexologie</li>
    			<li>rééducation périnéale (prolipsus, fuites urinaires ...)</li>
    		</ul>
        </div>
    </div>
</div>
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-metier').addClass('active');
        });
    </script>
@stop