@extends('layouts.index')
@section('content')
    <div class="container">
        <div class="row" id="admin_form">

            <h1>Création d'un adhérent</h1>

        {{--  Bloc d'erreur groupé, décommente si tu veux voir a quoi ca ressemble, pas terrible imo --}}
        {{--
            @if ($errors->has())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif
        --}}

            <div class="col-sm-6">

                {{ BootForm::openHorizontal(3, 9)->action(URL::route('admin.store')) }}
                    {{ Form::token() }}
                    {{ BootForm::text('Nom', 'name')->placeHolder("Nom de l'adhérent...") }}
                    {{ BootForm::text('Prénom', 'firstname')->placeHolder("Prénom de l'adhérent...") }}
                    {{ BootForm::text('Pseudo', 'username')->placeHolder("Pseudo de l'adhérent...") }}
                    {{ BootForm::text('Email', 'email')->placeHolder("Email de l'adhérent ...") }}
                    {{ BootForm::text('Téléphone', 'phone')->placeHolder("Téléphone de l'adhérent...") }}
                    {{ BootForm::text('Mobile', 'mobile')->placeHolder("Mobile de l'adhérent...") }}
                    {{ BootForm::text('Fax', 'fax')->placeHolder("Fax de l'adhérent...") }}
                    {{ BootForm::text('Adresse', 'adress')->placeHolder("Adresse de l'adhérent...") }}
                    {{ BootForm::text('Code postal', 'zipCode')->placeHolder("Code postal de l'adhérent...") }}
                    {{ BootForm::text('Ville', 'city')->placeHolder("Ville de l'adhérent...") }}
                    {{ BootForm::select('Groupe', 'Group_idGroup')->options($groups) }}
                    {{ BootForm::submit('Ajouter') }}
                {{ BootForm::close() }}

        </div>
        <div class="col-sm-6">
            {{ Form::open(['route' => 'admin.store', 'method' => 'POST', 'class' => 'form-horizontal']) }}

                <div class="form-group @if ($errors->has('name')) has-error @endif">
                    {{ Form::label('name', 'Nom', ['class' => 'form-label']) }}
                    @if ($errors->has('name')) <span class="error-label">{{ $errors->first('name') }}</span> @endif
                    {{ Form::text('name', Input::old('name'), ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Nom de l\'adhérent...']) }}
                </div>

                <div class="form-group @if ($errors->has('firstname')) has-error @endif">
                    {{ Form::label('firstname', 'Prénom', ['class' => 'form-label']) }}
                    @if ($errors->has('firstname')) <span class="error-label">{{ $errors->first('firstname') }}</span> @endif
                    {{ Form::text('firstname', null, ['id' => 'firstname', 'class' => 'form-control', 'placeholder' => 'Prenom de l\'adhérent...']) }}
                </div>

                <div class="form-group @if ($errors->has('username')) has-error @endif">
                    {{ Form::label('username', 'Pseudo', ['class' => 'form-label']) }}
                    @if ($errors->has('username')) <span class="error-label">{{ $errors->first('username') }}</span> @endif
                    {{ Form::text('username', null, ['id' => 'username', 'class' => 'form-control', 'placeholder' => 'Pseudo de l\'adhérent...']) }}
                </div>

                <div class="form-group @if ($errors->has('email')) has-error @endif">
                    {{ Form::label('email', 'Email', ['class' => 'form-label']) }}
                    @if ($errors->has('email')) <span class="error-label">{{ $errors->first('email') }}</span> @endif
                    {{ Form::text('email', null, ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'Email de l\'adhérent...']) }}
                </div>

                <div class="form-group @if ($errors->has('phone')) has-error @endif">
                    {{ Form::label('phone', 'Tel', ['class' => 'form-label']) }}
                    @if ($errors->has('phone')) <span class="error-label">{{ $errors->first('phone') }}</span> @endif
                    {{ Form::text('phone', null, ['id' => 'phone', 'class' => 'form-control', 'placeholder' => 'Tel de l\'adhérent...']) }}
                </div>

                <div class="form-group @if ($errors->has('mobile')) has-error @endif">
                    {{ Form::label('mobile', 'Portable', ['class' => 'form-label']) }}
                    @if ($errors->has('mobile')) <span class="error-label">{{ $errors->first('mobile') }}</span> @endif
                    {{ Form::text('mobile', null, ['id' => 'mobile', 'class' => 'form-control', 'placeholder' => 'Portable de l\'adhérent...']) }}
                </div>

                <div class="form-group @if ($errors->has('fax')) has-error @endif">
                    {{ Form::label('fax', 'Fax', ['class' => 'form-label']) }}
                    @if ($errors->has('fax')) <span class="error-label">{{ $errors->first('fax') }}</span> @endif
                    {{ Form::text('fax', null, ['id' => 'fax', 'class' => 'form-control', 'placeholder' => 'Fax de l\'adhérent...']) }}
                </div>

                <div class="form-group @if ($errors->has('address')) has-error @endif">
                    {{ Form::label('address', 'Adresse', ['class' => 'form-label']) }}
                    @if ($errors->has('address')) <span class="error-label">{{ $errors->first('address') }}</span> @endif
                    {{ Form::text('address', null, ['id' => 'address', 'class' => 'form-control', 'placeholder' => 'Adresse de l\'adhérent...']) }}
                </div>

                <div class="form-group @if ($errors->has('zipCode')) has-error @endif">
                    {{ Form::label('zipCode', 'CP', ['class' => 'form-label']) }}
                    @if ($errors->has('zipCode')) <span class="error-label">{{ $errors->first('zipCode') }}</span> @endif
                    {{ Form::text('zipCode', null, ['id' => 'zipCode', 'class' => 'form-control', 'placeholder' => 'CP de l\'adhérent...']) }}
                </div>

                <div class="form-group @if ($errors->has('city')) has-error @endif">
                    {{ Form::label('city', 'Ville', ['class' => 'form-label']) }}
                    @if ($errors->has('city')) <span class="error-label">{{ $errors->first('city') }}</span> @endif
                    {{ Form::text('city', null, ['id' => 'city', 'class' => 'form-control', 'placeholder' => 'Ville de l\'adhérent...']) }}
                </div>

                <div class="form-group @if ($errors->has('Group_idGroup')) has-error @endif">
                    {{ Form::label('Group_idGroup', 'Groupe', ['class' => 'form-label']) }}
                    @if ($errors->has('Group_idGroup')) <span class="error-label">{{ $errors->first('Group_idGroup') }}</span> @endif
                    {{ Form::select('Group_idGroup', $groups, null, ['id' => 'Group_idGroup', 'class' => 'form-control']) }}
                </div>

                {{ Form::submit('Ajouter', ['class' => 'btn']) }}
            {{ Form::close() }}
            </div>
        </div>
    </div>
@stop