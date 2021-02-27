@section('title')
    <title>ASFL21, Espace Pro</title>
@stop
@extends('layouts.index')
@section('content')
    <section id="espacepro">
        <div class="row">
            <div class="col-sm-12">
                {{--<h1 class="animate-page-title">Identification</h1>--}}
                @yield('auth.title')
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <img class="img-responsive img-rounded" src="{{ asset('img/pregnant-collection/feet-619534_1280.jpg') }}" alt="pieds de bébé">
            </div>
            <div class="col-sm-6">
                @yield('auth.content')
            </div>
        </div>
    </section>
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-login').addClass('active');
        });
    </script>
@stop
