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
            {{ BootForm::openHorizontal(3, 9)->action(URL::route('user.email', $user->id)) }}
                {{ Form::token() }}
                {{-- BootForm::bind($user) --}}
                {{ BootForm::text('Votre nom', 'name')->placeHolder("Votre nom...")->required() }}
                {{ BootForm::text('Email', 'email')->placeHolder("Votre email...")->required() }}
                {{ BootForm::textarea('Message', 'message')->placeHolder("Votre message...")->required() }}
                {{ BootForm::submit('Envoyer', 'pull-right btn-pink') }}
            {{ BootForm::close() }}
        </div>
        <div class="col-sm-6">
            <h3>Description des activités</h3>
            {{ $user->description }}
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