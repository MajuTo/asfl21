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
                <li><span data-toggle="tooltip" data-placement="right" data-original-title="Peut être réalisé dès le 4ème mois, cet entretien permet de faire connaissance avec sa Sage-femme pour être informée sur la préparation à la naissance notamments">Entretien pré natal</span></li>
                <li><span data-toggle="tooltip" data-placement="right" data-html="true" data-original-title="<div style='text-align:left;><ul><li>--- classique: cours théoriques, dispensés au cabinet de la Sage-femme, individuel ou en groupe, informant sur la grossesse, l'accouchement et ses suites.</li>
<li>--- haptonomie: préparation individuelle, en couple, portant notamment sur la communication avec bébé in utero.</li>
<li>--- piscine: réalisée en groupe dans certaines piscines de Dijon ou son agglomération.</li>
<li>--- sophrologie: cours basés sur la respiration, la détente.</li>
<li>--- yoga.</li></ul></div>">Préparation à la naissance</span></li>
                <li><span data-toggle="tooltip" data-placement="right" data-original-title="Chaque mois, la Sage-femme réalise et prescrit tous les examens nécessaires pour le suivi d'une grossesse normale">Déclaration de grossesse</span></li>
                <li><span data-toggle="tooltip" data-placement="right" data-original-title="Massages pendant la grossesse / Démonstration et apprentissage du massage agréable pour les bébés">Massages pré-nataux/massages bébé</span></li>
                <li><span data-toggle="tooltip" data-placement="right" data-original-title="Consultations mensuelles">Suivi médical de grossesse</span></li>
                <li><span data-toggle="tooltip" data-placement="right" data-original-title="Sur prescription médicale, la Sage-femme effectue une surveillance de votre fœtus et des contractions utérines grâce au même appareil qu'en maternité. S'effectue en général à votre domicile">Surveillance de la grossesse</span></li>
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
                <li><span data-toggle="tooltip" data-placement="right" data-original-title="Utilisation de l’homéopathie pour soulager certains maux de la grossesse, préparer l'accouchement et améliorer les suites de la naissance">Visite post-accouchement à domicile</span></li>
                <li><span data-toggle="tooltip" data-placement="right" data-original-title="Examen réalisé 6 à 8 semaines après l'accouchement pour aborder les sujets tels que contraception et rééducation périnéale">Consultation post-natale</span></li>
                <li><span data-toggle="tooltip" data-placement="right" data-original-title="Réparation du muscle périnée après l'accouchement, grâce à différentes méthodes (électro-stimulation, manuelle ou abdo-uro-mg)">Rééducation du périnée</span></li>
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
                <li><span data-toggle="tooltip" data-placement="right" data-original-title="La Sage-femme ausculte Maman et bébé dans les jours qui suivent  la sortie de la maternité">Suivi post-natal à domicile</span></li>
                <li><span data-toggle="tooltip" data-placement="right" data-original-title="la sage-femme réalise et prescrit tous les examens nécessaires au suivi gynécologique normal (frottis, prescription de pilule, pose et retrait de stérilet ou d’implant…)">Suivi gynécologique</span></li>
                <li><span data-toggle="tooltip" data-placement="right" data-original-title="Accompagnement du couple dans la vie intime">Sexologie</span></li>
                <li><span data-toggle="tooltip" data-placement="right" data-original-title="Approche ostéopathique pour maman et bébé">Osthéopathie</span></li>
                <li><span data-toggle="tooltip" data-placement="right" data-original-title="Prolipsus, Fuites urinaires ...">Rééducation périnéale</span></li>
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