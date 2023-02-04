@section('title')
    <title>ASFL21, Contactez {{ strtoupper($user->name) . ' ' . ucfirst($user->firstname) }}, Sage Femme à Dijon</title>
@stop
@extends('layouts.index')
@section('content')
<section id="user-show">
    <div class="row">
        <div class="col-sm-12">
            <h1>{{ strtoupper($user->name) . ' ' . ucfirst($user->firstname) }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <h3>Mes coordonnées</h3>
            <dl class="dl-horizontal">
                <dt>Nom</dt><dd>{{ strtoupper($user->name) }}</dd>
                <dt>Prénom</dt><dd>{{ ucfirst($user->firstname) }}</dd>
                @if($user->mobile && !$user->hideMobile)
                    <dt>Mobile</dt><dd>{{ $user->mobile }}</dd>
                @endif

                @foreach($address as $add)
                <br>
                    <dt>{{ $add->name }}</dt><dd></dd>
                    <dt>Adresse</dt><dd>{{ $add->address }}</dd>
                    <dt>Code Postal</dt><dd>{{ $add->zipCode }}</dd>
                    <dt>Ville</dt><dd>{{ $add->city }}</dd>
                    @if($add->phone && !$add->hidePhone)
                        <dt>Téléphone Fixe</dt><dd>{{ $add->phone }}</dd>
                    @endif
                    @if($add->fax && !$add->hideFax)
                        <dt>Fax : </dt><dd>{{ $add->fax }}</dd>
                    @endif
                @endforeach

                @if($user->phone && !$user->hidePhone)
                    <dt>Téléphone</dt><dd>{{ $user->phone }}</dd>
                @endif

                @if($user->fax && !$user->hideFax)
                <dt>Fax</dt><dd>{{ $user->fax }}</dd>
                @endif
            </dl>
        </div>
        <div class="col-sm-6">
            <h3>Mes activités</h3>
            <ul class="dl-horizontal">
                @foreach($user->activities as $act)
                    <li>{{ $act->activityName }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    @if($user->email && !$user->hideEmail)
    <div class="row">
        <div class="col-sm-6">
            <h3>Contactez moi</h3>
            {!! BootForm::openHorizontal(['lg' => [3, 9]])->action(route('user.email', $user->id)) !!}
                {!! Form::token() !!}
{{--                {!! BootForm::bind($user) !!}--}}
                {!! BootForm::text('Votre nom', 'name')->placeHolder("Votre nom...")->required() !!}
                {!! BootForm::text('Email', 'email')->placeHolder("Votre email...")->required() !!}
                {!! BootForm::textarea('Message', 'message')->placeHolder("Votre message...")->required() !!}
                <div class="col-lg-offset-3 col-lg-9">
                    {!!getCaptchaBox()!!}
                </div>
                {!! BootForm::submit('Envoyer', 'pull-right btn-pink') !!}
            {!! BootForm::close() !!}
        </div>
        <div class="col-sm-6">
            @if($user->description)
                <h3>Plus de détail</h3>
                <div id="user-description">
                    {!! $user->description !!}
                </div>
            @else
                <img class="img-responsive img-rounded" id="contact-img" src="{{ asset('assets/img/pregnant-collection/belly-painting-france_1920.jpg') }}" alt="femme enceinte belly painting france">
            @endif
        </div>
    </div>
    @endif
</section>
@stop
