@section('title')
    <title>ASFL21, Les partenaires de l'assocation des sages-femmes de côte d'or</title>
@stop
@extends('layouts.index')
@section('content')
    <div class="row">
    	<div class="col-sm-12">
    	<h1 class="animate-page-title">Nos partenaires</h1 class="animate-page-title">
            @if($partners->isEmpty())
                <p class="text-center">Bientôt sur ce page...</p>
                <img class="img-responsive img-rounded" id="contact-img" src="{{ asset('assets/img/pregnant-collection/pregnant-163611_1280.jpg') }}" alt="femme enceinte avec parapluie">
            @else
            <table class="table table-condensed">
                <tbody>
                    @foreach($partners as $partner)
                    <tr>
                        <td>{{ Html::image(asset($partner->logo), 'Logo de '.$partner->partnerName, ['class' => 'admin_logo_edit']) }}</td>
                        <td>{{ $partner->partnerName }}</td>
                        <td>{{ $partner->contact }}</td>
                        <td>{{ ($partner->partnerWebsite) ? '<a href="$partner->partnerWebsite">Visiter leur site <i class="fas fa-arrow-right"></i></a>' : '' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
@stop
