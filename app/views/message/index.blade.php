@extends('layouts.index')
@section('content')
<div class="container content-container">
    <div class="row">
    	<div class="col-sm-12">
    	<h2>Envoyer un message</h2>
	        {{ BootForm::openHorizontal(1, 11)->action(URL::route('message.store')) }}
	            {{ Form::token() }}
	            {{ BootForm::text('Titre', 'title')->placeHolder('Titre...')->required() }}
	            {{ BootForm::text('Message', 'content')->placeHolder('Message...')->required() }}
	            {{ BootForm::submit('Envoyer', 'pull-right btn btn-pink') }}
	        {{ BootForm::close() }}
	    </div>
    	<div class="col-sm-12">
    	<h2>Messages</h2>
	    	@foreach($messages as $message)
	    		<span class="pull-left">{{ $message->user->name . ' ' . $message->user->firstname . ' le ' .$message->created_at }}</span><br />
	    		@if($message->category->id == 1)
	    		<p class="bg-danger">
	    		@else
	    		<p class="bg-success">
	    		@endif
	    			<strong class="pull-left">{{ $message->title }}</strong><br />
	    			{{ $message->content }}
	    		</p>
	    	@endforeach
    		{{ $messages->links() }}
	    </div>
    	<div class="col-sm-6">
    	<h2>Messages des membres</h2>
	    	@foreach($mMessages as $mMessage)
	    		<span class="pull-left">{{ $mMessage->user->name . ' ' . $mMessage->user->firstname }}</span><br />
	    		<p class="bg-success">
	    			<strong class="pull-left">{{ $mMessage->title }}</strong><br />
	    			{{ $mMessage->content }}
	    		</p>
	    	@endforeach
	    </div>
    	<div class="col-sm-6">
    	<h2>Messages de l'association</h2>
	    	@foreach($aMessages as $aMessage)
	    		<span class="pull-left">{{ $aMessage->user->name . ' ' . $aMessage->user->firstname }}</span><br />
	    		<p class="bg-danger">
	    			<strong class="pull-left">{{ $aMessage->title }}</strong><br />
	    			{{ $aMessage->content }}
	    		</p>
	    	@endforeach
	    </div>
    </div>
</div>
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-membre').addClass('active');
            $('#nav-info').addClass('active');
        });
    </script>
@stop