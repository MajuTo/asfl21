@extends('layouts.index')
@section('content')
<div class="content-container">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="animate-page-title">Que me propose ma sage femme libérale ?</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 text-center">
            {{ HTML::image(asset('assets/img/notre-metier/Pendant_la_grossesse.jpg'), 'LoremPixel', ['class' => 'img-notre-metier']) }}
        </div>
        <div class="col-sm-6">
            <h3>Pendant ma grossesse</h3>
            <ul>
                <li><span data-toggle="tooltip" data-placement="top" data-original-title="Entretien du 4eme mois">Entretien pré natal</span></li>
                <li><span data-toggle="tooltip" data-placement="top" data-original-title="Classique, Haptonomie, Piscine ...">Préparation à la naissance</span></li>
                <li><span data-toggle="tooltip" data-placement="top" data-original-title="">Déclaration de grossesse</span></li>
                <li><span data-toggle="tooltip" data-placement="top" data-original-title="Consultations mensuelles">Suivi médical de grossesse</span></li>
                <li><span data-toggle="tooltip" data-placement="top" data-original-title="Monitoring">Surveillance à domicile de la grossesse</span></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 text-center">
            {{ HTML::image(asset('assets/img/notre-metier/Apres_accouchement.jpg'), 'LoremPixel', ['class' => 'img-notre-metier']) }}
        </div>
        <div class="col-sm-6">
            <h3>Après mon accouchement</h3>
            <ul>
                <li><span data-toggle="tooltip" data-placement="top" data-original-title="Allaitement, Pesée du bébé, Examen gynécologique...">Visite post-accouchement à domicile</span></li>
                <li><span data-toggle="tooltip" data-placement="top" data-original-title="Contraception">Consultation post-natale</span></li>
                <li><span data-toggle="tooltip" data-placement="top" data-original-title="Méthodes nouvelles, Électrostimulation ...">Rééducation du périnée</span></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 text-center">
            {{ HTML::image(asset('assets/img/notre-metier/Et_apres.jpg'), 'LoremPixel', ['class' => 'img-notre-metier']) }}
        </div>
        <div class="col-sm-6">
            <h3>Et après ??</h3>
            <ul>
                <li><span data-toggle="tooltip" data-placement="top" data-original-title="Frottis, Pilules, Implants, Stérilets ...">Suivi gynécologique</span></li>
                <li><span data-toggle="tooltip" data-placement="top" data-original-title="">Sexologie</span></li>
                <li><span data-toggle="tooltip" data-placement="top" data-original-title="Prolipsus, Fuites urinaires ...">Rééducation périnéale</span></li>
            </ul>
        </div>
    </div>
</div>
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-metier').addClass('active');
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@stop