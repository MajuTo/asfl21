@extends('layouts.index')
@section('content')
		<!-- Page Title -->
        <div class="page-title-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 wow fadeIn">
                        <i class="fa fa-envelope"></i>
                        <h1>Contactez nous /</h1>
                        <p>Remplissez le formulaire pour nous contacter</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Us -->
        <div class="contact-us-container">
        	<div class="container">
	            <div class="row">
	                <div class="col-sm-7 wow fadeInLeft">
	                    <p>
	                    	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. 
	                    	Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper <a href="">suscipit lobortis</a> 
	                    	nisl ut aliquip ex ea commodo consequat.
	                    </p>

	                    {{ Form::open(['route' => 'sendcontact', 'method' => 'post']) }}
	                    	<div class="form-group">
	                    		{{ Form::label('name', 'Votre nom', ['class' =>'form-label']) }}
	                    		<span class="error-label">{{ $errors->first('name') }}</span>
	                    		{{ Form::text('name', null, ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Entrez votre nom...']) }}
	                        </div>
	                    	<div class="form-group">
	                    		{{ Form::label('email', 'Votre email', ['class' =>'form-label']) }}
	                    		<span class="error-label">{{ $errors->first('email') }}</span>
	                    		{{ Form::text('email', null, ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'Entrez votre email...']) }}
	                        </div>
	                        <div class="form-group">
	                    		{{ Form::label('subject', 'Votre sujet', ['class' =>'form-label']) }}
	                    		<span class="error-label">{{ $errors->first('subject') }}</span>
	                    		{{ Form::text('subject', null, ['id' => 'subject', 'class' => 'form-control', 'placeholder' => 'Entrez votre sujet...']) }}
	                        </div>
	                        <div class="form-group">
	                    		{{ Form::label('message', 'Votre message', ['class' =>'form-label']) }}
	                    		<span class="error-label">{{ $errors->first('message') }}</span>
	                    		{{ Form::textarea('message', null, ['id' => 'message', 'class' => 'form-control', 'placeholder' => 'Entrez votre message...']) }}
	                        </div>
	                        {{ Form::submit('Envoyer', ['class' => 'btn btn-pink']) }}
	                    {{ Form::close() }}
	                </div>
	                <div class="col-sm-5 contact-address wow fadeInUp">
	                    <h3>We Are Here</h3>
	                    <div class="map"></div>
	                    <h3>Address</h3>
	                    <p>Via Principe Amedeo 9 <br> 10100, Torino, TO, Italy</p>
	                    <p>Phone: 0039 333 12 68 347</p>
	                </div>
	            </div>
	        </div>
        </div>
@stop