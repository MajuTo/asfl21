@section('title')
    <title>ASFL21, Contactez {{ strtoupper($user->name) . ' ' . ucfirst($user->firstname) }}, Sage Femme à Dijon</title>
@endsection
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
            <dl class="row">
                <dt class="col-sm-4 text-sm-end">Nom</dt><dd class="col-sm-8">{{ strtoupper($user->name) }}</dd>
                <dt class="col-sm-4 text-sm-end">Prénom</dt><dd class="col-sm-8">{{ ucfirst($user->firstname) }}</dd>
                @if($user->mobile && !$user->hideMobile)
                    <dt class="col-sm-4 text-sm-end">Mobile</dt><dd class="col-sm-8">{{ $user->mobile }}</dd>
                @endif

                @foreach($address as $add)
                    <dt class="col-12 mt-3 address-name">{{ $add->name }}</dt>
                    <dt class="col-sm-4 text-sm-end">Adresse</dt><dd class="col-sm-8">{{ $add->address }}</dd>
                    <dt class="col-sm-4 text-sm-end">Code Postal</dt><dd class="col-sm-8">{{ $add->zipCode }}</dd>
                    <dt class="col-sm-4 text-sm-end">Ville</dt><dd class="col-sm-8">{{ $add->city }}</dd>
                    @if($add->phone && !$add->hidePhone)
                        <dt class="col-sm-4 text-sm-end">Téléphone Fixe</dt><dd class="col-sm-8">{{ $add->phone }}</dd>
                    @endif
                    @if($add->fax && !$add->hideFax)
                        <dt class="col-sm-4 text-sm-end">Fax : </dt><dd class="col-sm-8">{{ $add->fax }}</dd>
                    @endif
                @endforeach

                @if($user->phone && !$user->hidePhone)
                    <dt class="col-sm-4 text-sm-end">Téléphone</dt><dd class="col-sm-8">{{ $user->phone }}</dd>
                @endif

                @if($user->fax && !$user->hideFax)
                <dt class="col-sm-4 text-sm-end">Fax</dt><dd class="col-sm-8">{{ $user->fax }}</dd>
                @endif
            </dl>
        </div>
        <div class="col-sm-6">
            <h3>Mes activités</h3>
            <ul>
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
            {{ Aire::open()->route('user.email', $user->id) }}
                {{ Aire::input('name', 'Votre nom')->placeholder("Votre nom...")->required() }}
                {{ Aire::input('email', 'Email')->placeholder("Votre email...")->required() }}
                {{ Aire::textarea('message', 'Message')->placeholder("Votre message...")->required() }}
                <x-captcha />
                <x-honeypot />
                {{ Aire::submit('Envoyer')->addClass('float-end btn-pink') }}
            {{ Aire::close() }}
        </div>
        <div class="col-sm-6">
            @if($user->description)
                <h3>Plus de détail</h3>
                <div id="user-description">
                    {!! $user->description !!}
                </div>
            @else
                <img class="img-fluid rounded" id="contact-img" src="{{ asset('assets/img/pregnant-collection/belly-painting-france_1920.jpg') }}" alt="femme enceinte belly painting france">
            @endif
        </div>
    </div>
    @endif
</section>
@endsection
