@extends('layouts.index')
@section('content')
<section id="notremetier">
    <span id="overlay"></span>
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
                <li>Entretien pré natal</li>
                <li>Préparation à la naissance</li>
                <li>Déclaration de grossesse</li>
                <li>Massages pré-nataux/massages bébé</li>
                <li>Suivi médical de grossesse</li>
                <li>Surveillance de la grossesse</li>
                <li class="info" id="info-grossesse"><i class="fa fa-circle-o pulsing-circle"></i> Plus d'info...</li>
            </ul>
        </div>
        <span class="whoooshh" id="whoooshh-grossesse">
            <div class="text-right"><span class="whoooshh-close">Fermer X</span></div>
            <div class="row whoooshh-row">
                <div class="col-sm-4">
                    <div class="metier-content" id="prenatale">
                        <h4 class="content-head">Entretien pré natal</h4>
                        <div class="content-body">
                            <p>Peut être réalisé dès le 4ème mois. Cet entretien permet de faire connaissance avec sa Sage-femme et d'être informée sur la préparation à la naissance.</p>
                        </div>
                    </div>
                    <div class="metier-content" id="declaration">
                        <h4 class="content-head">Déclaration de grossesse</h4>
                        <div class="content-body">
                            <p>Chaque mois, la Sage-femme réalise et prescrit tous les examens nécessaires pour le suivi d'une grossesse normale</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4"> 
                    <div class="metier-content" id="preparation">
                        <h4 class="content-head">Préparation à la naissance</h4>
                        <div class="content-body">
                            <p><strong>classique</strong>: cours théoriques, dispensés au cabinet de la Sage-femme, individuel ou en groupe, informant sur la grossesse, l'accouchement et ses suites.</p>
                            <p><strong>haptonomie</strong>: préparation individuelle, en couple, portant notamment sur la communication avec bébé in utero.</p>
                            <p><strong>piscine</strong>: réalisée en groupe dans certaines piscines de Dijon ou son agglomération.</p>
                            <p><strong>sophrologie</strong>: cours basés sur la respiration, la détente.</p>
                            <p><strong>yoga</strong> pour femme enceinte.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <!-- <div class="metier-content" id="suivi">
                        <h4 class="content-head">Suivi médical de grossesse </h4>
                        <div class="content-body">
                            <p>Consultations mensuelles</p>
                        </div>
                    </div> -->
                    <div class="metier-content" id="massage">
                        <h4 class="content-head">Massages pré-nataux/massages bébé</h4>
                        <div class="content-body">
                            <p>Massages pendant la grossesse / Démonstration et apprentissage du massage agréable pour les bébés</p>
                        </div>
                    </div>
                    <div class="metier-content" id="surveillance">
                        <h4 class="content-head">Surveillance de la grossesse </h4>
                        <div class="content-body">
                        <p>Sur prescription médicale, la Sage-femme effectue une surveillance de votre fœtus et des contractions utérines grâce au même appareil qu'en maternité. S'effectue en général à votre domicile</p>
                        </div>
                    </div>
                </div>
            </div>
        </span>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <h2>Après mon accouchement</h2>
            <ul>
                <li>Visite post-accouchement à domicile</li>
                <li>Consultation post-natale</li>
                <li>Rééducation du périnée</li>
                <li class="info" id="info-accouchement"><i class="fa fa-circle-o pulsing-circle"></i> Plus d'info...</li>
            </ul>
        </div>
        <div class="col-sm-6">
            <img class="img-responsive img-rounded" src="{{ asset('assets/img/notre-metier/Apres_accouchement.jpg') }}" alt="après l'accouchement">
        </div>
        <span class="whoooshh" id="whoooshh-accouchement">
            <div class="text-right"><span class="whoooshh-close">Fermer X</span></div>
            <div class="row whoooshh-row">
                <div class="col-sm-4">
                    <div class="metier-content">
                        <h4 class="content-head">Visite post-accouchement à domicile</h4>
                        <div class="content-body">
                            <p>Utilisation de l’homéopathie pour soulager certains maux de la grossesse, préparer l'accouchement et améliorer les suites de la naissance</p>
                        </div>
                    </div>    
                </div>
                <div class="col-sm-4">
                    <div class="metier-content">
                        <h4 class="content-head">Consultation post-natale</h4>
                        <div class="content-body">
                            <p>Examen réalisé 6 à 8 semaines après l'accouchement pour aborder les sujets tels que contraception et rééducation périnéale</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="metier-content">
                        <h4 class="content-head">Rééducation du périnée</h4>
                        <div class="content-body">
                            <p>Réparation du muscle périnée après l'accouchement, grâce à différentes méthodes (électro-stimulation, manuelle ou abdo-uro-mg)</p>
                        </div>
                    </div>
                </div>
            </div>
        </span>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <img class="img-responsive img-rounded" src="{{ asset('assets/img/notre-metier/Et_apres.jpg') }}" alt="et ensuite ?">
        </div>
        <div class="col-sm-6">
            <h2>Et ensuite ?</h2>
            <ul>
                <li>Visite post-natale</li>
                <li>Suivi gynécologique</li>
                <li>Sexologie</li>
                <li>Osthéopathie</li>
                <li>Rééducation périnéale</li>
                <li class="info" id="info-ensuite"><i class="fa fa-circle-o pulsing-circle"></i> Plus d'info...</li>
            </ul>
        </div>
        <span class="whoooshh" id="whoooshh-ensuite">
            <div class="text-right"><span class="whoooshh-close">Fermer X</span></div>
            <div class="row whoooshh-row">
                <div class="col-sm-4">
                    <div class="metier-content">
                        <h4 class="content-head">Visite post-natale</h4>
                        <div class="content-body">
                            <p>La Sage-femme ausculte Maman et bébé dans les jours qui suivent  la sortie de la maternité</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="metier-content">
                        <h4 class="content-head">Suivi gynécologique</h4>
                        <div class="content-body">
                            <p>La sage-femme réalise et prescrit tous les examens nécessaires au suivi gynécologique normal (frottis, prescription de pilule, pose et retrait de stérilet ou d’implant…)</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="metier-content">
                        <h4 class="content-head">Sexologie</h4>
                        <div class="content-body">
                            <p>Accompagnement du couple dans la vie intime.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="metier-content">
                        <h4 class="content-head">Osthéopathie</h4>
                        <div class="content-body">
                            <p>Approche ostéopathique pour maman et bébé.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="metier-content">
                        <h4 class="content-head">Rééducation périnéale</h4>
                        <div class="content-body">
                            <p>Une rééducation de la sphère périnéale peut être nécessaire.</p>
                        </div>
                    </div>
                </div>
            </div>
        </span>
    </div>
</section>
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-metier').addClass('active');

            $('.info').click(function(event) {
                $('.whoooshh').removeClass('whoooshh-active');
                $('#overlay').addClass('overlay');

                var thiswhooosh = '#whoooshh-' + $(this).attr('id').split('-')[1];
                $(thiswhooosh).addClass('whoooshh-active');
            });

            $('.whoooshh-close').click(function(event) {
                var thiswhooosh = '#' + $(this).parents('.whoooshh').attr('id');
                $(thiswhooosh).removeClass('whoooshh-active');
                $('#overlay').removeClass('overlay');
            });
        });
    </script>
@stop