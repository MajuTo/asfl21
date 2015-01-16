@extends('layouts.index')
@section('content')
    <div>
        <h1>Tableau de bord Admin</h1>
        <a href="{{ URL::to('admin/create') }}" ><button class="btn">Create</button></a>
        <hr>
    </div>
@stop