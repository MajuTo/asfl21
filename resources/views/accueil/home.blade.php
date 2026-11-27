@section('title')
    <title>Association des Sages Femmes Libérales de Côte d'Or</title>
@endsection
@extends('layouts.index')
@section('content')
    <section id="accueil">
        <div class="row">
            <div class="col-sm-12">
                <h1 id="accueil-h1">Association des Sages Femmes Libérales de Côte d'Or</h1>
            </div>
        </div>

        <!-- CAROUSEL -->
        <div id="carousel-home" class="carousel slide" data-bs-ride="carousel" data-bs-interval="8000">
            <!-- Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel-home" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Image 1"></button>
                <button type="button" data-bs-target="#carousel-home" data-bs-slide-to="1" aria-label="Image 2"></button>
                <button type="button" data-bs-target="#carousel-home" data-bs-slide-to="2" aria-label="Image 3"></button>
            </div>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="carousel-img" id="carousel-one"></div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-img" id="carousel-two"></div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-img" id="carousel-three"></div>
                </div>
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel-home" data-bs-slide="prev">
                <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                <span class="visually-hidden">Précédent</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel-home" data-bs-slide="next">
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                <span class="visually-hidden">Suivant</span>
            </button>
        </div>
        <!-- END CAROUSEL -->

        <!-- ACCUEIL TEXT -->
        <div class="row">
            <div class="text-justify" id="accueil-text">
                <p><i class="fa fa-female"></i> Parce que l'on peut avoir besoin d'une <strong>Sage-Femme</strong> à chaque période de la vie.</p>
                <p><i class="fa fa-comments"></i> Parce qu'<strong>être accompagnée</strong> et guidée dans sa féminité et sa maternité est essentiel.</p>
                <p><i class="fa fa-question-circle"></i> Parce qu'on ne sait pas toujours ce qui <strong>s'offre à nous</strong>.</p>
                <p><i class="fa fa-group"></i> Les sages-femmes libérales de la Côte-d'Or ont souhaité s'unir en une association pour proposer à</p>
                <p><strong>chaque femme, couple et enfant</strong> une information claire et un accompagnement adapté à chacun.</p>
            </div>
        </div>
    </section>
@endsection
