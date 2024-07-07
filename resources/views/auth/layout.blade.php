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
            <div class="d-none d-md-flex col-md-7">
                <img class="img-fluid rounded" src="{{ asset('img/pregnant-collection/feet-619534_1280.jpg') }}" alt="pieds de bébé">
            </div>
            <div class="col-12 col-md-5 text-right">
                @yield('auth.content')
            </div>
        </div>
    </section>
@stop
@section('script')
{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $('#nav-login').addClass('active');--}}
{{--        });--}}
{{--    </script>--}}
@stop
