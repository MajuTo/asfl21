@section('title')
    <title>ASFL21, Les partenaires de l'assocation des sages-femmes de côte d'or</title>
@endsection
@extends('layouts.index')
@section('content')
    <div class="row">
    	<div class="col-sm-12">
    	<h1 class="animate-page-title">Nos partenaires</h1>
            @if($partners->isEmpty())
                <p class="text-center">Bientôt sur ce page...</p>
                <img class="img-fluid rounded" id="contact-img" src="{{ asset('assets/img/pregnant-collection/pregnant-163611_1280.jpg') }}" alt="femme enceinte avec parapluie">
            @else
            <table class="table table-sm">
                <tbody>
                    @foreach($partners as $partner)
                    <tr>
                        <td><img src="{{ asset($partner->logo) }}" alt="Logo de {{ $partner->partnerName }}" class="admin_logo_edit"></td>
                        <td>{{ $partner->partnerName }}</td>
                        <td>{{ $partner->contact }}</td>
                        <td>{{ ($partner->partnerWebsite) ? '<a href="$partner->partnerWebsite">Visiter leur site <i class="fa fa-arrow-right"></i></a>' : '' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
@endsection
