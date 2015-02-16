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
                <dt>Téléphone</dt><dd>{{ $user->phone }}</dd>
                <dt>E-mail</dt><dd>{{ $user->email }}</dd>
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
</div>
@stop

@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-trouver').addClass('active');
        });
    </script>
@stop