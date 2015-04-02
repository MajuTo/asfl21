@extends('layouts.index')
@section('content')
<div class="content-container">
    <div class="row">
    	<div class="col-sm-12">
    	<h2>Envoyer un message</h2>
	        {{ BootForm::openHorizontal(1, 11)->action(URL::route('message.store')) }}
	            {{ Form::token() }}
	            {{ BootForm::text('Titre', 'title')->placeHolder('Titre...')->required() }}
	            {{ BootForm::text('Message', 'content')->placeHolder('Message...')->required() }}
	            @if(Auth::getUser()->group_id == 2 || Auth::getUser()->group_id == 3)
	            	{{ BootForm::checkbox('Envoyer le message comme administrateur', 'admin-msg') }}
	            @endif
	            {{ BootForm::submit('Envoyer', 'pull-right btn btn-pink') }}
	        {{ BootForm::close() }}
	    </div>
    	<div class="col-sm-6">
    	<h2>Messages des membres</h2>
	    	@foreach($mMessages as $mMessage)
	    		<span class="pull-left">{{ $mMessage->user->name . ' ' . $mMessage->user->firstname . ' ' . date('d/m/Y H:i:s', strtotime($mMessage->created_at)) }}</span><br />
	    		<p>
	    			<strong class="pull-left">{{ $mMessage->title }}</strong><br />
	    			{{ $mMessage->content }}
	    		</p>
	    	@endforeach
    		{{ Paginator::setPageName('mm'); }}
    		{{ $mMessages->appends('am', Input::get('am',1))->links(); }}
	    </div>
    	<div class="col-sm-6">
    	<h2>Messages de l'association</h2>
	    	@foreach($aMessages as $aMessage)
	    		<span class="pull-left">{{ $aMessage->user->name . ' ' . $aMessage->user->firstname . ' ' . date('d/m/Y H:i:s', strtotime($aMessage->created_at)) }}</span><br />
	    		<p>
	    			<strong class="pull-left">{{ $aMessage->title }}</strong><br />
	    			{{ $aMessage->content }}
	    		</p>
	    	@endforeach
    		{{ Paginator::setPageName('am'); }}
    		{{ $aMessages->appends('mm', Input::get('mm',1))->links(); }}
	    </div>
    </div>
</div>
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-membre').addClass('active');
            $('#nav-info').addClass('active');
            $(':checkbox:not(:checked)').parent().addClass('notchecked');
            $(':checkbox:checked').parent().addClass('checked');
            $(':checkbox').on('change', function(){
                if( $(this).parent().hasClass('checked') ){
                    $(this).parent().removeClass('checked').addClass('notchecked');
                }else{
                    $(this).parent().removeClass('notchecked').addClass('checked');
                }
            });
        });
    </script>
@stop