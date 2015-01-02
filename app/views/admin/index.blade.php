@extends('layouts.index')
@section('content')
    <div class="container">
        <div class="row" id="admin_form">

            <div class="col-sm-4">
            

            {{ Form::open(['route' => 'admin', 'method' => 'post', 'class' => 'form-horizontal']) }}

                <div class="form-group">
                    {{ Form::label('name', 'Nom', ['class' => 'form-label']) }}        
                    {{ Form::text('name', null, ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Nom de l\'adhérent...']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('firstName', 'Prenom', ['class' => 'form-label']) }}        
                    {{ Form::text('firstName', null, ['id' => 'firstName', 'class' => 'form-control', 'placeholder' => 'Prenom de l\'adhérent...']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('username', 'Pseudo', ['class' => 'form-label']) }}        
                    {{ Form::text('username', null, ['id' => 'username', 'class' => 'form-control', 'placeholder' => 'Pseudo de l\'adhérent...']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('email', 'Email', ['class' => 'form-label']) }}        
                    {{ Form::text('email', null, ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'Email de l\'adhérent...']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('phone', 'Tel', ['class' => 'form-label']) }}        
                    {{ Form::text('phone', null, ['id' => 'phone', 'class' => 'form-control', 'placeholder' => 'Tel de l\'adhérent...']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('mobile', 'Portable', ['class' => 'form-label']) }}        
                    {{ Form::text('mobile', null, ['id' => 'mobile', 'class' => 'form-control', 'placeholder' => 'Portable de l\'adhérent...']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('fax', 'Fax', ['class' => 'form-label']) }}        
                    {{ Form::text('fax', null, ['id' => 'fax', 'class' => 'form-control', 'placeholder' => 'Fax de l\'adhérent...']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('address', 'Adresse', ['class' => 'form-label']) }}        
                    {{ Form::text('address', null, ['id' => 'address', 'class' => 'form-control', 'placeholder' => 'Adresse de l\'adhérent...']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('zipCode', 'CP', ['class' => 'form-label']) }}        
                    {{ Form::text('zipCode', null, ['id' => 'zipCode', 'class' => 'form-control', 'placeholder' => 'CP de l\'adhérent...']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('city', 'Ville', ['class' => 'form-label']) }}        
                    {{ Form::text('city', null, ['id' => 'city', 'class' => 'form-control', 'placeholder' => 'Ville de l\'adhérent...']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('Group_idGroup', 'Groupe', ['class' => 'form-label']) }}        
                    {{ Form::select('Group_idGroup', $groups, null, ['id' => 'Group_idGroup', 'class' => 'form-control']) }}
                </div>

                {{ Form::submit('Whiiiiiiiie') }}
            {{ Form::close() }}
            </div>
        </div>
    </div>
@stop