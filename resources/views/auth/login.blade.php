@extends('auth.layout')
@section('auth.title')
    <h1 class="animate-page-title">Identification</h1>
@stop
@section('auth.content')
    <div class="overflow-auto text-right">
        {{ link_to(route('password.request'), 'Mot de passe oublié ?', ['class' => 'float-end small']) }}
    </div>
{{--    <div class="row mb-3">--}}
{{--        <label for="inputEmail3" class="col-sm-3 col-form-label text-end fw-bold">Identifiant</label>--}}
{{--        <div class="col-sm-9">--}}
{{--            <input type="email" class="form-control" id="inputEmail3">--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="row mb-3">--}}
{{--        <label for="inputPassword3" class="col-sm-3 col-form-label text-end fw-bold">Mot de passe</label>--}}
{{--        <div class="col-sm-9">--}}
{{--            <input type="password" class="form-control" id="inputPassword3">--}}
{{--        </div>--}}
{{--    </div>--}}
{{--        <hr>--}}
{{--        <hr>--}}

            {{--        <hr>--}}
{{--        <div>--}}
{{--            <form class="form-horizontal">--}}
{{--                <div class="row mb-3">--}}
{{--                    <label for="inputEmail3" class="col-sm-2 col-form-label control-label">Email</label>--}}
{{--                    <div class="col-sm-10">--}}
{{--                        <input type="email" class="form-control" id="inputEmail3">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row mb-3">--}}
{{--                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>--}}
{{--                    <div class="col-sm-10">--}}
{{--                        <input type="password" class="form-control" id="inputPassword3">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <button type="submit" class="btn btn-pink">Envoyer</button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--        <hr>--}}
{{--                <hr>--}}
{{--            <x-form>--}}
{{--                <x-form-input class="mb-3" name="username" label="Identifiant" floating></x-form-input>--}}
{{--                <x-form-input class="mb-3" type="password" name="password" label="Mot de passe" floating></x-form-input>--}}
{{--                <x-form-submit class="float-end btn-pink">Envoyer</x-form-submit>--}}
{{--            </x-form>--}}
{{--    <x-form>--}}
{{--        <x-floating-input class="mb-3" name="username" label="Identifiant" />--}}
{{--        <x-floating-input class="mb-3" type="password" name="password" label="Mot de passe" />--}}
{{--        <button type="submit" class="btn btn-pink float-end">Envoyer</button>--}}
{{--    </x-form>--}}
        {{ aire()->open(route('login')) }}
            {{ aire()->input('username', 'Identifiant')->required()->groupAddClass('mb-3') }}
            {{ aire()->password('password', 'Mot de passe')->required()->groupAddClass('mb-3') }}
{{--            <x-inline-input class="mb-3" name="username" label="Identifiant"/>--}}
{{--            <x-inline-input class="mb-3" type="password" name="password" label="Mot de passe" />--}}
{{--            <x-floating-input class="mb-3" name="username" label="Identifiant"/>--}}
{{--            <x-floating-input class="mb-3" type="password" name="password" label="Mot de passe" />--}}
{{--            <hr>--}}
            {{ aire()->submit('Envoyer')->addClass('float-end btn-pink')->removeClass('btn-primary') }}
        {{ aire()->close() }}
@stop
