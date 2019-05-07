{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">{{ __('Reset Password') }}</div>--}}

                {{--<div class="card-body">--}}
                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success" role="alert">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--<form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">--}}
                        {{--@csrf--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row mb-0">--}}
                            {{--<div class="col-md-6 offset-md-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--{{ __('Send Password Reset Link') }}--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@endsection--}}
@extends('auth.layout')
@section('auth.title')
    <h1 class="animate-page-title">Mot de Passe Oublié ?</h1>
@stop
@section('auth.content')
    {{--<div class="content-container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-sm-12">--}}
                {{--<h1 class="animate-page-title">Mot de Passe Oublié ?</h1>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row">--}}
            {{--<div class="col-sm-6">--}}
            <div>
                <h4 class="text-center">Veuillez entrer votre adresse email.</h4>
                {!! BootForm::openHorizontal(['lg' => [3, 9]])->action(route('password.email')) !!}
                @csrf
                {!! BootForm::email('Email', 'email')->required() !!}
                {!! BootForm::submit('Envoyer', 'pull-right btn-pink') !!}
                {!! BootForm::close() !!}
            </div>
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@stop