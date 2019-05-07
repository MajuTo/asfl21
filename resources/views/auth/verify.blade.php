{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">{{ __('Verify Your Email Address') }}</div>--}}

                {{--<div class="card-body">--}}
                    {{--@if (session('resent'))--}}
                        {{--<div class="alert alert-success" role="alert">--}}
                            {{--{{ __('A fresh verification link has been sent to your email address.') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--{{ __('Before proceeding, please check your email for a verification link.') }}--}}
                    {{--{{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@endsection--}}

@extends('auth.layout')
@section('auth.title')
    <h1 class="animate-page-title">Vérification de votre adresse mail</h1>
@stop
@section('auth.content')
    {{--<div class="container">--}}
        {{--<div class="row justify-content-center">--}}
            {{--<div class="col-md-8">--}}
                {{--<div class="card">--}}
                    {{--<div class="card-header">{{ __('Verify Your Email Address') }}</div>--}}

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }}.
                        <p><a class="btn btn-pink pull-right" href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a></p>
                    </div>
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection
