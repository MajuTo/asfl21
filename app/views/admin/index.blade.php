@extends('layouts.index')
@section('content')
    <div>
        <h1>Tableau de bord Admin</h1>
        <p>Bienvenue {{ Auth::user()->username }}</p>
        <a href="{{ URL::route('admin.user.create') }}" ><button class="btn">Create</button></a>
        <hr>
    </div>
@stop