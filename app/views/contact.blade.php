@extends('layouts.index')
@section('content')
        <!-- Page Title -->
        <!-- <div class="page-title-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 wow fadeIn">
                        <i class="fa fa-envelope"></i>
                        <h1>Contactez nous /</h1>
                        <p>Remplissez le formulaire pour nous contacter</p>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Contact Us -->
        <div class="contact-us-container">
        	<div class="container">
	            <div class="row">
	                <div class="col-sm-7 wow fadeInLeft">
	         <!--            <p>
                 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. 
                 Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper <a href="">suscipit lobortis</a> 
                 nisl ut aliquip ex ea commodo consequat.
             </p> -->

	                    {{ BootForm::openHorizontal(3, 9)->action(URL::route('sendcontact')) }}
		                    {{ Form::token() }}
	                        {{ BootForm::text('Votre nom', 'name')->placeHolder('Votre nom ...')->required() }}
	                        {{ BootForm::text('Votre email', 'email')->placeHolder('Votre email ...')->required() }}
	                        {{ BootForm::text('Votre sujet', 'subject')->placeHolder('Votre sujet ...')->required() }}
	                        {{ BootForm::textarea('Votre message', 'message')->placeHolder('Votre message ...')->required() }}
	                        {{ BootForm::submit('Envoyer') }}
	                    {{ BootForm::close() }}

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