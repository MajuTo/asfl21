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
        <div class="col-sm-4">
            <h3>Mes coordonnées</h3>
            <dl class="row">
                <dt class="col-sm-3">Nom</dt><dd class="col-sm-9">{{ strtoupper($user->name) }}</dd>
                <dt class="col-sm-3">Prénom</dt><dd class="col-sm-9">{{ ucfirst($user->firstname) }}</dd>
                @if($user->mobile && !$user->hideMobile)
                    <dt class="col-sm-3">Mobile</dt><dd class="col-sm-9">{{ $user->mobile }}</dd>
                @endif
            </dl>

                @foreach($address as $i => $add)
{{--                <br>--}}
{{--                {{ $add->name }}--}}
                <dl class="row">
                    <dt class="col-sm-3 fw-bold">{{ $add->name }}</dt><dd class="col-sm-9"></dd>
                    <dt class="col-sm-3">Adresse</dt><dd class="col-sm-9">{{ $add->address }}</dd>
                    <dt class="col-sm-3">Code Postal</dt><dd class="col-sm-9">{{ $add->zipCode }}</dd>
                    <dt class="col-sm-3">Ville</dt><dd class="col-sm-9">{{ $add->city }}</dd>
                    @if($add->phone && !$add->hidePhone)
                        <dt class="col-sm-3">Téléphone Fixe</dt><dd class="col-sm-9">{{ $add->phone }}</dd>
                    @endif
                    @if($add->fax && !$add->hideFax)
                        <dt class="col-sm-3">Fax : </dt><dd class="col-sm-9">{{ $add->fax }}</dd>
                    @endif
                </dl>
                @endforeach
                <dl class="row">
            </dl>
        </div>
        <div class="col-sm-4">
            <h3>Mes activités</h3>
            <ul class="dl-horizontal">
                @foreach($user->activities as $act)
                    <li>{{ $act->activityName }}</li>
                @endforeach
            </ul>
        </div>
{{--    </div>--}}

    @if($user->email && !$user->hideEmail)
{{--    <div class="row">--}}
        <div class="col-sm-4">
            <h3>Contactez moi</h3>
            {{ aire()->open()->route('user.email', $user->id) }}
            {{ aire()->input('name', 'Votre nom')->placeHolder("Votre nom...")->groupAddClass('mb-2')->required() }}
            {{ aire()->email('email', 'Email')->placeHolder("Votre email...")->groupAddClass('mb-2')->required() }}
            {{ aire()->textArea('message', 'Message')->placeHolder("Votre message...")->rows(10)->groupAddClass('mb-3')->required() }}
            {!! captcha_img('inverse') !!}
            {{ aire()->input('captcha')->groupAddClass('mb-3') }}
            {{ aire()->submit('Envoyer')->class('float-end btn-pink') }}
            {{ aire()->close() }}
{{--            {!! BootForm::openHorizontal(['lg' => [3, 9]])->action(route('user.email', $user->id)) !!}--}}
{{--                {!! Form::token() !!}--}}
{{--                {!! BootForm::bind($user) !!}--}}
{{--                {!! BootForm::text('Votre nom', 'name')->placeHolder("Votre nom...")->required() !!}--}}
{{--                {!! BootForm::text('Email', 'email')->placeHolder("Votre email...")->required() !!}--}}
{{--                {!! BootForm::textarea('Message', 'message')->placeHolder("Votre message...")->required() !!}--}}
{{--                {!! BootForm::submit('Envoyer', 'pull-right btn-pink') !!}--}}
{{--            {!! BootForm::close() !!}--}}
        </div>
        <div class="col-sm-6">
            @if($user->description)
                <h3>Plus de détail</h3>
                <div id="user-description">
                    {!! $user->description !!}
                </div>
            @else
                <img class="img-fluid rounded" id="contact-img" src="{{ asset('img/pregnant-collection/belly-painting-france_1920.jpg') }}" alt="femme enceinte belly painting france">
            @endif
        </div>
    </div>
    @endif
</section>
@stop

{{--@section('script')--}}
{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $('#nav-trouver').addClass('active');--}}
{{--        });--}}
{{--    </script>--}}
{{--@stop--}}
