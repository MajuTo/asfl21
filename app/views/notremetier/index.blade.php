@extends('layouts.index')
@section('content')
<section id="notremetier">
    <div class="row">
        <div class="col-sm-12">
            <h1>Que me propose ma sage femme libérale ?</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <img class="img-responsive img-rounded" src="{{ asset('assets/img/notre-metier/Pendant_la_grossesse.jpg') }}" alt="pendant la grossesse">
        </div>
        <div class="col-sm-6">
            <h2>Pendant ma grossesse</h2>
            <ul>
                <li>
                    <span class="tooltip-container">
                        <span class="tooltip-title">Entretien pré natal ... </span>
                        <span class="tooltip-body">
                            Peut être réalisé dès le 4ème mois. Cet entretien permet de faire connaissance avec sa Sage-femme et d'être informée sur la préparation à la naissance.
                        </span>
                    </span>
                </li>
                <li>
                    <span class="tooltip-all tooltip-effect-1">
                        <span class="tooltip-item">Préparation à la naissance ... </span>
                        <span class="tooltip-content">
                            <span class="tooltip-text">
                                <ul class="text-justify">
                                    <li><strong>classique</strong>: cours théoriques, dispensés au cabinet de la Sage-femme, individuel ou en groupe, informant sur la grossesse, l'accouchement et ses suites.</li>
                                    <li><strong>haptonomie</strong>: préparation individuelle, en couple, portant notamment sur la communication avec bébé in utero.</li>
                                    <li><strong>piscine</strong>: réalisée en groupe dans certaines piscines de Dijon ou son agglomération.</li>
                                    <li><strong>sophrologie</strong>: cours basés sur la respiration, la détente.</li>
                                    <li><strong>yoga</strong>.</li>
                                </ul>
                            </span>
                        </span>
                    </span>
                </li>

                <li>Préparation à la naissance ... </li>
                <li>Déclaration de grossesse ... </li>
                <li>Massages pré-nataux/massages bébé ... </li>
                <li>Suivi médical de grossesse ... </li>
                <li>Surveillance de la grossesse ... </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <h2>Après mon accouchement</h2>
            <ul>
                <li>Visite post-accouchement à domicile ... </li>
                <li>Consultation post-natale ... </li>
                <li>Rééducation du périnée ... </li>
            </ul>
        </div>
        <div class="col-sm-6">
            <img class="img-responsive img-rounded" src="{{ asset('assets/img/notre-metier/Apres_accouchement.jpg') }}" alt="après l'accouchement">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <img class="img-responsive img-rounded" src="{{ asset('assets/img/notre-metier/Et_apres.jpg') }}" alt="et ensuite ?">
        </div>
        <div class="col-sm-6">
            <h2>Et ensuite ?</h2>
            <ul>
                <li>Visite post-natale ... </li>
                <li>Suivi gynécologique ... </li>
                <li>Sexologie ... </li>
                <li>Osthéopathie ... </li>
                <li>Rééducation périnéale ... </li>
            </ul>
        </div>
    </div>
</section>
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-metier').addClass('active');
        });
    </script>
@stop