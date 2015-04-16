@extends('layouts.index')
@section('content')
<div class="content-container">
 
    <div class="row">
        <div class="col-sm-12">
            <h1 class="animate-page-title">{{ $user->name . ' ' . $user->firstname }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <h3>Mes coordonnées</h3>
            <dl class="dl-horizontal">
                <dt>Nom</dt><dd>{{ $user->name }}</dd>
                <dt>Prénom</dt><dd>{{ $user->firstname }}</dd>
                <dt>Adresse</dt><dd>{{ $user->address }}</dd>
                <dt>Code Postal</dt><dd>{{ $user->zipCode }}</dd>
                <dt>Ville</dt><dd>{{ $user->city }}</dd>
                @if($user->phone && !$user->hidePhone)
                    <dt>Téléphone</dt><dd>{{ $user->phone }}</dd>
                @endif
                @if($user->mobile && !$user->hideMobile)
                <dt>Mobile</dt><dd>{{ $user->mobile }}</dd>
                @endif
                @if($user->fax && !$user->hideFax)
                <dt>Fax</dt><dd>{{ $user->fax }}</dd>
                @endif
            </dl>
        </div>
        <div class="col-sm-6">
            <h3>Mes activités</h3>
            <dl class="dl-horizontal">
                @foreach($user->activities as $act)
                    <dd>{{ $act->activityName }}</dd>
                @endforeach
            </dl>
        </div>
    </div>
    
    @if($user->email && !$user->hideEmail)
    <div class="row">
        <div class="col-sm-6">
            <h3>Contactez moi</h3>
            {{ BootForm::openHorizontal(3, 9)->action(URL::route('user.email', $user->id)) }}
                {{ Form::token() }}
                {{-- BootForm::bind($user) --}}
                {{ BootForm::text('Votre nom', 'name')->placeHolder("Votre nom...")->required() }}
                {{ BootForm::text('Email', 'email')->placeHolder("Votre email...")->required() }}
                {{ BootForm::textarea('Message', 'message')->placeHolder("Votre message...")->required() }}
                {{ BootForm::submit('Envoyer', 'pull-right btn-pink') }}
            {{ BootForm::close() }}
        </div>
    </div>
    @endif
</div>
@stop

@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-trouver').addClass('active');
        });
    </script>
@stop