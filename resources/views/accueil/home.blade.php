@section('title')
    <title>Association des Sages Femmes Libérales de Côte d'Or</title>
@stop
@extends('layouts.index')
@section('content')
    <section id="accueil">
        <div class="row">
            <div class="col-sm-12">
                <h1 id="accueil-h1">Association des Sages Femmes Libérales de Côte d'Or</h1>
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
            <a class="carousel-control-prev" href="#carousel-home" role="button" data-slide="prev">
{{--                <span aria-hidden="true"><i class="fas fa-angle-double-left" id="carousel-ctrl-left"></i></span>--}}
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Précédent</span>
            </a>
            <a class="carousel-control-next" href="#carousel-home" role="button" data-slide="next">
{{--                <span aria-hidden="true"><i class="fas fa-angle-double-right" id="carousel-ctrl-right"></i></span>--}}
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Suivant</span>
            </a>
        </div>
        <!-- END CAROUSEL -->

        <!-- ACCUEIL TEXT -->
        <div class="row">
            <div class="text-justify" id="accueil-text">
                <p><i class="fas fa-female"></i> Parce que l'on peut avoir besoin d'une <strong>Sage-Femme</strong> à chaque période de la vie.</p>
                <p><i class="fas fa-comments"></i> Parce qu'<strong>être accompagnée</strong> et guidée dans sa féminité et sa maternité est essentiel.</p>
                <p><i class="fas fa-question-circle"></i> Parce qu'on ne sait pas toujours ce qui <strong>s'offre à nous</strong>.</p>
                <p><i class="fas fa-users"></i> Les sages-femmes libérales de la Côte-d'Or ont souhaité s'unir en une association pour proposer à</p>
                <p><strong>chaque femme, couple et enfant</strong> une information claire et un accompagnement adapté à chacun.</p>
            </div>
        </div>
    </section>
@stop
